<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function email() {

        $email = \Config\Services::email();

        $email->setFrom('your@example.com', 'Your name');
        $email->setTo('catas76943@duetube.com');

        // $email->setCC('another@another-example.com');
        // $email->setBCC('them@their-example.com');
        
        $email->setSubject('Mais um email');
        $email->setMessage('É muito massa e tranquilo enviar email com o CodeIgniter');

        if($email->send()) {

        echo 'Email enviado';

        } else {

           echo $email->printDebugger();

        }
 
    }
}