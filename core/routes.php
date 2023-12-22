<?php

$routes = [
    'home' => 'main@home',
    'portfolio' => 'main@portfolio',
    'contact' => 'main@contact',

    //schedule
    'schedule' => 'main@schedule',
    'get_schedules' => 'main@get_schedules',
    'save_new_schedule' => 'main@save_new_schedule',
    
    //Email
    'send_email' => 'main@contact_send_email',
    'contact_email_sent' => 'main@contact_email_sent',
    
    'send_email_schedule_request' => 'main@send_email_schedule_request',
    'schedule_request_email_sent' => 'main@schedule_request_email_sent',
    
    //Edit
    'edit' => 'main@edit',
    'feed_calendar' => 'main@feed_calendar',
    'get_choosen_date_info' => 'main@get_choosen_date_info',
    'remove_schedule'=>'main@remove_schedule',

    //Login
    'login' => 'main@login',
    'logout' => 'main@logout',
];

$action = 'home';

//Verifies if action exists on string query
if (isset($_GET['a'])) {

    //Verifies if action exists on routes
    if (!key_exists($_GET['a'], $routes)) {
        $action = 'home';
    } else {
        $action = $_GET['a'];
    }
}

$parts = explode('@', $routes[$action]);
$controller = 'core\\controllers\\' . ucfirst($parts[0]);
$method = $parts[1];

$ctr = new $controller();
$ctr->$method();
