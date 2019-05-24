<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Test</title>
        <!--
        <script src="../public/js/jquery-barcode.js" type="text/javascript"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>--> 
        
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
        <link href="<?php echo URL; ?>public/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo URL; ?>public/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo URL; ?>public/css/h_style.css" rel="stylesheet" type="text/css"/>
        <!--<link rel="stylesheet" href="<?php echo URL; ?>public/css/jquery-ui.css"/> 
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/jquery-ui.structure.css"/>
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/jquery-ui.theme.css"/>     
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="<?php echo URL; ?>public/js/jquery-ui.js"></script>-->  
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
        <script src="<?php echo URL; ?>public/js/bootstrap.js" type="text/javascript"></script>

        <?php
        if (isset($this->js)) {
            foreach ($this->js as $js) {
                echo "<script src='" . URL . "views/" . $js . "' type='text/javascript' > </script>";
            }
        }
        ?>
    </head>
    <?php Session::init(); ?>
    <body style="background-color: #92e0ff">
                                <?php if (Session::get('loggedIn') == true): ?>
                                   
                                        <a href="#">Hello,<?php echo $_SESSION['UserName']; ?> <span class="caret"></span></a>
                                       
                                           <a href="<?php echo URL; ?>songs">Media</a>
                                            <a href="<?php echo URL; ?>dashboard">DashBoard</a>
                                            <!--<a href="<?php echo URL; ?>playmusic">playmusic</a>
                                            <a href="<?php echo URL; ?>setcomputer">setcomputer</a>
                                            <a href="<?php echo URL; ?>dashboard/logout">Logout</a>                                      
                                       -->
                                    </li>
                                <?php else: ?>
                                    <li><a href="<?php echo URL; ?>login">Login</a></li>
                                    <li><a href="<?php echo URL; ?>register">New Account</a></li>
                                <?php endif; ?>           
                         

         
        <?php
        $f = new Func();
?>

         <?php if ($f->getcurPageURL() == 'http://www.atosystem.com/test/index' || $f->getcurPageURL() == 'http://www.atosystem.com/test'): ?>
           
        <script>
                $(this).ready(function(){
                    //$('#myCarousel').show(1000);
                });
                
            </script>
       <?php else: ?>
            <!--//require 'views/header_ext.php';-->
            <script>
                $(this).ready(function(){
                     //$('#myCarousel').hide(1000);
                });              
            </script>
            
        <?php endif; ?>
       

        <div id="content"  style="margin-top: 100px;margin-left: 20px; margin-right: 20px; background-color: #fff;
             padding: 10px">