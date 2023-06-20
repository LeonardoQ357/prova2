<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar fluxo caixa</title>
</head>
<body>
    <center><h1>Lista de fluxo de caixa</h1></center>
    <table align="center" border="1">
    <tr>
        <th>Código</th>
        <th>Data</th>
        <th>Tipo</th>
        <th>Valor</th>
        <th>Histórico</th>
        <th>Cheque</th>
        <th>Excluir</th>
    </tr>
    <?php
    include('conexao.php');

    $sql = "SELECT * FROM fluxo_caixa";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    if(mysqli_num_rows($result)>0){
        do{
            echo "<tr>";
            echo "<td>". $row['id'] ."</td>";
            echo "<td>". $row['data'] ."</td>";
            echo "<td>". $row['tipo'] ."</td>";
            echo "<td>". $row['valor'] ."</td>";
            echo "<td><a href='altera_fluxo_caixa.php?id=". $row['id'] ."'>". $row['historico'] ."</a></td>";
            echo "<td>". $row['cheque'] ."</td>";
            echo "<td><a href='excluir_fluxo_caixa.php?id=". $row['id'] ."'>Excluir</a></td>";
            echo "</tr>";
        }while($row = mysqli_fetch_array($result));

        echo "<tr>
                <td colspan='7'><center><a href='index.php'>Voltar</a></center></td>
              </tr>";
    }else{
        echo "<tr>
                <td colspan='7'><center><a href='index.php'>Voltar</a></center></td>
              </tr>";
        echo 
        "<div>
        Nenhuma registro encontrado.
        </div>";
    }
    ?>
</body>
</html>