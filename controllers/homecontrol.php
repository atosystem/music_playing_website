<?php

class Homecontrol extends Controller {

    function __construct() {
        parent::__construct();
        $this->NeedAuth(true);
    }

    function go($arg) {
        file_put_contents('D:\\webpublic\\homeservermusic\\control\\asd.crl', 'x' . $arg);
        
        $this->index();       
             
        //$this->view->render('homecontrol/index');
    }
    
    

    function index() {
        $this->view->render('homecontrol/index');
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

