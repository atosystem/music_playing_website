<?php

class gmssystem_Model extends Model {

    function __construct() {
        parent::__construct();
    }

      function xhrsearchobject($arg) {
        $sthf = $this->dbA->prepare('SELECT  idtable_objects,object_name,object_memo,object_type,object_barcode,object_datetime,object_position,object_obarcode  FROM table_objects  where'
                . ' object_name like concat("%",:s,"%") or  '
                . ' object_memo like concat("%",:s,"%") or '
                . ' object_type like concat("%",:s,"%") or '
                . ' object_barcode like concat("%",:s,"%") or '
                . ' object_datetime like concat("%",:s,"%") or '
                . ' object_position like concat("%",:s,"%") or '
                . ' object_obarcode like concat("%",:s,"%")' );           
                
        $sthf->setFetchMode(PDO::FETCH_ASSOC);

        $sthf->execute(array(
            ':s' => $arg
        ));

        $data = $sthf->fetchAll();

        echo json_encode($data);
    }
    
    function xhrObjectInsert() {
        $sth = $this->dbA->prepare('INSERT INTO table_objects(object_name,object_memo,object_type,object_barcode,object_datetime,object_position,object_obarcode) VALUES(:name,:memo,:type,:barcode,:datetime,:position,:obarcode);');
        $sth->execute(array(
            ':name' => $_POST['txt_name'],
            ':memo' => $_POST['txt_memo'],            
            ':type' => $_POST['txt_type'],
            ':barcode' => $_POST['txt_barcode'],
            ':obarcode' => $_POST['txt_obarcode'],
            ':datetime' => $_POST['txt_datetime'],
            ':position' => $_POST['txt_position']         
        ));
        echo  json_encode('完成');
    }
    function updateObject() {
        $sth = $this->dbA->prepare('UPDATE INTO table_objects(object_name,object_memo,object_type,object_barcode,object_datetime,object_position,object_obarcode) VALUES(:name,:memo,:type,:barcode,:datetime,:position,:obarcode);');
        $sth->execute(array(
            ':name' => $_POST['txt_name'],
            ':memo' => $_POST['txt_memo'],            
            ':type' => $_POST['txt_type'],
            ':barcode' => $_POST['txt_barcode'],
            ':obarcode' => $_POST['txt_obarcode'],
            ':datetime' => $_POST['txt_datetime'],
            ':position' => $_POST['txt_position']         
        ));
        echo  json_encode('完成');
    }
    function getobject($arg) {
      $sthf = $this->dbA->prepare('SELECT object_name,object_memo,object_type,object_barcode,object_datetime,object_position,object_obarcode  FROM table_objects  where object_barcode = :iid ');
        $sthf->setFetchMode(PDO::FETCH_ASSOC);

        $sthf->execute(array(
            ':iid'=> $arg
        ));

        $data = $sthf->fetchAll();

        echo json_encode($data);
    }
function getObectByid($arg) {
      $sthf = $this->dbA->prepare('SELECT object_name,object_memo,object_type,object_barcode,object_datetime,object_position,object_obarcode  FROM table_objects  where idtable_objects = :iid ');
        $sthf->setFetchMode(PDO::FETCH_ASSOC);

        $sthf->execute(array(
            ':iid'=> $arg
        ));

        $data = $sthf->fetchAll();

        echo json_encode($data);
    }
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, chooaaaswyeu
 * \
 */

