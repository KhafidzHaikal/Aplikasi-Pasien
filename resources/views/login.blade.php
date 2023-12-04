<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login </title>
    <!-- Favicon icon -->
    <link href="/css/style.css" rel="stylesheet">
    <style>
        h3 {
            font-size: 1.5rem;
            font-weight: 700;
            text-align: center;
            margin-top: 2rem; 
        }
        label {
            display: flex;
            justify-content: center;
        }

        input {
            text-align: center;
        }
    </style>
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="d-flex flex-wrap justify-content-md-around mt-4 align-items-center">
                                    <img src="/img/pemkab.png" style="width: 8em; height: 8em; margin-bottom:-2rem">
                                    <h3>LOGIN</h3>
                                    <img src="/img/puskesmas.png" style="width: 8em; height: 8em; margin-bottom:-2rem">
                                </div>
                                <div class="auth-form">
                                    <form action={{ route('login.store') }} method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label><strong>Username</strong></label>
                                            <input type="text" class="form-control" name="username">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Password</strong></label>
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                                        </div>
                                    </form>
                                    {{-- <div class="new-account mt-3">
                                        <p>Jika Belum Mempunyai Akun Silakan <a class="text-primary" href="/register">Register</a></p>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="/vendor/global/global.min.js"></script>
    <script src="/js/quixnav-init.js"></script>
    <script src="/js/custom.min.js"></script>

</body>

</html>
