<?php

class Songs extends Controller {

    function __construct() {
        parent::__construct();
        //$this->NeedAuth(true);
        
        $this->view->js = array('songs/js/default.js');
    }
    
    function getcurrentip() {
        $this->model->getcurrentip();
    }

    function index() {
        
        $this->view->render('songs/index');
    }
    
    function setplayer() {        
         $this->model->setplayer();
    }
    function player_auth($d='u') {
        if($d=='u')
        {
            $this->view->render('songs/error');
        }else{
            $this->model->player_auth($d);
        }
         
    }
   
    function server() {
       // $//this->model->initip(true, TRUE);
        $this->view->render('songs/server');
    }
    
    function py() {
       
       // $//this->model->initip(true, TRUE);
        $this->view->render('songs/py');
    }

    function setcomputer() {
        //$this->model->initip(false);
        //$this->model->NeedIP();
        $this->view->render('songs/setcomputer');
    }

    function xhrInsert() {
        //echo 'ss';
        $this->model->xhrInsert();
    }
   

    function initip() {
        $this->model->initip();
    }

    function playmusic($cc) {
        //echo 'ss';
        //$this->model->initip(true);
        $this->view->render('songs/playmusic');
    }

    function getSList() {
        //echo 'ss';
        $this->model->getSList();
    }

    function searchSongs() {
        //echo 'ss';
        //$arg=$_POST['s_string'];
        $this->model->searchSongs($_GET['s_string']);
    }

    function getUserActivateDevice() {
        //echo 'ss';
        $this->model->getUserActivateDevice();
    }

    function goplay() {
        $arg = $_POST['x'];
        $this->model->goplay($arg);
    }

    function getSCommand() {
        //echo 'ss';
        //echo 'D:\\webpublic\\homeservermusic\\control\\php\\' . $_SESSION['set_IP'] .'.txt';
        $this->model->getSCommand();
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


