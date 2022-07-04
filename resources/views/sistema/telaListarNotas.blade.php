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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar dados da nota:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar" onclick="esconderModal()">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <form>
                            <input type="text" class="form-control" id="id_nota" name="id_nota" hidden>
                            <div class="form-group col-md-6">
                                <label for="recipient-name" class="col-form-label">Data Atual:</label>
                                <input type="text" class="form-control" id="atual-data" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="recipient-name" class="col-form-label">Nova Data:</label>
                                <input type="date" name="dataNota" id="dataNota" class="form-control form-control-user" style="text-align: center" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="message-text" class="col-form-label">Valor Atual:</label>
                                <input type="text" class="form-control" id="atual-valor" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="message-text" class="col-form-label">Novo valor:</label>
                                <input type="value" name="valorNota" id="valorNota" class="form-control form-control-user" style="text-align: center" required>
                            </div>
                        </form>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="esconderModal()">Fechar</button>
                    <button type="button" class="btn btn-primary" onclick="editarNota( id_nota.value, valorNota.value, dataNota.value)">Atualizar</button>
                </div>
            </div>
        </div>
    </div>

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
                <a class="nav-link collapsed" href="{{asset('/sistema/importar-notas')}}" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-list-ol"></i>
                    <span>Importar Notas</span>
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
                        <h1 class="h3 mb-0 text-gray-800">Listar Notas</h1>                        
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

                    <form class="user" action="/sistema/buscarNotas" method="post" enctype="multipart/form-data"> 
                        @csrf                                               
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                                            
                                <label class="control-label">
                                    Pagamento de:
                                </label>
                                <input type="date" class="form-control data datepicker" name="dataInicial" id="dataInicial"  autofocus />
                                
                            </div>
                        
                            <div class="col-md-3">
                                
                                <label class="control-label">
                                    Pagamento até:
                                </label>
                                <input type="date" class="form-control data datepicker" name="dataFinal" id="dataFinal"  />
                                
                            </div>
                            <div class="col-md-3">                                
                                <br>                                
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                                                
                        <br>
                        <br>
                        <button type="button" class="btn btn-primary" onclick="ativarModal()">Teste</button>
                        <div class="row">

                            <div class="col-md-12" id="total-datatable">

                                <hr />
                                <br />

                                <table class="table padrao table-striped table-bordered table-hover table-header-fixed order-column tabelaPersonalizadaX espacamento_fixo">

                                    <thead>

                                        <tr>
                                            <th>Nota</th>
                                            <th>Data</th>
                                            <th>Valor</th>
                                            <th>Arquivo</th>
                                            <th>Excluir</th>
                                            <th>Editar</th>                                            

                                        </tr>

                                    </thead>

                                    <tbody id="notas">
                                        <ul>
                                            @if ('dados')
                                                @foreach ($dados as $dado)
                                                    <tr>
                                                        <th name='numeroNota'>{{$dado->usuarionotaimportada_numero}}</th>
                                                        <th name='dataNota'>{{$dado->usuarionotaimportada_data}}</th>
                                                        <th name='valorNota'>{{$dado->usuarionotaimportada_valor}}</th>
                                                        <th name='baixarNota'><span><i class="fa fa-download" aria-hidden="true"></i></span></th>
                                                        <th name='excluirNota'><span onclick="excluirNota({{$dado->usuarionotaimportada_id}}, {{$dado->usuarionotaimportada_usuario_id}})"><i class="fa fa-trash" aria-hidden="true"></i></span></th>
                                                        <th name="editarNota"><span><i class="fa fa-wrench" aria-hidden="true" onclick="ativarModal('{{$dado->usuarionotaimportada_data}}' , '{{$dado->usuarionotaimportada_valor}}' , '{{$dado->usuarionotaimportada_numero}}', '{{$dado->usuarionotaimportada_id}}')"></i></span></th>                                            

                                                    </tr>                                                    
                                                @endforeach
                                            @endif
                                            
                                        </ul>
                                        
                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>
                                       
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
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <script src="{{ asset('js/listarNotas.js?v1')}}" type="text/javascript"></script>    


</body>

</html>