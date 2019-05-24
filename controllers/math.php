<?php

class Math extends Controller {

    function __construct() {
        parent::__construct();
        $this->NeedAuth(true);    
        
    } 

    function index() {
       
        $this->view->render('math/index');
    }  

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


