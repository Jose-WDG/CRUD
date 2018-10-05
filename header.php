<?php require 'Conexao.php';
    $conectar = new Conexao();
    $conectar->getconectar();
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
    table tr{
      height: 30px;
    }
    table tr td
    {
      text-align: center;
    }
    table tr:nth-child(2n){
      background-color: #00bcd4a6;
    }
    table tr td a{
      background-color: #000;
      text-decoration: none;
      border: solid #000 3px;
      border-radius: 5px;

      color: #ffff;
    }
    table tr td a:hover{

      background-color: #fff;
      border: solid #fff 3px;
      color: #000;

    }
    nav{
      height: 30px;
      width: 100%;
      background-color: black;
    }
    ul li{
      display: inline-block;
      margin: 5px;

    }
    ul li a{
      color: #fff;
    }
    .container{
      width:1200px;
      margin:0 auto;
    }
    </style>
  </head>

  <body>
    <nav>
      <ul class="container">
        <li><a href="index.php">Cadastrar</a>
        <li><a href="lista_clientes.php">Lista de usuario</a>

      </ul>
    </nav>
    <div class="container">
