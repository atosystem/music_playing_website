<?php

class View {

    function __construct() {

        //echo 'This is the View<br/>';
    }

    public function render($name, $noInclude = FALSE) {
        if ($noInclude == true) {
            require 'views/' . $name . '.php';
        } else {
            require 'views/header.php';
            
            require 'views/' . $name . '.php';
            require 'views/footer.php';
        }
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

