<?php
include_once('conn.php');
?>
<html lang="pt-Br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="GGV ">
    <meta name="author" content="Gabriel Blanes">

    <title>SMS</title>

    <!-- CSS Datatable-->
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.css" rel="stylesheet">
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-vitta sidebar sidebar-dark accordion troggled toggled" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand align-items-center justify-content-center">
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
                <div class="sidebar-brand-text mx-3">SMS <sup>V1221.0</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">


            <hr class="sidebar-divider d-none d-md-block">
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-vitta topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Nav Item - User Information -->
                    <li class="align-nav nav-item dropdown no-arrow">

                    </li>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Alerts -->

                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800" style="text-align: center;">Sistema - Relatório  de SMS</h1>
                    </div>
                    <div class="row">

                        <!--
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!- Card Header - Dropdown ->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Menu</h6>
                                </div>
                                <!- Card Body ->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12 mb-4">
                                            <div class="card bg-vitta text-white shadow">
                                                <a onclick="dadosajax()">
                                                    <div class="card-body">
                                                        Atualizar
                                                        <div class="text-white-50 small">Dados</div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        -->


                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary" style="text-align: center;">SMS Cadastros</h6>

                                    <div class="card bg-vitta text-white shadow" align="right">
                                        <a onclick="dadosajax()">
                                             <div style="width: 248px; height: 30px; "  class="card-body" style="display: inline-block;"> 
                                            <i class="fa fa-refresh" aria-hidden="true"  style="width:auto; height:auto; padding-right:100px; padding-left:auto; padding-bottom:10px; padding-top: -50px; "  ></i>
                                                <div  class="text-white-50 small" style="display: inline-block;"></div>
                                            </div >
                                        </a>
                                    </div>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body text-black">
                                    <div id='addtable'></div>
                                    <table class="table table-striped" id="table" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID da Mensagem</th>
                                                <th scope="col">Resposta</th>
                                                <th scope="col">Telefone</th>
                                                <th scope="col">Data e hora</th>
                                                <th scope="col">Ação</th>
                                            </tr>


                                        </thead>

                                    </table>
                                    <!-- Modal de exclusão do sms cadastrado-->
                                     <div class="modal fade" id="modal_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-secondary" id="exampleModalLongTitle">SMS | Excluir</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="delet_sms.php" method="POST">
                                                    <div class="modal-body text-secondary">
                                                        <br>
                                                        <input type="hidden" name="sms_id" id="sms_id">

                                                        <br>
                                                        <h5>Tem certeza que deseja excluir estre número do sistema?</h5>
                                                        <br>
                                                        <h5 type="text" name="sms_fone" id="sms_fone"></h5>
                                                        <br>
                                                        <p>Por segurança armazenaremos na lixeira por 15 dias, caso necessite desse registro novamente no sistema dentro deste período contate o seu administrador do sistema.</p>
                                                        <br><br>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" class="btn btn-primary">Excluir</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <?php //} 
                                    ?>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-4">
                            <div class="card bg-vitta text-white shadow">
                                <div class="card-body">
                                    <div class="card-body" align="center">
                                        <a href="/SMS/index.php">
                                            <button type="submit" id="Btn" name="Btn" class="btn">
                                            <spam style="color: #FFF; font-size:20px;">Voltar</spam>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                <!-- Footer -->

                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.8/jquery.mask.js" integrity="sha512-2Pv9x5icS9MKNqqCPBs8FDtI6eXY0GrtBy8JdSwSR4GVlBWeH5/eqXBFbwGGqHka9OABoFDelpyDnZraQawusw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <!-- Bootstrap core JavaScript-->
        <script src="assets/vendor/jquery/jquery.min.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="assets/js/sb-admin-2.min.js"></script>

 
        

        <!-- Custom scripts Datatable-->
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
        <script>
            function abreModal(data0, data1) {
                $("#modal_delete").modal({
                    show: true
                });
                document.getElementById('sms_id').value = data0;
                document.getElementById('sms_fone').value = data1;

                var tag = document.getElementById('sms_fone');
                tag.innerHTML = '<h5>' + data1 + '</h5>'

            }

            /*

            function consolee(data) {
                console.log(data);
                if (confirm("Deseja realmente remover ?") == true) {
                    //console.log("Removeu!");
                    $.ajax({
                        url: 'delet_sms.php?sms_id=' + data,
                        type: "GET",
                        dataType: 'json'
                    })
                 //console.log("url: "+'delet_sms.php?sms_id='+data);
                    window.location.href = 'index.php';
                }
            }
            */

            $(document).ready(function() {
                $('#table').dataTable({

                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
                    },


                    "processing": true,
                    "ajax": "fetch_data.php",
                    "columns": [{
                            data: 'sms_msg_id'
                        },
                        {
                            data: 'sms_msg'
                        },
                        {
                            data: 'sms_fone'
                        },
                        {
                            data: 'sms_data'
                        },
                        {

                            data: {
                                data: 'sms_id',
                                data: 'sms_fone'
                            },

                            render: function(data) {
                                var data0 = data['sms_id'];
                                var data1 = data['sms_fone'];


                                var img = '<img src="images/remover.png" onclick="abreModal(\'' + data0 + '\',\'' + data1 + '\')";"></img>';
                                return img;

                            }
                        }




                    ]


                });
            });
        </script>

        <!-- Custom scripts-->
        <script>
            $(function() {
                $('[data-toggle="tooltip"]').tooltip()
            });


            function dadosajax() {
                var status = "1";

                $.ajax({
                    'url': 'https://api.smsdev.com.br/v1/inbox?key= SUA KEY AQUI &status=' + status,
                    'type': "GET",
                    'dataType': 'json',
                    'success': function(dado) {

                        var i = 0;
                        for (var i in dado) {
                            $.ajax({
                                type: "POST",
                                url: "insert.php",
                                data: {
                                    id: dado[i].id,
                                    msg: dado[i].descricao,
                                    fone: dado[i].telefone,
                                    data: dado[i].data_read

                                },
                                dataType: 'html',
                                success: function(data) {
                                    $('.lista').append(data);
                                }
                            });
                        }
                        document.location.reload(true);
                    }
                })

            }
        </script>

</body>

</html>