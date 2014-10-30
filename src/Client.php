<?php namespace Chresp;

class Client {

    public function showClientLoginForm()
    {
        session_start();

        if ( ! empty($_POST['response']) && ! empty($_POST['username'])) {
            Server::tryToLoginUser($_POST['response'], $_POST['username']);
        } else {
            self::ShowView('ClientLoginForm');
        }
    }

    static function ShowView($viewFileName)
    {
        require('views/' . $viewFileName . '.php');
    }

}