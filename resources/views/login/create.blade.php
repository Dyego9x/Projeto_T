<!DOCTYPE html>
<html lang="pt">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Criar Conta</title>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">  
    



</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Criar conta!</h1>
                            </div>
                            <form class="user" action="/login/salvar" method="post">
                                @csrf
                                <div class="form-group row">
                                    
                                    <input type="text" class="form-control form-control-user" id="nome" name="nome" style="text-align: center"
                                        placeholder="Nome completo" maxlength="60">
                                                                     
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="cpf" name="cpf" style="text-align: center"
                                        placeholder="CPF" maxlength="14">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="email" name="email" style="text-align: center"
                                        placeholder="E-mail" maxlength="60">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" style="text-align: center"
                                            id="senha" name="senha" placeholder="Senha" maxlength="50">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" style="text-align: center"
                                            id="repsenha" name="repsenha" placeholder="Confirme a senha" maxlength="50">
                                    </div>
                                </div>

                                <div style="align-items: center !important;">
                                    <button type="submit" class="btn btn-primary btn-user btn-block">Registrar</button>
                                </div>   

                                <hr>
                                <div class="text-center">
                                    <a class="small" href="/login/esqueceu-senha">Esqueceu a senha?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="/login">Já possui conta? Entrar!</a>
                                </div>
                            </form>
                            <hr>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>     


    <script src="{{ asset('js/login.js')}}" type="text/javascript"></script>
       <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ asset('js/jquery.mask.min.js')}}"></script>

</body>

</html>