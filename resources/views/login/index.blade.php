<!DOCTYPE html>
<html lang="pt">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="asset{{('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Acessar plataforma</h1>
                                    </div>
                                    @if(session('mensagem'))
                                        <div class="alert alert-success">
                                            <p>{{session('mensagem')}}</p>
                                        </div>
                                    @endif
                                    @if(session('mensagemErro'))
                                        <div class="alert alert-danger">
                                            <p>{{session('mensagem')}}</p>
                                        </div>
                                    @endif
                                    <form class="user" action="/login/acessar" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="emaillogin" name="emaillogin" aria-describedby="emailHelp"
                                                placeholder="exemplo@hotmail.com">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="senhalogin" name="senhalogin" placeholder="Senha">
                                        </div>                                                                                
                                        <div style="align-items: center !important;">
                                            <button type="submit" class="btn btn-primary btn-user btn-block">Acessar</button>
                                        </div>                                                                                                                         
                                        <hr>
                                        <div class="text-center">
                                            <a class="small" href="/login/esqueceu-senha">Esqueceu a senha?</a>
                                        </div>
                                        <div class="text-center">
                                            <a class="small" href="/login/criar">Criar sua conta!</a>
                                        </div>
                                    </form>
                                    <hr>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ asset('js/jquery.mask.min.js')}}"></script>
    <script src="{{ asset('js/login.js')}}" type="text/javascript"></script>

        

</body>

</html>
