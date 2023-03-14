<?php
namespace shop\models;
//require_once "../db/dbo.php";

class Login{
     
    public $login;
    private $password;
    private $con;
    
    public function __construct($con, $login,$password)
    {
        $this->login = $login;
        $this->password = $password;
        $this->con = $con;
    }


    public function tryLogin() :bool
    {   
        $stmt = $this->con->prepare(
            "select pass from logins where login=:login");
        $stmt->bindParam(':login', $this->login);
        $stmt->execute();
        $res = $stmt->fetch();
        foreach($res as $row) $loginHash = $row;   
        //----- check pass
        return 
        password_verify($this->password . strtolower($this->login),$loginHash);

    }


}