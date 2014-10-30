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
<form action="" method="post" name="login_form" onsubmit="doChallengeResponse()">
    <label for="username">Prisijungimo vardas:</label>
    <input type="text" name="username"/>

    <label for="password">Slaptažodis:</label>
    <input type="text" name="password"/>

    <input type="text" name="challenge" value="<?php echo \Chresp\Server::getChallenge(); ?>" hidden/>

    <input type="text" name="response" value="" hidden/>

    <input type="submit" value="Prisijungti"/>
</form>
</body>
</html>



