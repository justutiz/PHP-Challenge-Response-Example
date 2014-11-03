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
    <input type="text" name="challenge" id="challenge" size="80" value="<?php echo \Chresp\Server::getChallenge(); ?>"
           readonly/>
    </label>

    <label>
        <input type="text" name="response" value="" hidden/>
    </label>

    <input type="submit" value="Login"/>
    <br/><br/>
    Response will be sha256(<i>username</i><strong><span style="color:red;">:</span></strong><i>sha256(password)</i><strong><span style="color:red;">:</span></strong><i>challenge</i>).
    <br/><br/>
    In this case: sha256(<i><span id="usernamecp"></span></i><strong><span style="color:red;">:</span></strong><i><span id="passwordcp"></span></i><strong><span style="color:red;">:</span></strong><i><span id="challengecp"></span></i>) = <span id="complete"></span>
    <br/><br/>
    Hash length: <span id="hashLength"></span>
</form>
<script src="js/jquery-2.1.1.min.js"></script>
<script language="javascript" src="js/sha256.js" type="text/javascript"></script>
<script src="js/scripts.js"></script>
</body>
</html>



