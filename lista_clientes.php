<?php require 'header.php'; ?>
<h1>Lista usuario</h1>
    <table>

      <th>id</th>
      <th>nome</th>
      <th>Data de nascimento</th>
      <th>Login</th>
      <th>Data da criação</th>

    <?php
      $result_cliente = "SELECT * FROM clientes";
      $resultado_clientes = $conectar->getconecatar()->prepare($result_cliente);
      $resultado_clientes->execute();

      while ($row_clientes = $resultado_clientes->fetch(PDO::FETCH_ASSOC))
      {
        echo "<tr><td>".$row_clientes['id_cliente'].'</td> <td>'.$row_clientes['nome'].'</td> <td>'.$row_clientes['Data_de_nacimento'].'</td> <td>'.$row_clientes['Login'].'</td> <td>'.$row_clientes['data_criada']."</td></tr>";
      }

     ?>
   </table>
  </body>

</html>
