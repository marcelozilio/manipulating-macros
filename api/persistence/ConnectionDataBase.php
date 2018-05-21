<?php
/**
 * Classe responsável pela conexão com o banco de dados.
 *
 * @author: Marcelo Zilio Correa
 * @since: 01/05/2017
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
                self::$connection = new ConnectionDataBase("mysql:dbname=manipulating-macros;host=localhost", "root", "");
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (Exception $ex) {
                echo 'Não foi possível conectar-se ao banco de dados.';
                exit();
            }
        }
        return self::$connection;
    }
}