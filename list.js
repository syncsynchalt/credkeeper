getUserName = function() {
    return $('#username').text();
}

activateButton = function(data, button) {
    var key = $(button).attr('key'),
        templ = $(button).attr('templ'),
        user = getUserName(),
        enckey = localStorage[user + '_encryption_key'],
        user = CryptoJS.AES.decrypt(data[key + '/user'], enckey),
        pass = CryptoJS.AES.decrypt(data[key + '/pass'], enckey);

    if (!user || !pass) {
        return;
    }

    templ = templ.replace('USER', user);
    templ = templ.replace('PASS', pass);
    $(button).removeAttr('disabled');
    $(button).bind('click', function() { eval(templ); });
}

$(document).ready(function() {
    var user = getUserName();
    $('.loginButton').attr('disabled', 'disabled');
    if (localStorage[user + '_encryption_key']) {
        $('#activation').hide();

        loginButtons = $('.loginButton');
        $.ajax({
            dataType: 'json',
            type: 'POST',
            url: 'get_encrypted_logins.php',
            success: function(data) {
                loginButtons.each(function(i, obj) { activateButton(data, obj); });
            }
        });
    }
});
