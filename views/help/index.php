<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

this is the help
<br>
<?php
$d = new math_func();
if (isset($_GET['num'])) {
    foreach ($d->prime_factorization($_GET['num']) as $value) {

        echo '<br>' . $value[0] . '<sup>' . $value[1] . '</sup>';
    }
}

//print_r($d->prime_factorization(12));
?>