<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chresp</title>
    <script language="javascript" src="js/sha1.js" type="text/javascript"></script>
    <script language="javascript" type="text/javascript">
        function doChallengeResponse() {
            str = document.login_form.username.value + ":" + Sha1.hash(document.login_form.password.value) + ":" + document.login_form.challenge.value;
            document.login_form.password.value = "";
            document.login_form.challenge.value = "";
            document.login_form.response.value = Sha1.hash(str);
            return false;
        }
    </script>
</head>
<body>
<h3>Login</h3>

<form action="" method="post" name="login_form" onsubmit="doChallengeResponse()">
    <label for="username">username:</label>
    <label>
        <input type="text" name="username"/>
    </label>

    <label for="password">password:</label>
    <label>
        <input type="text" name="password"/>
    </label>

    <label>
        <input type="text" name="challenge" value="<?php echo \Chresp\Server::getChallenge(); ?>" hidden/>
    </label>

    <label>
        <input type="text" name="response" value="" hidden/>
    </label>

    <input type="submit" value="Login"/>

</form>
</body>
</html>



