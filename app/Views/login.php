<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Login | Sistem Informasi Klinik</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
    <meta name="description" content="Kero HTML Bootstrap 4 Dashboard Template">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

<link href="/assets/css/main.07a59de7b920cd76b874.css" rel="stylesheet"></head>

<body class="noscroll">
    <div class="app-container app-theme-white body-tabs-shadow">
            <div class="app-container">
                <div class="h-100 bg-plum-plate bg-animation">
                    <div class="d-flex h-100 justify-content-center align-items-center">
                        <div class="mx-auto app-login-box col-md-8">
                            <div class="app-logo-inverse mx-auto mb-3"></div>
                            <div class="modal-dialog w-100 mx-auto">
                                <div class="modal-content">
                                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <?php echo session()->getFlashdata('error'); ?>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <?php endif; ?>
                                    <div class="modal-body">
                                         <div class="h5 modal-title text-center">
                                            <h4 class="mt-2">
                                            <div>Welcome back,</div>
                                                <span>Please sign in to your account below.</span>
                                            </h4>
                                            
                                        </div>
                                        <form action="/login" method="POST">
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="position-relative form-group"><input name="Myemail" id="exampleEmail" placeholder="Email here..." type="email" class="form-control"></div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="position-relative form-group"><input name="Mypassword" id="password" placeholder="Password here..." type="password" class="form-control" ></div>
                                                </div>
                                            </div>
                                            <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick="showPass()">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Show Password
                                            </label>
                                            </div>
                                            <script>
                                            function showPass() {
                                            var x = document.getElementById("password");
                                            if (x.type === "password") {
                                                x.type = "text";
                                            } else {
                                                x.type = "password";
                                            }
                                            } 
                                            </script>
                                            
                                        
                                <div class="modal-footer clearfix">
                                        <div class="float-right">
                                            <button class="btn btn-primary btn-lg">Login to Dashboard</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                            <div class="text-center text-white opacity-8 mt-3">Copyright © KeroUI 2019</div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
<script type="text/javascript" src="/assets/scripts/main.07a59de7b920cd76b874.js"></script></body>
</html>
