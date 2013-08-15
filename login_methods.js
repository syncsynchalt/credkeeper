pax8_login = function(site, user, pass) {
    $.ajax({
        type: 'POST',
        url: site + '/portal/j_spring_security_check',
        data: 'j_username=' + user + '&j_password=' + pass,
        success: function(html) {
            window.location.replace(site);
        }
    });
};
