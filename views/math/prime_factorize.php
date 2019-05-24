<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<script>
    $(this).ready(function(){
        $('#result_frm').hide()
        $('#frm').submit(function(){
            
        });
    });
</script>

<h1>質因數分解</h1>

<form id="frm" method="post" action="<?php echo URL; ?>">
    <label>請輸入數字:</label><input name="q" id="q">
    <button type="submit">確定</button>
</form>
<br>
<div id="result_frm" class="bs-callout bs-callout-warning">
    <h4>結果</h4>
    <p></p>
  </div>
