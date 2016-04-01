<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of db_connection
 *
 * @author shichisen
 */
class db_connection {
    //put your code here
    private $servername = "";
    private $username = "";
    private $password = "";
    private $db_name = "";
    
    function __construct($servername, $username, $password, $db_name) {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->db_name = $db_name;
    }
    
    function getServername() {
        return $this->servername;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getDb_name() {
        return $this->db_name;
    }

    function setServername($servername) {
        $this->servername = $servername;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setDb_name($db_name) {
        $this->db_name = $db_name;
    }

    function getConnection(){
        $con = new mysqli($this->servername,$this->username,$this->password,$this->db_name);
        $con->set_charset("utf8");
        if ($con == FALSE){
            die("Error " . mysql_error());
        }else{
            return $con;
        }
    }
}
