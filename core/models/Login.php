<?php
namespace core\models;

use core\classes\Database;

class Login{
 
    public static function verify_email_exists($email){

        $db = new Database();
        $params = [
            ':e' => strtolower(trim($email))
        ];
        $results =  $db->select("SELECT * FROM login WHERE email = :e", $params);

        //Verifies if there is a username registered with the same name
        if (count($results) != 0) {
            return true;
        } else{
            return false;   
        }
    }

    public static function validate_login($email, $password){

        $params = [
            ':user' => $email
        ];

        $db = new Database();
        $results =  $db->select("SELECT * FROM login WHERE email = :user", $params);

     
        //Verifies if there is a username registered with the same name
        if (count($results) === 0) {

            return false;

        } else{
         
            $user = $results[0];

            if (!password_verify($password, $user->password)) {
                //Invalid password
                return false;
            }else{
                //Valid password
                return $user;
            }
        }
    }

}