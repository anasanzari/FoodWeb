<?php

class Session {

    const USER_ADMIN = 1;
    const USER_REGULAR = 2;

    private $loggedin = false;
    private $username;
    private $usertype;

    function __construct() {
        session_start();
        $this->checkLogin();
    }

    private function checkLogin(){
        if(isset($_SESSION['username'])&&isset($_SESSION['usertype'])){
            $this->username = $_SESSION['username'];
            $this->usertype = $_SESSION['usertype'];
            $this->loggedin = true;
        }else{
            unset($this->username);
            unset($this->usertype);
            $this->loggedin = false;
        }
    }

    function forceLogin($loc){
      if(!$this->getLoggedin()){
        header("Location: ".$loc);
      }
    }

    function logIn($user,$user_type){
        if(!$user) return;
        $this->username = $_SESSION['username'] = $user;
        $this->usertype = $_SESSION['usertype'] = $user_type;
        $this->loggedin = true;
    }

    function logOut(){
        unset($_SESSION['username']);
        unset($_SESSION['usertype']);
        unset($this->username);
        unset($this->usertype);
        $this->loggedin = false;
    }

    function getLoggedin() {
        return $this->loggedin;
    }

    function getUsername() {
        return $this->username;
    }

    function getUsertype() {
        return $this->usertype;
    }

}

?>
