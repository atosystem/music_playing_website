<?php

class songs_Model extends Model {

    function __construct() {

        parent::__construct();
    }
    
    function getcurrentip() 
    {//echo 'd';}
        $sthf = $this->db->prepare('SELECT * FROM computer_reg WHERE valid = 1 and userID = :cuid;');
        $sthf->setFetchMode(PDO::FETCH_ASSOC);
        $sthf->execute(array(
            ':cuid' => $_SESSION['UserID']
        ));
        $data = $sthf->fetchAll();
        
        if ($sthf->rowCount() < 1) {
            $_SESSION['set_IP'] = '-1';
           // echo json_encode(NULL);
        } else {
            $_SESSION['set_IP'] = $data[0][2];
            //echo json_encode($data);
        }

        // $data;
    
    }
    function player_auth($a) {
        //echo $_POST['text'];
        //echo 'aaa';     
         
         
        $sthf = $this->db->prepare('SELECT * FROM computer_reg WHERE valid = 1 and verification_code = :cd;');
        $sthf->execute(array(
            ':cd' => $a
        ));
        $data = $sthf->fetchAll();       
        $count = $sthf->rowCount();
        if ($count > 0) {         
            session_start();
            $_SESSION['auth_code'] = $a;
            $_SESSION['aa'] = $data[0][2];
           header('location: ' . URL . 'songs/py');
        } else {
            header('location: ' . URL . 'songs/error');
        }
        
        //echo'INSERT INTO computer_reg(computer_ip,verification_code) VALUES(:ipp,:vc';
        //echo '<script type="text/javascript" >$(this).ready(function(){alert("完成"); });  </script>';
        //echo '<script type="text/javascript" > alert(' . '"完成"' . '); </script>';
    }
    
    function goplay($arg) {   
        
        $sth = $this->db->prepare('INSERT INTO playcommand(type,content,targetip,valid,token) VALUES("url",:content,:tp,1,:token)');
        $sth->execute(array(            
            ':content' => $arg,
            ':tp' => $_POST['ip'],
            ':token' => $_POST['auth_code']
        ));        
    }
    
    function setplayer() {
        //echo $_POST['text'];
        //echo 'aaa';
        session_start();
        $sss = new Session();
        $sss->init();
        $sthf = $this->db->prepare('SELECT * FROM computer_reg WHERE valid = 1 and computer_ip = :ipp;');
        $sthf->execute(array(
            ':ipp' => $_POST['cuip']
        ));
        $data = $sthf->fetchAll();       
        $count = $sthf->rowCount();
        if ($count > 0) {            
            $sthff = $this->db->prepare('UPDATE computer_reg SET valid=:dd WHERE computer_ip = :uuid; ');
            $sthff->execute(array(
                ':uuid' =>$_POST['cuip'],
                ':dd' => 0,
                
            ));
        } else {
            
        }
 
 
        $token = bin2hex(openssl_random_pseudo_bytes(50));
        $sth = $this->db->prepare('INSERT INTO computer_reg(computer_ip,verification_code) VALUES(:ipp,:vc)');
        $sth->execute(array(            
            ':ipp' => $_POST['cuip'],
            ':vc' => $token
        ));
        
        $_SESSION['token'] =  $token;      
                
        header('location: ' . URL . 'songs/server');
        //echo'INSERT INTO computer_reg(computer_ip,verification_code) VALUES(:ipp,:vc';
        //echo '<script type="text/javascript" >$(this).ready(function(){alert("完成"); });  </script>';
        //echo '<script type="text/javascript" > alert(' . '"完成"' . '); </script>';
    }

    function xhrInsert() {
        //echo $_POST['text'];
        //echo 'aaa';

        $sthf = $this->db->prepare('SELECT * FROM computer_reg WHERE c_using = 1 and userID = :cuid;');
        $sthf->execute(array(
            ':cuid' => $_SESSION['UserID']
        ));
        $data = $sthf->fetchAll();
        $count = $sthf->rowCount();
        if ($count > 0) {
            $useID = $data[0][0];
            $sthff = $this->db->prepare('UPDATE computer_reg SET idcomputer_reg = :uuid,c_name = :name,c_ip = :ip,c_using = 0 ,c_regtime = :rg,userID = :cuid WHERE idcomputer_reg = :uuid; ');
            $sthff->execute(array(
                ':uuid' => $useID,
                ':name' => $_POST['name'],
                ':ip' => $data[0][2],
                ':rg' => $data[0][4],
                ':cuid' => $_SESSION['UserID']
            ));
        } else {
            
        }

        $sth = $this->db->prepare('INSERT INTO computer_reg(c_name,c_ip,c_using,c_regtime,userID) VALUES(:nn,:ipp,1,Now(),:uid);');
        $sth->execute(array(
            ':nn' => $_POST['name'],
            ':ipp' => $_POST['text'],
            ':uid' => $_SESSION['UserID']
        ));
        echo '<script type="text/javascript" >$(this).ready(function(){alert("完成"); });  </script>';
        //echo '<script type="text/javascript" > alert(' . '"完成"' . '); </script>';
    }

  
    
