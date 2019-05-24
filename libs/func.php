<?php

class Func {

    function __construct() {
        
    }

    public function get_client_ip() {
        $ipaddress = '';
        /* if ($_SERVER['HTTP_CLIENT_IP'])
          $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
          else if ($_SERVER['HTTP_X_FORWARDED_FOR'])
          $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
          else if ($_SERVER['HTTP_X_FORWARDED'])
          $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
          else if ($_SERVER['HTTP_FORWARDED_FOR'])
          $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
          else if ($_SERVER['HTTP_FORWARDED'])
          $ipaddress = $_SERVER['HTTP_FORWARDED'];
          else if ($_SERVER['REMOTE_ADDR'])
          $ipaddress = $_SERVER['REMOTE_ADDR'];
          else
          $ipaddress = 'UNKNOWN';
          return $ipaddress; */
        return $_SERVER['REMOTE_ADDR'];
    }

    public function get_client_computerName() {


        return gethostbyaddr($_SERVER['REMOTE_ADDR']);
    }

    function getcurPageName() {
        return substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
    }

    function getcurPageURL() {
        $pageURL = 'http';

        $pageURL .= "://";
        if ($_SERVER["SERVER_PORT"] != "80") {
            $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
        } else {
            $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
        }
        return $pageURL;
    }

    public function uploadFile($allowedExts, $serverpath, $maxsize = 10000000) {
        //$allowedExts = array("gif", "jpeg", "jpg", "png");
        $n = $_FILES["file"]["name"];
        $temp = explode(".", $n);
        $extension = end($temp);
        try {
            if (($_FILES["file"]["size"] < $maxsize) && in_array($extension, $allowedExts)) {
                if ($_FILES["file"]["error"] > 0) {
                    return "Return Code: " . $_FILES["file"]["error"];
                } else {
                    // echo "Upload: " . $_FILES["file"]["name"] . "<br>";
                    //echo "Type: " . $_FILES["file"]["type"] . "<br>";
                    //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
                    //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
                    if (file_exists($serverpath . $n)) {
                        return "Error*_already exists";
                    } else {
                        if (move_uploaded_file($_FILES["file"]["tmp_name"], iconv("UTF-8", "big5", $serverpath . $n))) {
                            return $n;
                        } else {
                            return "Error*_Fail";
                        }
                        //move_uploaded_file($_FILES["file"]["tmp_name"], $serverpath . n);
                        return $n;
                    }
                }
            } else {
                return;
                "Error*_Invalid file";
            }
        } catch (Exception $exc) {
            return;
            $exc->getTraceAsString();
        }
    }

    function startsWith($haystack, $needle) {
        return $needle === "" || strpos($haystack, $needle) === 0;
    }

    function endsWith($haystack, $needle) {
        return $needle === "" || substr($haystack, -strlen($needle)) === $needle;
    }

    function switchLang($l = 'auto') {
        $langa = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        include 'config/languages/l_'.$langa.'php';
           
    }
    function getLang($item) {
          
      
           
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

