<?php
class Database
{
private static $servername = "localhost";
private static $username = "root";
private static $password = "";
private static $dbname = "mysql";
     
    private static $conn  = null;
     
    public function __construct() {
        die('Init function is not allowed');
    }
     
    public static function connect()
    {
       // One connection through whole application
       if ( null == self::$conn )
       {     
        try
        {
          self::$conn =  new PDO( "mysql:host=".self::$servername.";"."dbname=".self::$dbname, self::$username, self::$password); 
        }
        catch(PDOException $e)
        {
          die($e->getMessage()); 
        }
       }
       return self::$conn;
    }
     
    public static function disconnect()
    {
        self::$conn = null;
    }
}
?>
     