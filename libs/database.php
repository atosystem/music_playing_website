<?php
class Database extends PDO{

    public function __construct() {
        
        parent::__construct(DB_TYPE . ':dbname='. DB_NAME .';host='. DB_HOST,DB_USER,DB_PASS);
        
        $this->query('set character set utf8');
    }

}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

