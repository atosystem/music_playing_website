<meta http-equiv="Content-Type" content="text/html; charset=BIG5" /> 
Set Computer
<br/>
<script src="https://www.youtube.com/iframe_api"></script>
<script type="text/javascript" src="../public/js/jquery.qrcode.min.js"></script>  


<script type="text/javascript">
    //getUserActivateDevice();

</script>
<style >
    .playingly{
        background:aquamarine;
    }
    .normally{
        background:transparent;
    }
</style>
<?php
$ss = new Func();
$sss = new Session();
$sss->init();
?>
<div id="DeviceList">

</div>
<script type="text/javascript">
//$("#qr").qrcode("http://jishus.org/");

    var player;   

function onYouTubeIframeAPIReady() {
    player = new YT.Player('video-placeholder', {
        width: 600,
        height: 400,
        videoId: 'Xa0Q0J5tOP0',
        playerVars: {
            color: 'white',
            //playlist: 'taJ60kskkns,FG0fTKAqZ5g'
        },
        events: {
           // onReady: initialize
        }
    });
}

    function funcx()
    {
        // your code here
        // break out here if needed
        setTimeout(funcx, 3000);
    }


    var nowplaying;
    $(document).ready(function() {
        ajaxcall();
        setInterval(ajaxcall, <?php echo js_timeinterval;  ?>);
        var video = document.getElementById('video');
      
    });
    function setVol(n) {
        if (n.substring(0, 1) == '@') {
            alert(n.substring(1, n.length));
            var video = document.getElementById('player');
            video.volume = n;
            return true;
        }
    }
        
    function ajaxcall() {
        var video = document.getElementById('video');
        nowplaying = '';
     //alert('asd');
        $.get('getSCommand', function(o) {
            //if (setVol(o) == true) {
            //} else {

                if (o == 'nothing') {
                    return false;
                }else{
                    //alert(o);
                     player.cueVideoById(o);
                     player.playVideo();

                }
               

        }, 'json');
    }
   
    
</script>


<img id='qrcode' src='#'/>
<script> 
           var text="<?php echo URL; ?>songs/player_auth/<?php echo $_SESSION['token'] ?>";

$("#qrcode").attr("src","http://chart.apis.google.com/chart?cht=qr&chl="+ text +"&chs=300x300");
	</script> 

<div id="video-placeholder"></div>



<div id="controls"></div>