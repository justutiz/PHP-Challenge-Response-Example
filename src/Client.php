<?php namespace Chresp;

class Client {

    /**
     * Function starts session and checks if user try to login or not.
     * If not, just loads login form. Else, if user trying to login, javascript generated response
     * and username is sending to server to check.
     */
    public function index()
    {
        session_start();

        if ( ! empty($_POST['response']) && ! empty($_POST['username'])) {
            Server::login($_POST['response'], $_POST['username']);
        } else {
            self::View('index');
        }
    }

    /**
     * @param $view
     *
     * Function it's just for shorten syntax to load forms.
     */
    static function View($view)
    {
        require('views/' . $view . '.php');
    }

}