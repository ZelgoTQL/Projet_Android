<?php
class Database
{
     static protected $instance = null;
     protected $db;
     public function __construct()
    {
     $this->db = new PDO(
     "mysql:host=localhost;dbname=neveswap_mabase;charset=utf8","neveswap_admin","Moniparty35$");
    }
     public static function getConnexion()
 {
     if (is_null (self::$instance)) {
        self::$instance = new Database();
 }
    return self::$instance;
 }
     public function __call($method, array $arg) {
     // Si on appelle une méthode qui n'existe pas, on
     // delegue cet appel à l'objet PDO $this->db
     return call_user_func_array(array($this->db, $method), $arg);
 }
}
?> 
