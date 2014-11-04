
function generateSha256() {
    $('#toBeHashed').keyup(function () {

        var $password = Sha256.hash($('#toBeHashed').val());
        $('#hash').html($password);

        var $hashLength = $('#hash').text().length;
        $('#hashLength').html($hashLength);
    });
}

generateSha256();