<?php

namespace core\controllers;

use core\classes\Database;
use core\classes\Functions;
use core\classes\SendEmail;
use core\models\Login;

class Main
{

    public function home()
    {
        $db = new Database();

        $block_1 = $db->select("SELECT * FROM index_block_1");
        $block_2 = $db->select("SELECT * FROM index_block_2");
        $block_3 = $db->select("SELECT * FROM index_block_3");
        $block_4 = $db->select("SELECT * FROM index_block_4");

        $data = [
            'block_1' => $block_1,
            'block_2' => $block_2,
            'block_3' => $block_3,
            'block_4' => $block_4
        ];

        Functions::Layout([
            'layouts/html_header',
            'layouts/header',
            'home',
            'layouts/footer',
            'layouts/html_footer',
        ], $data);
    }
    public function portfolio()
    {
        $data = [
            'title' => 'Página portfolio'
        ];

        Functions::Layout([
            'layouts/html_header',
            'layouts/header',
            'portfolio',
            'layouts/footer',
            'layouts/html_footer',
        ], $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Página contact'
        ];

        Functions::Layout([
            'layouts/html_header',
            'layouts/header',
            'contact',
            'layouts/footer',
            'layouts/html_footer',
        ], $data);
    }

    //Schedule
    public function schedule()
    {


        Functions::Layout([
            'layouts/html_header',
            'layouts/header',
            'schedule',
            'layouts/footer',
            'layouts/html_footer',
        ]);
    }
    public function get_schedules()
    {

        $data = $_GET['data'];

        $db = new Database();
        $params = [
            ':e' => $data
        ];
        $results =  $db->select("SELECT * FROM schedules WHERE start = :e", $params);

        $jsonArray = json_encode($results);

        echo $jsonArray;
    }
    public function save_new_schedule()

    //VErificar se adm está logado

    {
        //Verifies if there's an open session
        if (Functions::ownerLogged()) {
            Functions::redirect('email_sent');
            $_SESSION['error'] = true;
            $_SESSION['msg'] = "É necessário fazer login!";
            return;
        }


        $data = $_GET['data'];

        $data_parts = explode('/', $data);

        $date = $data_parts[0];
        $hour = $data_parts[1];

        //Verifies on DB if there's already the same schedule, preventing duplicated schedules
        $db = new Database();

        $params_1 = [
            ':date' => $date,
            ':time' => $hour,
        ];

        $results =  $db->select("SELECT * FROM schedules WHERE start = :date AND time = :time", $params_1);

        if (!empty($results)) {

            $_SESSION['error'] = true;
            $_SESSION['msg'] = "Este agendamento já foi salvo!";
            Functions::redirect('edit');
        } else {

            $params_2 = [
                ':id' => '0',
                ':datestart' => $date,
                ':dateend' => $date,
                ':hour' => $hour,
            ];


            $db->insert("INSERT INTO schedules VALUES(:id, :datestart, :dateend, :hour)", $params_2);

            $_SESSION['error'] = false;
            $_SESSION['msg'] = 'Agendamento salvo com sucesso!';
            Functions::redirect('edit');
            return;
        }
    }


    //Edit
    public function edit()
    {

        //Verifies if there's an open session
        if (Functions::ownerLogged()) {
            Functions::redirect();
            return;
        }

        Functions::Layout([
            'layouts/html_header',
            'layouts/header',
            'edit',
            'layouts/footer',
            'layouts/html_footer',
        ]);
    }
    public function feed_calendar()
    {

        $db = new Database();
        $results =  $db->select("SELECT * FROM schedules;");

        $jsonArray = json_encode($results);

        echo $jsonArray;
    }

    public function get_choosen_date_info()
    {

        $data = $_GET['data'];


        $params = [
            ':e' => $data
        ];

        $db = new Database();
        $results =  $db->select("SELECT * FROM schedules WHERE start = :e", $params);

        $jsonArray = json_encode($results);

        echo $jsonArray;
    }
    public function remove_schedule()
    {

        $data = $_GET['data'];


        $data_parts = explode('/', $data);

        $date = $data_parts[0];
        $hour = $data_parts[1];


        $params = [
            ':e' => $date,
            ':i' => $hour,
        ];
        $db = new Database();

        $db->delete("DELETE FROM schedules WHERE start = :e AND time = :i", $params);
    }


