<?php
/**
 * Classe responsável pela conexão com o banco de dados.
 *
 * @author: Marcelo Zilio Correa
 * @since: 01/05/2018
 */
class ConnectionDataBase extends PDO
{
    private static $connection=null;
    
    public function ConnectionDataBase($dsn, $usuario, $senha)
    {
        parent::__construct($dsn, $usuario, $senha);
    }
    
    public static function getConnection()
    {
        if (!isset(self::$connection)) {
            try {
                self::$connection = new ConnectionDataBase("mysql:dbname=manipulating-macros;host=localhost", "root", "root", array('charset'=>'utf8'));
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$connection->query("SET CHARACTER SET utf8");
            } catch (Exception $ex) {
                echo 'Não foi possível conectar-se ao banco de dados.';
                exit();
            }
        }
        return self::$connection;
    }
}