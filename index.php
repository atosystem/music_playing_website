<?php
//Use an autoloader!
require 'libs/Bootstrap.php';
require 'libs/Controller.php';
require 'libs/View.php';
require 'libs/Model.php';

/*
//Facebook
require 'libs/Facebook/FacebookSession.php' ;
require 'libs/Facebook/FacebookRedirectLoginHelper.php' ;
require 'libs/Facebook/FacebookRequest.php' ;
require 'libs/Facebook/FacebookResponse.php' ;
require 'libs/Facebook/FacebookSDKException.php' ;
require 'libs/Facebook/FacebookRequestException.php' ;
require 'libs/Facebook/FacebookAuthorizationException.php' ;
require 'libs/Facebook/GraphObject.php' ;
require'libs/Facebook/GraphUser.php' ;
require 'libs/Facebook/GraphSessionInfo.php' ;

*/


//Library
require 'libs/database.php';
require 'libs/database_A.php';
require 'libs/Session.php';
require 'libs/func.php';
require 'libs/math_func.php';

require 'config/paths.php';
require 'config/database.php';
require 'config/variable.php';


$app= new Bootstrap()
        


?>