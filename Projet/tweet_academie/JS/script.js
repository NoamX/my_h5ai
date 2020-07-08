$(document).ready(() => {
    $('.form-register').submit((event) => {
        event.preventDefault();
        $('#register-error').css('display', 'none').html('');
        let fullname = $('#fullname').val();
        let username = $('#username').val();
        let email = $('#email').val();
        let password = $('#password').val();
        let checkEmail = /^[a-z0-9._-]+@[a-z0-9_-]{2,}\.[a-z]{2,4}$/;


        if (!fullname || !username || !email || !password) {
            $('#register-error').css('display', 'block').html('Veuillez remplir tous les champs !');
            $('#fullname, #username, #email, #password').css('background', '#F8D7DA');
        } else if (!email.match(checkEmail)) {
            $('#register-error').css('display', 'block').html('Adresse e-mail invalide !');
        } else {
            $.ajax({
                type: 'POST',
                url: 'PHP/register..php',
                data: {
                    fullname: fullname,
                    username: username,
                    email: email,
                    password: password
                },
                success: (data) => {
                    console.log(data);
                    if (data == 'Failed') {
                        $('#register-error').css({
                            display: 'block',
                            backgroundColor: '#f8d7da',
                            color: '#721C24',
                        }).html('Cette adresse e-mail est déjà ulilisée !');
                    } else if (data == 'FailUser') {
                        $('#register-error').css({
                            display: 'block',
                            backgroundColor: '#f8d7da',
                            color: '#721C24',
                        }).html('Ce pseudo est déjà ulilisée !');
                    } else {
                        window.location.href = 'login.html';
                    }
                },
            })
        }
    })

    $('.form-login').submit((event) => {
        event.preventDefault();
        let log_user = $('#user-login').val();
        let password = $('#login-password').val();
        $('#login-error').css('display', 'none').html('');
        if (!log_user || !password) {
            $('#login-error').css('display', 'block').html('Veuillez remplir tous les champs !');

            $('#user-login, #login-password').css('background', '#F8D7DA');
        } else {
            $.ajax({
                type: 'POST',
                url: 'PHP/login..php',
                data: {
                    log_user: log_user,
                    password: password,
                },
                success: (data) => {
                    if (data == 'Failed') {
                        $('#login-error').css('display', 'block').html('Mauvais identifiant ou mot de passe !');
                    } else if (data == 'Nothing') {
                        $('#login-error').css('display', 'block').html('Cette adresse e-mail n\'est pas enregistrée !');
                    } else {
                        window.location.href = 'home.html';
                    }
                },
            })
        }
    })
});