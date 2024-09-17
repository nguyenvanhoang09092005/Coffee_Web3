<?php
    class Database{   
    private $hostname = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'cuoiki1';

    private $conn = NULL;
    private $result = NULL;

    #Connect
    public function connect(){
        $this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
        if(!$this->conn){
            echo 'Failed connection';
            exit;
        }else{
            mysqli_set_charset($this->conn, 'utf8');
           // echo 'Connected';
        }

        return $this->conn;
    }
    #execute sql
    public function execute($sql) {
        $this->result = $this->conn->query($sql);
        return $this->result;
    }

    #get Data
    public function getData(){
        if($this->result){
            $data = mysqli_fetch_array($this->result);
        }else{
            $data = 0;
        }
        return $data;
    }

    #get All Data
    public function getAllData($table){
        $sql = "SELECT * FROM $table";
        $this->execute($sql);
        if(!$this->num_rows() == 0){
            $data = 0;
        }else{
            while($datas = $this->getData()){
                $data[]= $datas;
            }
        }
        return $data;
    }

    //  #get Data by Id
    //  public function getDataByID($table, $id){
    //     $stmt = $this->conn->prepare("SELECT *FROM $table WHERE id = ?");
    //     $stmt->bind_param("i", $id);
    //     $stmt->execute();
    //     $result = $stmt->get_result();
    //     if($result->num_rows > 0){
    //         return $result->fetch_assoc();
    //     }else{
    //         return 0;
    //     }        
    // }
    
    #Count
    public function num_rows(){
        if($this->result){
            $num = mysqli_num_rows($this->result);  
        }else{
            $num = 0;
        }
        return 0;
    }    
    
    #Insert Data Account
    public function Insert($user, $pass) {
        $sql = "INSERT INTO danhsachtaikhoannguoidung(username, password) VALUES(?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $user, $pass); // 's' for string type
        $password = password_hash($pass, PASSWORD_DEFAULT); // Hash the password before inserting
        $stmt->execute();
        return $stmt->affected_rows; // Use affected_rows to check if insert was successful
      }

    #Update Data
    public function Update($user, $pass){
        $sql = "UPDATE danhsachtaikhoannguoidung SET password = '$pass'
                WHERE username ='$user'";
        return $this->execute($sql);
    }

    #Delete Data
    public function Delete($user, $table){
        $sql = "DELETE FROM $table WHERE username = '$user'";
        return $this->execute($sql);
    }
    
}
?>