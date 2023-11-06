
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('template/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="ttps://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('template/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('template/css/style.css')}}" rel="stylesheet">

</head>

<body class="">
            <div class="container">
                <div class="row d-flex justify-content-center mt-5">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card py-3 px-2">
                        
                            <div class="row mx-auto ">
                                <div class="col-sm-12">
                                    <img class="img-fluid" src="{{asset('template/img/logo.png')}}" alt="">
                                </div>
                            </div>
                            <h4 class="text-center mb-3 mt-2">Login </h4>
                            <div class="division">
                                <div class="row">
                                    <div class="col-3"><div class="line l"></div></div>
                                    <div class="col-6"><span>Login Using Username</span></div>
                                    <div class="col-3"><div class="line r"></div></div>
                                </div>
                            </div>
                            <form class="user myform" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <input name="username" type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="NIP/NIM">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg"><small><i class="far fa-user pr-2"></i>Login</small></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('template/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('template/js/sb-admin-2.min.js')}}"></script>

</body>

</html>
