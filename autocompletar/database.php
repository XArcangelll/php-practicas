<?php
class Database{
    private $dbhost;
    private $dbname ;
    private $username; 
    private $password ;
    private $charset ;

    public function __construct()
    {
        $this->dbhost    = 'localhost';
        $this->dbname       = 'animales';
        $this->username     = 'root';
        $this->password = "";
        $this->charset  = 'utf8mb4';
    }

    function connect(){
        try{
            $conexion = "mysql:host=" . $this->dbhost . ";dbname=" . $this->dbname . ";charset=" . $this->charset;

            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];

            $pdo = new PDO($conexion, $this->username, $this->password, $options);
            return $pdo;
        }catch(PDOException $e){
            print_r('Error de conexión: ' . $e->getMessage());
        }
    }
}
?>