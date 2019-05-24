<meta http-equiv="Content-Type" content="text/html; charset=BIG5" /> 
Set Computer
<br/><?php
$ss = new Func();
$sss = new Session();
$sss->init();
?>
<div id="DeviceList">

</div>
<script type="text/javascript">

    var i;
    getUserActivateDevice();
    //alert(i);
    
    function getUserActivateDevice() {
        //var w;

        $.get('http://www.atosystem.com/test/songs/getUserActivateDevice', function(o) {
            //console.log(o[0].text);
            //alert('start');

            if (o == null) {
                $('#DeviceList').html('<div>目前尚未設定播放伺服器</div>');
                //w = null();
                alert('No device');
            } else {
                //w = o[0].c_ip;
                //alert('w');
                for (var i = 0; i < o.length; i++)
                {
                    if (o[i].c_ip == '<?php echo $ss->get_client_ip(); ?>') {
                        $('#DeviceList').html('<div><b>本機</b>伺服器名稱:' + o[i].c_name + '   IP:' + o[i].c_ip + '</div><a href="<?php echo URL; ?>songs/server">進入伺服器</a>');
                    }else{
                        $('#DeviceList').html('<div>目前伺服器名稱:' + o[i].c_name + '   IP:' + o[i].c_ip + '</div>');
                    }
                    


                }
            }

        }, 'json');

        //return w;

    }

</script>


<br/>
<hr>
<form  id="randomInsert" action="<?php echo URL; ?>songs/setplayer" method="post">
    <label>The IP of this computer: <?php echo $ss->get_client_ip(); ?></label>
    <input  hidden="true" type="text" name="cuip" value="<?php echo $ss->get_client_ip(); ?>"> 
    <!--<label>Name:</label><input  type="text" name="name" id="name"> -->
    <button type="submit">Set this computer as a player </button>
    <!--<input type="submit"  title="Set this computer as a player ">-->
</form>

