<?php 

$conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// else {
//     echo "Connected";
// }

// try {
//     $conn = new PDO("mysql:host=$server;dbname=lija", $user, $pass);
//     // $connect = new PDO("mysql:host=localhost;dbname=i5876163_wp1", $user, $pass);

//     // set the PDO error mode to exception
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     echo "Connected successfully";
//   } catch(PDOException $e) {
//     echo "Sorry!! Connection failed: " . $e->getMessage();
//   }




$link = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
if (!$link){
	die("Failed to connect: ". mysqli_connect_error());
}



class DatabaseConnection{

    private $host;
    private $user;
    private $pass;
    private $db;

    public $conn;

    public function __construct() {

        $this->db_connect();

      }

    function db_connect(){

        $this->host = DBHOST;
        $this->user = DBUSER;
        $this->pass = DBPASS;
        $this->db   = DBNAME;

        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);

        return $this->conn;

    }

}// DatabaseConnection end



trait  DBConnection{

    private $host;
    private $user;
    private $pass;
    private $db;

    public $conn;

    public function __construct() {

        $this->db_connect();

      }

    function db_connect(){

        $this->host = DBHOST;
        $this->user = DBUSER;
        $this->pass = DBPASS;
        $this->db   = DBNAME;

        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
        return $this->conn;

    }

}// DatabaseConnection end


?>