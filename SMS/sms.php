<?php

    require_once('conn.php');

    $numero = mysqli_escape_string ($mysqli,$_GET['numero']);
    $mensagem = mysqli_escape_string($mysqli,$_GET['msg']);

    //Verifico se ja tem numero
    $queryFone = "SELECT sms_fone from sms_cadastro WHERE sms_fone = '$numero'";
    $resultado = mysqli_query($mysqli,$queryFone);
    $linha = mysqli_fetch_array($resultado);
    if($linha['sms_fone'] != ''){
        //echo $linha['sms_fone'];
        echo "1";
        exit;
    }else{
        echo "0";
    }
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>


$(document).ready(function(){
    var fone = "<?echo $numero;?>";
    var msg = "<?echo $mensagem;?>";
    console.log(fone);
    console.log(msg);
    $.ajax({
        'url':'https://api.smsdev.com.br/v1/send?key= SUA KEY AQUI &type=9&number=' + fone + '&msg=' + msg,
        'type': "GET",
        'dataType': 'json',
        'success': function(dado){
            console.log(dado);
        }
    })
    console.log("enviou");
});


</script>