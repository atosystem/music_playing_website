<?php

class Bootstrap {

    function __construct() {
        $url = isset($_GET['url']) ? $_GET['url'] : NULL;
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        //print_r($url);

        if (empty($url[0])) {
            $this->goindex();
            return FALSE;
        }

        $file = 'controllers/' . $url[0] . '.php';
        if (file_exists($file)) {
            require $file;
        } else {
            $this->goerror();
            return false;
        }

        $controller = new $url[0];
        $controller->loadModel($url[0]);

//calling method area
        if (isset($url[2])) {
            if (method_exists($controller, $url[1])) {
                $controller->{$url[1]}($url[2]);
            } else {

                $this->goerror();
                return FALSE;
            }
        } else {
            if (isset($url[1])) {
                if (method_exists($controller, $url[1])) {
                    $controller->{$url[1]}();
                } else {
                    $this->goerror();
                    return FALSE;
                }
            } else {
                $controller->index();
            }
        }
    }

    function goindex() {
        require 'controllers/index.php';
        $controller = new Index;
        $controller->index();
    }

    function goerror() {
        require 'controllers/error.php';
        $controller = new Error;
        $controller->index();
    }

   

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

