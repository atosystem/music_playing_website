<?php

class Session {

    public static function init() {
        @session_start();
    }

    function __construct() {
        
    }

    public static function U_set($key) {
        session_unset($_SESSION[$key]);
    }

    public static function set($key, $value) {

        $_SESSION[$key] = $value;
    }

    public static function get($key) {
        if (isset($_SESSION[$key]))
            return $_SESSION[$key];
    }

    public static function destroy() {
        //unset($_SESSION);

        session_destroy();
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

