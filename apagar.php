<?php
session_start();
require 'conexao.php';


$id = filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT);

if(!empty($id)):
    $conectar = new conexao();
    $deletar = "DELETE FROM clientes WHERE  id_cliente=:id";

    $del_cliente = $conectar->getconectar()->prepare($deletar);
    $del_cliente->bindParam(':id',$id);
   
    if($del_cliente->execute()):
        header("Location: lista_clientes.php");
    endif;
    
else:
        header("Location: lista_clientes.php");

endif;