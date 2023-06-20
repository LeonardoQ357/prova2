<?php
    include('conexao.php');

    $sql = "INSERT INTO fluxo_caixa (data, tipo, valor, historico, cheque) VALUES (now(), '". $_POST['tipo'] ."', '". $_POST['valor'] ."', '". $_POST['hist'] ."', '". $_POST['cheque'] ."')";
    $result = mysqli_query($con, $sql);

    if($result){
        echo "Dados cadastrados com sucesso!";
    }else{
        echo "Erro ao tentar cadastrar!";
    }

    echo
        "<div>
        <a href='index.php'>Voltar</a>
        </div>"; 
?>