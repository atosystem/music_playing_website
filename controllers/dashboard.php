<?php

class Dashboard extends Controller {

    function __construct() {
        parent::__construct();
        $this->NeedAuth(true);
      
        $this->view->js = array('dashboard/js/default.js');
      
    } 

    function index() {
       
        $this->view->render('dashboard/index');
    }
    function logout()
    {
        Session::destroy();
        header('location: ' . URL .'login');
        exit();        
    }
    function xhrInsert() {
        
       
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


