<?php
class config
{
    private static $pdo = null;

    public static function getConnexion()
    {
        if (!isset(self::$pdo)) {
            try {
                self::$pdo = new PDO(
                    'mysql:host=localhost;dbname=espritlocation',
                    'root',
                    '',
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]
                );
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }
        return self::$pdo;
    }
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'espritlocation';
    public $db;

    public function __construct($host = null, $username = null, $password = null, $database = null)
    {
        if ($host != null) {
            $this->host = $host;
            $this->username = $username;
            $this->password = $password;
            $this->datebase = $database;
        }
        $this->db = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->database, $this->username, $this->password, array
        (
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
        )
        );
    }


    public function query($sql, $data = array())
    {
        $req = $this->db->prepare($sql);
        $req->execute($data);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }
}


?>