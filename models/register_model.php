<?php

class Register_Model extends Model {

    function __construct() {

        parent::__construct();
    }

    public function run() {
        $pw = md5($_POST['password']);

        $sth = $this->db->prepare("INSERT INTO usersdata(username,pwd,role)VALUES(:username,:pwd,:role)");
        $sth->execute(array(
            ':username' => $_POST['login'],
            ':pwd' => $pw,
            ':role' => $_POST['ty']            
        ));

       // echo "INSERT INTO usersdata(username,pwd,role)VALUES(:username,:pwd,:email,:role)";
       header('location:  ../login');

        //print_r($data);*/
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

