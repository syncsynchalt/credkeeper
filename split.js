getUserName = function() {
    return $('#username').text();
};

getKey = function() {
    return $('#key').text();
};

showFailure = function() {
    $('#split-username').attr('value', 'Computation failed');
    $('#split-password').attr('value', 'Computation failed');
};

computeValues = function(data) {
    var key = getKey(),
        user = getUserName(),
        enckey = localStorage[user + '_encryption_key'];
    if (!enckey) {
        showFailure();
        return;
    }

    var user = Aes.Ctr.decrypt(data[key + '/user'], enckey, 256),
        pass = Aes.Ctr.decrypt(data[key + '/pass'], enckey, 256);
    if (!user || !pass) {
        showFailure();
        return;
    }

    $('#split-username').attr('value', user);
    $('#split-password').attr('value', pass);
};

$(document).ready(function() {
    var user = getUserName();
    if (localStorage[user + '_encryption_key']) {
        $.ajax({
            dataType: 'json',
            type: 'POST',
            url: 'get_encrypted_logins.php',
            success: function(data) {
                computeValues(data);
            }
        });
    } else {
        showFailure();
    }
});
