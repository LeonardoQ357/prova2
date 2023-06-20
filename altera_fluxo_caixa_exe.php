<?php
    include('conexao.php');

    $sql = "UPDATE fluxo_caixa SET data=now(), tipo='". $_POST['tipo'] ."', valor='". $_POST['valor'] ."', historico='". $_POST['hist'] ."', cheque='". $_POST['cheque'] ."' WHERE id='". $_POST['id'] ."'";
    $result = mysqli_query($con, $sql);

    if($result){
        header('location: listar_fluxo_caixa.php');
    }else{
        echo "Erro ao tentar alterar dados: ". $mysql_error($con) ."!";
        echo
        "<div>
            <a href='listar_fluxo_caixa.php'>Voltar</a>
        </div>"; 
    }
?>