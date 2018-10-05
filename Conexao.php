<?php
class Conexao
{
  public static $host = "localhost";
  public static $usuario = "root";
  public static $senha = "";
  public static $dbnome = "holly";
  private static $conexao = null;

  private static function conectar()
  {
    try
    {
      if(!self::$conexao):
          self::$conexao = new PDO('mysql:host='.self::$host.';dbname='.self::$dbnome, self::$usuario, self::$senha);
      endif;

    }
    catch (\Exception $e)
    {
      echo "Mensagem: ".$e->getMessage();
      die;
    }
    return self::$conexao;

  }

  public function getconectar()
  {
    return self::conectar();
  }
}
