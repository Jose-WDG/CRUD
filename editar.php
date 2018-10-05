<?php require 'header.php';?>
<?php
 //pesquisando dados do usuario
 $id=filter_input(INPUT_GET,"id",FILTER_SANITIZE_NUMBER_INT);
 $limiti = 1;
 $resul_editar = "SELECT * FROM clientes WHERE id_cliente=:id LIMIT :limiti";
 $resul_editar = $conectar->getconectar()->prepare($resul_editar);
 $resul_editar->bindParam(':id',$id,PDO::PARAM_INT);
 $resul_editar->bindParam(':limiti',$limiti,PDO::PARAM_INT);

 $resul_editar->execute();

 $row_editar = $resul_editar->fetch(PDO::FETCH_ASSOC);
 ?>

<h1 style="text-align:center;">Editar usuario</h1>
    <form name="editar_cliente" action="" method="post">
      <input type="hidden" name="id_cliente" value="<?php echo $row_editar['id_cliente']; ?>">
      <label>Nome: </label>
      <input type="text" name="nome" placeholder="Nome" value="<?php echo $row_editar['nome']; ?>"><br><br>

      <label>E-mail: </label>
      <input type="text" name="Email" placeholder="E-mail" value="<?php echo $row_editar['Email']; ?>"><br><br>

      <label>Data de nacimento: </label>
      <input type="text" name="Data_de_nacimento" placeholder="Data de nacimento" value="<?php echo $row_editar['Data_de_nacimento']; ?>"><br><br>

      <label>Login: </label>
      <input type="text" name="Login" placeholder="Login de acesso"  value="<?php echo $row_editar['Login']; ?>"><br><br>

      <label>Senha: </label>
      <input type="password" name="Senha" placeholder="Senha"><br><br>

      <input type="submit" value="Editar" name="evniar_edicao">

    </form>
    <?php
 //editando dados do usuario
 $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
 
 if(!empty($dados['evniar_edicao'])):
    unset($dados['evniar_edicao']);
    
        $resul_up_cliente = "UPDATE clientes SET nome=:nome,Email=:Email,Data_de_nacimento=:Data_de_nacimento,Login=:Login,Senha=:Senha where id_cliente =:id";
        $resul_up_cliente = $conectar->getconectar()->prepare($resul_up_cliente);
        $resul_up_cliente->bindParam(':nome',$dados['nome']);
        $resul_up_cliente->bindParam(':Email',$dados['Email']);
        $resul_up_cliente->bindParam(':Data_de_nacimento',$dados['Data_de_nacimento']);
        $resul_up_cliente->bindParam(':Login',$dados['Login']);
        $resul_up_cliente->bindParam(':Senha',$dados['Senha']);
        $resul_up_cliente->bindParam(':id',$dados['id_cliente']);
    
        //$resul_up_cliente->execute();
        if($resul_up_cliente->execute()):
            echo "<h2 style='text-align: center;'>editado com sucesso</h2>";
        else:
            echo "<br><h2>ERRO!!!</h2>";
        endif;
   
     

 
 endif;
 ?>
<?php require 'footer.php';?>


    
