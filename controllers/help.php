<?php
class Help extends Controller  {

    function __construct() {
        parent::__construct();
       
    }
    function index() {
         $this->view->render('help/index');
    }
    public function other($arg=false){
    //echo 'we are inside other<br/>';
    //echo 'Optional: ' . $arg . '<br/>';
    
  $this->view->render('help/index');
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

