<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Server side</title>
</head>
<body>
<h3>Add new user</h3>

<form action="" method="post">
    <label for="username">username:</label>
    <input type="text" name="username" id="username"/>

    <label for="password">password (plain):</label>
    <input type="text" name="password" id="password"/>

    <input type="submit" name="Add" id="add"/>
    <br/><br/>
    Generate sha256:
    <input type="text" id="toBeHashed"/>
    <br/>
    Hash: <span id="hash"></span>
    <br/>
    Hash length: <span id="hashLength"></span>
</form>
<script src="js/jquery-2.1.1.min.js"></script>
<script language="javascript" src="js/sha256.js" type="text/javascript"></script>
<script src="js/server_scripts.js"></script>
</body>
</html>