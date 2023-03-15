<?php
namespace shop\models;
require_once "BaseModel.php";

class Login extends BaseModel{
     
    public $login;
    private $password;
    private bool $isValid;
    private $id;
    
    public function __construct($con, $login,$password)
    {   parent::__construct($con);

        $this->login = strtoupper($login);
        $this->password = $password;
        
    }

    public function getId() :int
    {
      return $this->id;
    }
    
    public function tryLogin() :bool
    {   
        $stmt = ($this->con)->prepare(
            "select id, pass from logins where login=:login");
        $stmt->bindParam(':login', $this->login);
        $stmt->execute();
        $res = $stmt->fetch(\PDO::FETCH_ASSOC);
      
        $loginHash = $res['pass'];
        $this->id = $res['id']; 
        //----- check pass
        $this->isValid =  password_verify($this->password . strtoupper($this->login),$loginHash);

        return $this->isValid;

    }

}