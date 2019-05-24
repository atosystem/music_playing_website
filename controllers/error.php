<?php

class Error extends Controller {

    function __construct() {
        parent::__construct();
        //echo 'This is an error!';
    }

    function index() {
        $this->view->msg = 'this page doesnt exist';
        $this->view->render('error/index');
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

