<?php
require_once('conn.php');

//NECESSÁRIO PARA O EXCEL
require_once "vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
?>
<html lang="pt-Br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="GGV ">
    <meta name="author" content="Gabriel Blanes">

    <title>SMS</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.css" rel="stylesheet">

    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>

    <script type="text/javascript" src="index.js"></script>

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
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Sistema - Envio de consentimento único</h1>
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Menu</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="row">
                                    <form action="index.php" method="POST" enctype="multipart/form-data">    
                                    <div class="row">
                                        <div class="col-lg-4 mb-4">
                                            <input style="text-align: center;" type="text" name="numero" id="numero" class="form-control bg-light border-0 small" placeholder="Número" aria-label="Search" aria-describedby="basic-addon2" data-mask="(00) 00000-0000">
                                        </div>
                                        <div class="col-lg-8 mb-4">
                                            <input style="text-align: center;" type="file" name="excel" id="excel" class="form-control bg-light border-0 small" placeholder="" aria-label="Search" aria-describedby="basic-addon2" accept=".xls">
                                        </div>
                                    </div>
                                          
                                       
                                        <!--<div class="col-lg-12 mb-4">
                                            <div class="card bg-vitta text-white shadow">
                                                <a onclick="enviaSms();">
                                                    <div class="card-body">
                                                        Enviar unico
                                                        <div class="text-white-50 small">Dados</div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>-->


                                        <div class="col-lg-12 mb-4">
                                                <div class="card bg-vitta text-white shadow">
                                                    <button type="submit" id="BtnUpload" name="BtnUpload" class="btn">
                                                        <div class="card-body" style="color: #FFF;">
                                                            Enviar
                                                           
                                                        </div>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Mensagem</h6>
                                </div>
                                <div class="card-body text-gray-800" name="msg" id="msg"> A NOME DA SUA EMPRESA gostaria de pedir o seu consentimento para uso seguro e responsável das suas informações, caso queria saber mais sobre o que faremos com os seus dados leia nossa <a href="https://vacivitta.com.br/politica"> politica de privacidade</a> .  Por favor, responda com "sim" para concordar com o consentimento, caso contrário responda está mensagem com "não".
                                </div>
                            </div>
                        </div>



                        <?

                        //Se botão enviar for pressionado
                        if (isset($_POST['BtnUpload'])) {

                            //Verifico se o campo número foi preenchido, se sim, faço o envio de sms simples. Senão, faço o evio de lote.
                            if($_POST['numero'] != '' || $_POST['numero'] != NULL ){
                                echo "<script>enviaSms('".$_POST['numero']."');</script>";

                            }else if($_FILES['excel']['name'] != NULL || $_FILES['excel']['name'] != '' ){
                                $arquivo = $_FILES['excel'];

                                $dir = "uploads/";
                                if (move_uploaded_file($arquivo['tmp_name'], "$dir/" . $arquivo['name'])) {

                                    $inputFileName = $dir . $arquivo['name'];
                                    $inputFileType = 'Xls';

                                    /**  Create a new Reader of the type defined in $inputFileType  **/
                                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                                    $spreadsheet = $reader->load($dir . $arquivo['name']);
                                    $sheetdata = $spreadsheet->getActiveSheet()->toArray();

                                ?>
                                <div class="col-xl-12 col-lg-12">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Dados do arquivo: </h6>
                                        </div>
                                        <div class="card-body text-gray-800" >
                                            <table class="table">
                                                <th>Nome:</th>
                                                <th>Número:</th>
                                                <?

                                                //Percorro o arquivo e exibo os dados:
                                                $telefones = "";
                                                $sheetcount =  count($sheetdata);

                                                for ($i = 0; $i <= $sheetcount - 1; $i++) {
                                                    if ($sheetdata[$i][0] != '') {
                                                        echo "<tr>";
                                                        echo "<td>";
                                                        echo $nome = $sheetdata[$i][0];
                                                        echo "</td>";
                                                        echo "<td>";
                                                        echo $numero = $sheetdata[$i][1];
                                                        echo "</td>";
                                                        echo "<tr>";
                                                        $telefones .= $numero . ";";
                                                    }
                                                }
                                                ?>

                                            </table>
                                            <? //DEBUG ARRAY NUMEROS print_r($telefones);
                                            ?>

                                            <!-- Armazeno os dados em um imput para pegar em js-->
                                            <input type="text" name="ArrTelefone" id="ArrTelefone" style="display: none;" value="<? echo $telefones; ?>">
                                            <div class="card bg-vitta text-white shadow">
                                                <div class="card-body" align="center">
                                                    <button type="button" name="enviar" id="enviar" class="btn" onclick="enviaSmsLote()">
                                                        <spam style="color: #FFF; font-size:20px;">Confirmar Envio</spam>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             <?
                                }else{
                                    //echo "<script>alert('Não foi inserido um arquivo EXCEL, por favor insira');</script>";
                                }

                            }else{
                                echo "<script>alert('Preencha uma das opções de envio !');</script>";
                            }

                        } //Fim do botão enviar
                        ?>




                        <div class="col-lg-12 mb-4">
                            <div class="card bg-vitta text-white shadow">
                                <div class="card-body">
                                    <div class="card-body" align="center">
                                        <a href="/relatoriosms/index.php">
                                            <button type="submit" id="Btn" name="Btn" class="btn">
                                            <spam style="color: #FFF; font-size:20px;">Relatório</spam>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- Content Row -->
                        <div class="row">
                            <div class="col-lg-6 mb-4">
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

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top" style="display: none;">
            <i class="fas fa-angle-up"></i>
        </a>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.8/jquery.mask.js" integrity="sha512-2Pv9x5icS9MKNqqCPBs8FDtI6eXY0GrtBy8JdSwSR4GVlBWeH5/eqXBFbwGGqHka9OABoFDelpyDnZraQawusw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            src = "https://cdn.datatables.net/1.11.5/js/dataTables.semanticui.min.js"
        </script>
        <script>
            src = "https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.js"
        </script>




        <!-- Bootstrap core JavaScript-->
        <script src="assets/vendor/jquery/jquery.min.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="assets/js/sb-admin-2.min.js"></script>

        <script type="text/javascript">

            function enviaSmsLote() {

                var xmlreq = CriaRequest();

                var numeros = document.getElementById("ArrTelefone").value;
                var mensagem = document.getElementById("msg").innerHTML;
                mensagem = mensagem.replace('<a href="https://NOME DA SUA EMPRESA.com.br/politica">','');
                mensagem = mensagem.replace('</a>','');
                mensagem = mensagem.replace('<br><br>','');
                mensagem = mensagem.replace('"não"','não');
                mensagem = mensagem.replace('"sim"','sim');
                //console.log(mensagem);

                var myArray = numeros.split(";");
                //console.log(myArray.length);
                for (i = 0; i <= myArray.length - 3; i++) {
                    //console.log(myArray[i]);

                    let numero = myArray[i];
                    console.log("Enviado numero " + numero);
                    // Iniciar uma requisição
                    $.ajax({
                        url: 'sms.php?numero=' + numero + '&msg=' + mensagem,
                        type: "GET",
                        dataType: 'json',
                        success: function(data) {
                            console.log(data);
                        },
                        error: function(request, status, error) {
                            console.log(request.responseText);
                        }
                    });

                } //For Array

                alert("Envio Relizado com sucesso !");
                window.location.href = "index.php";
                }




        </script>

</body>

</html>