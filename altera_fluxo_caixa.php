<?php
    include('conexao.php');

    $sql = "SELECT * FROM fluxo_caixa WHERE id='". $_GET['id'] ."'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro fluxo caixa</title>
</head>
<body>
    <form action="altera_fluxo_caixa_exe.php" method="post">
        <input type="hidden" name="id" id="id" value="<?php echo $row['id'] ?>">

        <div>
            <label for="data">Data:</label>
            <input type="date" name="data" id="data" value="<?php echo $row['data'] ?>" disabled>
        </div>
        
        <div>
            <label for="tipo">Tipo:</label>
            <?php
            if($row['tipo'] == "Entrada"){
                echo "
                    <input type='radio' name='tipo' id='tipo' value='Entrada' checked>
                    <label for='entrada'>Entrada</label>
                    <input type='radio' name='tipo' id='tipo' value='Saída'>
                    <label for='saida'>Saída</label>
                ";
            }else{
                echo "
                    <input type='radio' name='tipo' id='tipo' value='Entrada'>
                    <label for='entrada'>Entrada</label>
                    <input type='radio' name='tipo' id='tipo' value='Saída' checked>
                    <label for='saida'>Saída</label>
                ";
            }
            ?>
        </div>

        <div>
            <label for="valor">Valor:</label>
            <input type="number" name="valor" id="valor" step=".01" value="<?php echo $row['valor'] ?>">
        </div>

        <div>
            <label for="hist">Histórico</label>
            <input type="text" name="hist" id="hist" value="<?php echo $row['historico'] ?>">
        </div>

        <div>
            <label for="cheque">Cheque:</label>
            <select name="cheque" id="cheque">
            <?php
                if($row['cheque'] == "Sim"){
                    echo "
                        <option value='Sim'>Sim</option>
                        <option value='Não'>Não</option>
                    ";
                }else{
                    echo "
                        <option value='Não'>Não</option>
                        <option value='Sim'>Sim</option>
                    ";
                }
            ?>
            </select>
        </div>

        <div>
            <button type="submit">Enviar</button>
        </div>

        <div>
            <a href="listar_fluxo_caixa.php">Voltar</a>
        </div>
        
    </form>
</body>
</html>