    function songInsert() {
        //echo $_POST['name'];

        $f = new Func();
        $r = $f->uploadFile(array('wav', 'mp3', 'mp4'),'resource/homeservermusic/media/');
        
        if ($f->startsWith($r,"Error*_")) {
            echo $r;
        } else {            
            echo 'fileupload success';
            $sthf = $this->db->prepare('INSERT INTO songs(s_name,s_albumID,s_createtime,s_lyric,s_memo,s_path) VALUES(:sname,:albumID,Now(),:lyrics,:memo,:path);');
            $sthf->execute(array(
                ':sname' => $_POST['name'],
                ':albumID' => $_POST['albumID'],
                ':lyrics' => $_POST['lyrics'],
                ':memo' => $_POST['memo'],
                ':path' => $r
            ));
            echo 'done<br>';
            echo 'INSERT INTO songs(s_name,s_albumID,s_createtime,s_lyrics,s_memo,s_path) VALUES(:name,:albumID;Now(),:lyrics,:memo,:path);';
        }
    }

    function getSList() {
        $sthf = $this->db->prepare('SELECT idsongs,s_name, s_rate , a_author ,a_title  FROM media.songs,media.album where idalbum = s_albumID');
        $sthf->setFetchMode(PDO::FETCH_ASSOC);

        $sthf->execute();

        $data = $sthf->fetchAll();

        echo json_encode($data);
    }

    function searchSongs($arg) {
        //echo 'd';
        $sthf = $this->db->prepare('SELECT idsongs,s_name, s_rate , a_author ,a_title  FROM media.songs,media.album where idalbum = s_albumID and s_name like concat("%",:s,"%")  or idalbum = s_albumID and a_author like concat("%",:s,"%") or idalbum = s_albumID and a_title like concat("%",:s,"%") GROUP BY s_albumID,idsongs');
        $sthf->setFetchMode(PDO::FETCH_ASSOC);

        $sthf->execute(array(
            ':s' => $arg
        ));

        $data = $sthf->fetchAll();

        echo json_encode($data);
        // $data;
    }

    function getUserActivateDevice() {
        //echo 'd';
        $sthf = $this->db->prepare('SELECT * FROM computer_reg WHERE c_using = 1 and userID = :cuid;');
        $sthf->setFetchMode(PDO::FETCH_ASSOC);
        $sthf->execute(array(
            ':cuid' => $_SESSION['UserID']
        ));
        $data = $sthf->fetchAll();
        //$_SESSION['set_IP'] = $data[0][2];
        if ($sthf->rowCount() < 1) {
            echo json_encode(NULL);
        } else {
            echo json_encode($data);
        }

        // $data;
    }

    function NeedIP() {
        if (!isset($_SESSION['CURENTip'])) {
            header('location: ' . URL . 'songs');
        }
    }

    function initip($direct = false, $Nserver = false) {

        $sthf = $this->db->prepare('SELECT c_ip FROM computer_reg WHERE c_using = 1 and userID = :cuid;');

        $sthf->execute(array(
            //':cuid' => $_SESSION['UserID']
        ));
        $data = $sthf->fetchAll();
        $sss = new Session();
        $sss->init();
        $f = new Func();
        @session_start();
        if ($sthf->rowCount() < 1) {
            if ($direct == true) {
                header('location: ' . URL . 'songs/setcomputer');
            }
        } else {


            if (isset($_SESSION['CURENTip'])) {
                unset($_SESSION['CURENTip']);
                $_SESSION['CURENTip'] = $data[0][0];

                if ($sss->get('CURENTip') == $f->get_client_ip()) {
                    //$sss->set('CURENTip', $data[0][0]);
                } else {
                    if ($Nserver == true) {
                        header('location: ' . URL . 'songs/setcomputer');
                    }
                }
            } else {
                $sss->set('CURENTip', $data[0][0]);
            }
        }

        //echo $_SESSION['CURENTip'];
        //$_SESSION['set_IP'] = $data[0][2];
        // $data;
    }

    
    

    function getSCommand() {
        $ss = new Func();
    
        $sthf = $this->db->prepare('SELECT * FROM computer_reg WHERE valid = 1 and computer_ip = :ipp;');        
        $sthf->execute(array(
            ':ipp' => $ss->get_client_ip()
        ));        
        $data = $sthf->fetchAll();         
        if($sthf->rowCount() > 0)
        {   
        $tk = $data[0][4];
        // $tk;
        $sthf = $this->db->prepare('SELECT * FROM playcommand WHERE valid = 1 and targetip = :cuid and token=:ds');       
        $sthf->execute(array(
            ':cuid' => $ss->get_client_ip(),
            ':ds' => $tk
        ));
        //echo '123'.$sss->get('token');
        $data = $sthf->fetchAll();         
        if($sthf->rowCount() > 0)
        {
            
            if($data[0][1]=="url")
            {
                $sthff = $this->db->prepare('UPDATE playcommand SET valid=0 WHERE idplaycommand=:uuid');
                $sthff->execute(array(
                    ':uuid' => $data[0][0]                    
                ));
            }
            echo json_encode($data[0][2]);            
            
        }else{
            echo json_encode('nothing');
        }
        
        
        //echo json_encode($data);
        // $data;
        }
    }

}

