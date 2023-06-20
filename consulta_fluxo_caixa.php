<?php
    include('conexao.php');

    if($_POST['tipo'] == 'entrada'){
        $sql = "SELECT sum(valor) valor FROM fluxo_caixa WHERE tipo = 'entrada'";
    }else if($_POST['tipo'] == 'saida'){
        $sql = "SELECT sum(valor) valor FROM fluxo_caixa WHERE tipo = 'saida'";
    }else if($_POST['tipo'] == 'saldo'){
        $sql =  "SELECT sum(case when tipo = 'entrada' then valor else 0 end) -
                        sum(case when tipo = 'saida' then valor else 0 end) as valor FROM fluxo_caixa";
    }

    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
</head>
<body>
    <div>
        <?php 
            if($_POST['tipo'] == 'entrada'){
                echo "
                <label for='saldo'>Saldo de entrada:</label>
                ".$row['valor']."
                ";
            }else if($_POST['tipo'] == 'saida'){
                echo "
                <label for='saldo'>Saldo de saída:</label>
                ".$row['valor']."
                ";
            }else if($_POST['tipo'] == 'saldo'){
                echo "
                <label for='saldo'>Saldo total:</label>
                ".$row['valor']."
                ";
            }
        ?>
    </div>
</body>
</html>