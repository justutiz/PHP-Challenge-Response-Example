<?php namespace Chresp;

class Client {

    public function index()
    {
        session_start();

        if ( ! empty($_POST['response']) && ! empty($_POST['username'])) {
            Server::login($_POST['response'], $_POST['username']);
        } else {
            self::View('index');
        }
    }

    static function View($view)
    {
        require('views/' . $view . '.php');
    }

}