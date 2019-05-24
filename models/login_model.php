<?php
class Login_Model extends Model{
    
    function __construct() {
        
        parent::__construct();
    }

    public function run() { 
        echo md5('test');
        $sth = $this->db->prepare("SELECT * FROM usersdata WHERE username = :login AND pwd = MD5(:password)");
        $sth->execute(array(
            ':login' => $_POST['login'],
            ':password' => $_POST['password']
        ));
        $data = $sth->fetchAll();
        //log($data);
        
        //var_dump($data);
        $count = $sth->rowCount();
        if ($count > 0){
            Session::init();
            Session::set('loggedIn', true);
            Session::set('UserName', $_POST['login']);
            Session::set('UserPass',$_POST['password']);
            Session::set('UserID',$data[0][0]);
            //Session::set('UserEmail',$data[0][3]);
            Session::set('UserRole',$data[0][3]);
            
            header('location: ' . URL .'dashboard');
        }else{
            header('location:  ../login');
        }
        //print_r($data);
    }

}


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

