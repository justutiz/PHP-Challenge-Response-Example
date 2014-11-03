function doChallengeResponse() {
    str = document.login_form.username.value + ":" + Sha1.hash(document.login_form.password.value) + ":" + document.login_form.challenge.value;
    document.login_form.password.value = "";
    document.login_form.challenge.value = "";
    document.login_form.response.value = Sha1.hash(str);
    return false;
}

function showExample() {
    $("#username, #password").keyup(function () {

        var username = $('#username').val();
        $('#usernamecp').html(username);
        var password = Sha1.hash($('#password').val());
        $('#passwordcp').html(password);
        var challenge = $('#challenge').val();
        $('#challengecp').html(challenge);

        $('#complete').html(Sha1.hash(username + ':' + password + ':' + challenge));
    });
}

showExample();