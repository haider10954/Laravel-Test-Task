<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Login | Test Task</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Login" name="description">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/styles.css') }}" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css">

</head>

<body >

<!-- Loader -->
<div id="preloader"><div id="status"><div class="spinner"></div></div></div>

<!-- Begin page -->
<div class="accountbg"></div>
<div class="account-pages mt-5 pt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-5 col-xl-4">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex p-3">
                            <div>
                                <a href="index.html" class="">
                                    <img src="{{ asset('assets/images/logo_dark.png') }}" alt="" height="22" class="auth-logo logo-dark">
                                    <img src="{{ asset('assets/images/logo.png') }}" alt="" height="22" class="auth-logo logo-light">
                                </a>
                            </div>
                            <div class="ms-auto text-end">
                                <h4 class="font-size-18">Welcome Back !</h4>
                                <p class="text-muted mb-0">Sign in to continue to Panel.</p>
                            </div>
                        </div>
                        <div class="p-3">

                            <form class="form-horizontal" id="userLogin">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="username">Email</label>
                                    <input type="text" class="form-control" id="username" placeholder="Enter username" name="email">
                                    <div class="error-email"></div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="userpassword">Password</label>
                                    <input type="password" class="form-control" id="userpassword" placeholder="Enter password" name="password">
                                    <div class="error-password"></div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-sm-12 text-end">
                                        <button id="submitBtn" class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<!-- JAVASCRIPT -->
<script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('assets/toast-plugin-min.js') }}"></script>

<script src="{{ asset('assets/js/app.js') }}"></script>
<script>

    $('#userLogin').on('submit', function (e) {
        const submitBtn = $('#submitBtn');
        e.preventDefault();
        let formData = new FormData($('#userLogin')[0]);
        $.ajax({
            type: "POST",
            url: "{{ route('login_request') }}",
            dataType: 'json',
            contentType: false,
            processData: false,
            cache: false,
            data: formData,
            beforeSend: function () {
                submitBtn.prop('disabled', true);
                submitBtn.html('Processing');
                $('.error-message').hide();
            },
            success: function (res) {
                if (res.success == true) {
                    submitBtn.prop('disabled', false);
                    submitBtn.html('Login');
                    $.toast({
                        title: "Logged In",
                        message: res.message,
                        type: "success",
                        duration: 3000,
                    });
                    setTimeout(function () {
                        window.location.href = "{{ route('dashboard') }}";
                    }, 3500);
                } else {
                    submitBtn.prop('disabled', false);
                    submitBtn.html('Login');
                    $.toast({
                        title: "Error",
                        message: res.message,
                        type: "error",
                        duration: 3000,
                    });
                }
            },
            error: function (e) {
                submitBtn.prop('disabled', false);
                submitBtn.html('Login');
                if (e.responseJSON.errors['email']) {
                    $('.error-email').html('<small class="error-message text-danger poppins fs-13">' + e.responseJSON.errors['email'][0] + '</small>');
                }
                if (e.responseJSON.errors['password']) {
                    $('.error-password').html('<small class="error-message text-danger poppins fs-13">' + e.responseJSON.errors['password'][0] + '</small>');
                }
            }
        });
    });
</script>
</body>

</html>
