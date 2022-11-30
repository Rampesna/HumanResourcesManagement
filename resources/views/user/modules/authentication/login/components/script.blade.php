<script src="{{ asset('assets/js/custom/authentication/sign-in/general.js') }}"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<script>

    $(document).ready(function () {
        $('#loader').hide();
    });

    var emailInput = $('#email');
    var passwordInput = $('#password');
    var LoginButton = $('#LoginButton');

    function login() {
        var email = emailInput.val();
        var password = passwordInput.val();
        var remember = $('#remember').is(':checked') ? 1 : 0;

        if (!email || !password) {
            toastr.warning('Lütfen Bilgilerinizi Girin.');
        } else {
            LoginButton.attr('disabled', true);
            $.ajax({
                type: 'post',
                url: '{{ route('user.api.login') }}',
                headers: {
                    'Accept': 'application/json',
                },
                data: {
                    email: email,
                    password: password,
                },
                success: function (response) {
                    window.location.href = `{{ route('user.web.authentication.oAuth') }}?token=${response.response.token}&remember=${remember}`;
                },
                error: function (error) {
                    console.log(error);
                    LoginButton.attr('disabled', false);
                    if (parseInt(error.status) === 422) {
                        $.each(error.responseJSON.response, function (i, error) {
                            toastr.error(error[0]);
                        });
                    } else if (error.status === 404) {
                        toastr.error('Kullanıcı Bulunamadı.');
                    } else if (error.status === 401) {
                        toastr.error('Şifreniz Hatalı!');
                    } else {
                        toastr.error('Serviste Bilinmeyen Bir Hata Oluştu.');
                    }
                }
            });
        }
    }

    passwordInput.on('keydown', function (e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            login();
        }
    });

    LoginButton.click(function () {
        login();
    });

    $.ajax({
        type: 'get',
        url: '',
        headers: {
            'Accept': 'application/json',
            'Authorization': token
        },
        data: {},
        success: function () {

        },
        error: function (error) {
            console.log(error);
            if (parseInt(error.status) === 422) {
                $.each(error.responseJSON.response, function (i, error) {
                    toastr.error(error[0]);
                });
            } else {
                toastr.error(error.responseJSON.message);
            }
        }
    });

</script>
