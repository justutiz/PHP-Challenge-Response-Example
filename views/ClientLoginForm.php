<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chresp</title>
</head>
<body>
<h3>Login</h3>

<form action="" method="post" name="login_form" onsubmit="doChallengeResponse()">
    <label for="username">username:</label>
    <label>
        <input type="text" name="username" id="username"/>
    </label>

    <label for="password">password:</label>
    <label>
        <input type="text" name="password" id="password"/>
    </label>

    <br/>
    <label for="challenge">challenge:</label>
    <input type="text" name="challenge" id="challenge" size="50" value="<?php echo \Chresp\Server::getChallenge(); ?>"
           readonly/>
    </label>

    <label>
        <input type="text" name="response" value="" hidden/>
    </label>

    <input type="submit" value="Login"/>
    <br/><br/>
    Response will be sha1(<i>username</i>:<i>sha1(password)</i>:<i>challenge</i>).
    <br/>
    In this case: sha1(<i><span id="usernamecp"></span></i>:<i><span id="passwordcp"></span></i>:<i><span id="challengecp"></span></i>) = <span id="complete"></span>
</form>
<script src="js/jquery-2.1.1.min.js"></script>
<script language="javascript" src="js/sha1.js" type="text/javascript"></script>
<script src="js/scripts.js"></script>
</body>
</html>



