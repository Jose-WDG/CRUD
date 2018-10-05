<?php require 'Conexao.php';
    $conectar = new Conexao();
    $conectar->getconecatar();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>CRUD</title>
    <style>
    *{
      margin: 0;
      padding: 0;
      font-size: 100%;
    }
    table{
      width: 100%;
    }
    
    table tr td
    {
      text-align: center;
    }

    nav{
      height: 30px;
      width: 100%;
      background-color: blue;
    }
    ul li{
      display: inline-block;
      margin: 5px;

    }
    ul li a{
      color: #fff;
    }
    </style>
  </head>

  <body>
    <nav>
      <ul>
        <li><a href="index.php">Cadastrar</a>
        <li><a href="lista_clientes.php">Lista de usuario</a>
      </ul>
    </nav>
