<?php
class Index extends Controller 
 {

    function __construct() {
        parent::__construct();
       
    }
function index() {
    //echo 'inside index index';
         $this->view->render('index/index');
    }
    function details() {
    //echo 'inside index details';
         $this->view->render('help/index');
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