    //Login adm
    public function login()
    {

        //Verifies if there's an open session
        if (Functions::ownerLogged()) {
            Functions::redirect();
            return;
        }


        //Verifies if there was a form submition
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            Functions::redirect();
            return;
        }


        //Checks for empty fields
        if (!isset($_POST['email']) || !isset($_POST['password'])) {

            $_SESSION['error'] = "Campos vazios!";
            Functions::redirect();
            return;
        }


        //Checks for valid email
        if (filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL) === false) {
            $_SESSION['error'] = "Email inválido!";
            $this->home();
            return;
        }

        $login = new Login();

        //Verifies on database if the given username exists
        if (!$login->verify_email_exists($_POST['email'])) {
            $_SESSION['error'] = "Este email não existe";
            Functions::redirect();
            return;
        }

        //Validate login
        $email = trim(strtolower($_POST['email']));
        $password = trim($_POST['password']);
        $result = $login->validate_login($email, $password);


        if (is_bool($result)) {

            //Invalid login
            $_SESSION['error'] = 'Login inválido';
            Functions::redirect();
            return;
        } else {

            //Valid login

            $_SESSION['adm'] = $result->email;
            Functions::redirect();
        }
    }
    public function logout()
    {
        unset($_SESSION['adm']);
        Functions::redirect();
    }

    //Email
    public function contact_send_email()
    {

        //Verifies if there was a form submition
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            Functions::redirect();
            return;
        }

        $email = new SendEmail();


        //Checks for empty fields
        if (
            !isset($_POST['sche-confirm-name'])
            || !isset($_POST['sche-confirm-email'])
            || !isset($_POST['sche-confirm-number'])
            || !isset($_POST['sche-confirm-text'])
        ) {

            $_SESSION['error'] = true;
            $_SESSION['msg'] = "Campos vazios!";
            Functions::redirect('contact');
            return;
        }


        $email->send_email(
            trim(strtolower($_POST['sche-confirm-name'])),
            trim(strtolower($_POST['sche-confirm-email'])),
            trim(strtolower($_POST['sche-confirm-number'])),
            trim(strtolower($_POST['sche-confirm-text'])),


        );
    }
    public function contact_email_sent()
    {
        Functions::Layout([
            'layouts/html_header',
            'layouts/header',
            'contact_email_sent',
            'layouts/footer',
            'layouts/html_footer',
        ]);
    }

    
    public function send_email_schedule_request()
    {
        //Checks for empty fields
        if (
            !isset($_POST['sche-confirm-name'])
            || !isset($_POST['sche-confirm-email'])
            || !isset($_POST['sche-confirm-number'])
            || !isset($_POST['sche-confirm-text'])
            || !isset($_POST['sche-confirm-date'])
            || !isset($_POST['sche-confirm-hour'])
        ) {

            $_SESSION['error'] = true;
            $_SESSION['msg'] = "Campos vazios!";
            Functions::redirect('schedule');
            return;
        }


        //Checks for valid email
        if (filter_var(trim($_POST['sche-confirm-email']), FILTER_VALIDATE_EMAIL) === false) {
            $_SESSION['error'] = true;
            $_SESSION['msg'] = "Email inválido!";
            Functions::redirect('schedule');
            return;
        }

        //Checks if there's the same schedule saved on database to prevent duplicated data
        $db = new Database();
        $params = [
            ':date' => strtolower(trim($_POST['sche-confirm-date'])),
            ':time' => strtolower(trim($_POST['sche-confirm-hour']))
        ];
        $results =  $db->select("SELECT * FROM schedules WHERE start = :date AND time = :time", $params);

        if (!empty($results)) {
            $_SESSION['error'] = true;
            $_SESSION['msg'] = 'Este agendamento já foi salvo!';
            Functions::redirect('schedule');
            return;
        } else {

            $email = new SendEmail();

            $email->send_email(
                trim(strtolower($_POST['sche-confirm-name'])),
                trim(strtolower($_POST['sche-confirm-email'])),
                trim(strtolower($_POST['sche-confirm-number'])),
                trim(strtolower($_POST['sche-confirm-text'])),
                trim(strtolower($_POST['sche-confirm-date'])),
                trim(strtolower($_POST['sche-confirm-hour'])),
            );
        }
    }
    public function schedule_request_email_sent(){
        Functions::Layout([
            'layouts/html_header',
            'layouts/header',
            'schedule_request_email_sent',
            'layouts/footer',
            'layouts/html_footer',
        ]);
    }

}
