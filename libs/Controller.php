<?php

class Controller {

    function __construct() {
        //echo 'Main controller<br/>';
        $this->view = new View();
    }

    public function NeedAuth($param) {
        if ($param == true) {
            Session::init();
            $logged = Session::get('loggedIn');
            if ($logged == FALSE) {
                Session::destroy();
                header('location: ' . URL . 'login');
                exit();
            }
        } else {
            
        }
    }

    public function IsAuth() {
        if (isset($_SESSION['loggedIn'])) {
            $logged = Session::get('loggedIn');
            return $logged;
        } else {
            return FALSE;
        }
    }

    public function getRole($param) {
        if (isset($param) == TRUE) {
            //require 'libs/database.php';
            $ss = new Database();
            $sth = $ss->prepare('SELECT type FROM users WHERE id=:pp');
            $sth->execute(array(':pp' => $param));

            $data = $sth->fetchAll();
            return $data[0];
        } else {
            $ss = new Login_Model();
            if ($this->IsAuth()) {
                $ss = new Database();
                $sth = $ss->prepare('SELECT type FROM users WHERE id=:pp');
                require 'config/variable.php';
                $data = $sth->fetchAll();
                return $data[0];
            } else {
                return 'Not Logged in';
            }
        }
    }

    public function loadModel($name) {
        $path = 'models/' . $name . '_model.php';

        if (file_exists($path)) {
            require 'models/' . $name . '_model.php';

            $modelName = $name . '_Model';
            $this->model = new $modelName();
        }
    }

    

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

