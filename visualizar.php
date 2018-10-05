<?php require 'header.php';?>
<h1 style="text-align: center;">VISUALIZAR USUÁRIO</h1>
<table>

      <th>id</th>
      <th>nome</th>
      <th>Data de nascimento</th>
      <th>Login</th>
      <th>Data da criação</th>
<?php

$id=filter_input(INPUT_GET,"id",FILTER_SANITIZE_NUMBER_INT);
$limiti = 1;
$result_cliente = "SELECT * FROM clientes WHERE id_cliente=:id LIMIT :limiti ";
$result_cliente = $conectar->getconectar()->prepare($result_cliente);
$result_cliente->bindParam(':id',$id,PDO::PARAM_INT);
$result_cliente->bindParam(':limiti',$limiti,PDO::PARAM_INT);
$result_cliente->execute();

$row_clientes = $result_cliente->fetch(PDO::FETCH_ASSOC);

echo "<tr><td>".$row_clientes['id_cliente'].'</td> <td>'.$row_clientes['nome'].
'</td> <td>'.$row_clientes['Data_de_nacimento'].'</td> <td>'.$row_clientes['Login'].
'</td> <td>'.$row_clientes['data_criada']."</td></tr>";


?>

</table>

<?php require 'footer.php';?>