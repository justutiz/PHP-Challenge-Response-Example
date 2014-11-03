function doChallengeResponse() {
    str = document.login_form.username.value + ":" + Sha256.hash(document.login_form.password.value) + ":" + document.login_form.challenge.value;
    document.login_form.password.value = "";
    document.login_form.challenge.value = "";
    document.login_form.response.value = Sha256.hash(str);
    return false;
}

function showExample() {
    $('#username, #password').keyup(function () {

        var $username = $('#username').val();
        $('#usernamecp').html($username);

        var $password = Sha256.hash($('#password').val());
        $('#passwordcp').html($password);

        var $challenge = $('#challenge').val();
        $('#challengecp').html($challenge);

        var $complete = $('#complete');
        $complete.html(Sha256.hash($username + ':' + $password + ':' + $challenge));

        var $hashLength = $complete.text().length;
        $('#hashLength').html($hashLength);
    });
}

showExample();