<?php namespace Chresp;

use PDO;

class Server {

    public function showUserAddingForm()
    {
        Client::ShowView('addUserForm');

        if ( ! empty($_POST['username']) && ! empty($_POST['password'])) {

            $username = $_POST['username'];
            $password = hash('sha256', ($_POST['password']));

            $dbConnection = self::connectToDb();

            $dbConnection->query('insert into user_accounts (username, password) values (\'' . $username . '\', \'' . $password . '\')');

            printf('New user with username <b>%s</b> and password <b>%s</b> created.', $_POST['username'], $_POST['password']);
        }
    }

    static function connectToDb()
    {
        $dbConnection = new PDO('mysql:host=localhost;dbname=chresp;charset=utf8', 'chresp', 'chresp');
        $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        return $dbConnection;
    }

    static function getChallenge()
    {
        $challenge = hash('sha256', (uniqid(mt_rand(), true)));

        $dbConnection = self::connectToDb();

        $dbConnection->query('delete from challenge_record where sess_id = \'' . session_id() . "' or timestamp < " . time());

        $dbConnection->query('insert into challenge_record (sess_id, challenge, timestamp) values (\'' . session_id() . "', '" . $challenge . "', " . (time() + 360) . ")");

        return $challenge;
    }

    static function tryToLoginUser($response, $username)
    {
        $dbConnection = self::connectToDb();

        $challenge = $dbConnection->query('select challenge from challenge_record WHERE sess_id = "' . session_id() . '"')->fetchAll(PDO::FETCH_ASSOC)[0]['challenge'];

        $user = $dbConnection->query('select username, password from user_accounts where username = "' . $username . '"')->fetchAll(PDO::FETCH_ASSOC);

        if ( ! empty($user)) {
            $challenge = hash('sha256', ($user[0]['username'] . ':' . $user[0]['password'] . ':' . $challenge));
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