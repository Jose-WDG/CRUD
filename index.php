    <?php require 'header.php'; ?>
    <?php 
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

      if(!empty($dados['evniar_Cadastro'])):
        unset($dados['evniar_Cadastro']);

        try {
          $consul_cadastrar = "INSERT INTO clientes (nome,Email,Data_de_nacimento,Login,Senha,data_criada) VALUES (:nome,:Email,:Data_de_nacimento,:Login,:Senha,NOW()) ";

          $cadastrar = $conectar->getconectar()->prepare($consul_cadastrar);

          $cadastrar->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
          $cadastrar->bindParam(':Email',$dados['Email'], PDO::PARAM_STR);
          $cadastrar->bindParam(':Data_de_nacimento',$dados['Data_de_nacimento'], PDO::PARAM_STR);
          $cadastrar->bindParam(':Login',$dados['Login'], PDO::PARAM_STR);
          $cadastrar->bindParam(':Senha',$dados['Senha'], PDO::PARAM_STR);

          $cadastrar->execute();

          if($cadastrar->rowcount()):
            echo "usuario cadastrado com sucesso!";

          endif;

        } catch (\Exception $e) {
          echo "Message: ".$e->getMessage();
        }

      endif;
    ?>
    <h1 style="text-align:center;">Cadastrar usuario</h1>
    <form name="novo_cliente" action="" method="post">
      <label>Nome: </label>
      <input type="text" name="nome" placeholder="Nome"><br><br>

      <label>E-mail: </label>
      <input type="text" name="Email" placeholder="E-mail"><br><br>

      <label>Data de nacimento: </label>
      <input type="text" name="Data_de_nacimento" placeholder="Data de nacimento"><br><br>

      <label>Login: </label>
      <input type="text" name="Login" placeholder="Login de acesso"><br><br>

      <label>Senha: </label>
      <input type="password" name="Senha" placeholder="Senha"><br><br>

      <input type="submit" value="Cadastrar" name="evniar_Cadastro">

    </form>

<?php require 'footer.php';?>
