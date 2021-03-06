<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Importar Notas</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Projeto T</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../sistema/inicio">
                    <i class="fa fa-flag"></i>
                    <span>Tela inicial</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>            

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">                
                <a class="nav-link collapsed" href="{{asset('/sistema/listar-notas')}}" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-list-ol"></i>
                    <span>Listar Notas</span>
                </a>                
            </li>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>                            
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->                            
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle fa fa-sign-out" href="/sistema/logout" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Logout</span>                               
                            </a>                            
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Importar Notas</h1>                        
                    </div>      
                    @if(session('mensagem'))
                        <div class="alert alert-success">
                            <p>{{session('mensagem')}}</p>
                        </div>
                    @endif
                    @if(session('erro'))
                        <div class="alert alert-success">
                            <p>{{session('mensagem')}}</p>
                        </div>
                    @endif
                    <form class="user" action="/login/salvarNota" method="post" enctype="multipart/form-data"> 
                        @csrf
                        <br>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" >
                            <div class="form-group">
                                <h3>Data da Nota:</h3>
                                <input type="date" name="dataArquivo" id="dataArquivo" class="form-control form-control-user" style="text-align: center" required>
                            </div>                            
                        </div>  
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" >
                            <div class="form-group">
                                <h3>N??mero da Nota:</h3>
                                <input type="text" name="numeroNota" id="numeroNota" class="form-control form-control-user" style="text-align: center" required>
                            </div>                            
                        </div>  
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" >
                            <div class="form-group">
                                <h3>Valor da Nota:</h3>
                                <input type="value" name="valorNota" id="valorNota" class="form-control form-control-user" style="text-align: center" required>
                            </div>                            
                        </div>                                                     
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" >
                            <div class="form-group">
                                <br>                                
                                <label class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" for="arquivoNota">Importe o arquivo da nota</label>
                                <span tabindex="1" class="popover-icone icone-pequeno" data-toggle="popover" data-placement="bottom" data-trigger="focus">                        
                                </span> <br>                                    
                                <input type="file" class="imagemEcpf form-control" style="display: none" name="arquivoNota" id="arquivoNota" required>
                            </div>                            
                        </div>
                        <br>  
                        <div style="align-items: center !important;">
                            <button type="submit" class="btn btn-primary btn-user btn-block">Importar</button>
                        </div>                                      
                    </form>                    
                    <!-- Content Row -->                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->            

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>    

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ asset('js/jquery.mask.min.js')}}"></script>

    <script src="{{ asset('js/importarNotas.js')}}" type="text/javascript"></script>

</body>

</html>