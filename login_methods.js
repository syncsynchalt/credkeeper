pax8_login = function(site, user, pass) {
    if (window.console) console.log('logging in with user:' + user + ' pass:' + pass);
    $.ajax({
        type: 'POST',
        url: site + '/portal/j_spring_security_check',
        data: 'j_username=' + user + '&j_password=' + pass,
        success: function(result) {
            window.location = site + '/portal/jsp/home.jsp';
        }
    });
};
