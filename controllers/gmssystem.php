<?php

class GmsSystem extends Controller {

    function __construct() {
        parent::__construct();
        $this->NeedAuth(true);

        $this->view->js = array('dashboard/js/default.js');
    }

    function index() {

        $this->view->render('gmssystem/index');
    }

    function aa() {

        $this->view->render('gmssystem/_positionDialog');
    }

    function object_add() {
        $this->view->render('gmssystem/object_add');
    }

    function xhrgetobject() {
        $this->model->getobject($_GET['s']);
    }

    function xhrsearchobject() {
        $this->model->xhrsearchobject($_GET['s']);
    }

    function getObectByid() {
        $this->model->getObectByid($_GET['id']);
    }

    function getobject() {
        $this->view->render('gmssystem/getobject');
    }

    function search() {
        
    }

    function xhrObjectInsert() {
        $this->model->xhrObjectInsert();
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


