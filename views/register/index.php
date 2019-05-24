<!DOCTYPE html>
<h1>New Account</h1>
<form action="<?php echo URL; ?>register/run" method="post" id="rf">

    <label>Login</label><input id="login" type="text" name="login"/><br/>
    <label>Password</label><input id="password" type="password" name="password"/><br/>
    <!--<label>E-mail</label><input id="email" type="email" name="email"/><br/>-->
    <input hidden="true" id="ty" type="text" name="ty" value="member"/>
    <label></label><input type="submit" />
</form>











<script type="text/javascript">
$('#rf').submit(function(){
   if($('#login').val() == '' || $('#password').val() == '' || $('#email').val() == ''){
       alert('不可留白');
   }else{
       
   }
});
</script>


-