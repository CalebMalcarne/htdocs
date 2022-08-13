<?php
class User {
    public $_username = "null";
    public $_userpass = "null";
    public $_auth = 0;


    function getUsername() {
        return $this -> _username;
    }

    function getUserpass() {
        return $this -> _userpass;
    }

    function getAuth() {
        return $this -> _auth;
    }
    //-----------------------------//

    function setUsername($username){
        $this -> _username = $username;
    }

    function setUserpass($userpass){
        $this -> _userpass = $userpass;
    }

    function setAuth($auth){
        $this -> _auth = $auth;
    }
}
?>
