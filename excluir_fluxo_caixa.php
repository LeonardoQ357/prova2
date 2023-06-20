<?php
    include('conexao.php');

    $sql = "DELETE FROM fluxo_caixa WHERE id='". $_GET['id'] ."'";
    $result = mysqli_query($con, $sql);

    if($result){
        header('Location:listar_fluxo_caixa.php');
    }else{
        echo "Erro ao tentar excluir dados: ". $mysql_error($con) ."!";
        echo
        "<div>
            <a href='listar_fluxo_caixa.php'>Voltar</a>
        </div>"; 
    }
?>