<?php namespace Chresp;

use Chresp\Client as Client;
use PDO;

class Server {

    public function index()
    {
        Client::loadView('server');

        if ( ! empty($_POST['username']) && ! empty($_POST['password'])) {

            $username = $_POST['username'];
            $password = sha1($_POST['password']);

            $db = (new Server)->connect();

            $db->query('insert into user_accounts (username, password) values (\'' . $username . '\', \'' . $password . '\')');
            printf('New user with username <b>%s</b> and password <b>%s</b> created.', $_POST['username'], $_POST['password']);

        }
    }

    public function connect()
    {
        $db = new PDO('mysql:host=localhost;dbname=chresp;charset=utf8', 'chresp', 'chresp');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);

        return $db;
    }

    static function getChallenge()
    {
        $challenge = sha1(uniqid(mt_rand(), TRUE));

        $db = (new Server)->connect();

        $db->query('delete from challenge_record where sess_id = \'' . session_id() . "' or timestamp < " . time());

        $db->query('insert into challenge_record (sess_id, challenge, timestamp) values (\'' . session_id() . "', '" . $challenge . "', " . (time() + 360) . ")");

        return $challenge;
    }

    static function login($response, $username)
    {
        $db = (new Server)->connect();

        $challenge = $db->query('select challenge from challenge_record WHERE sess_id = "' . session_id() . '"')->fetchAll(PDO::FETCH_ASSOC)[0]['challenge'];

        $user = $db->query('select username, password from user_accounts where username = "' . $username . '"')->fetchAll(PDO::FETCH_ASSOC);


        if ( ! empty($user)) {
            $challenge = sha1($user[0]['username'] . ':' . $user[0]['password'] . ':' . $challenge);
            if ($response == $challenge) {
                echo 'Login success!';
            } else {
                echo 'Wrong password or bad response!';
            }
        } else {
            echo 'Wrong username!';
        }

    }

}