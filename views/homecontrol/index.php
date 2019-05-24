<!DOCTYPE html>
<script type="text/javascript" >
    
    function goplay(var d){
        location.href="<?php echo URL; ?>homecontrol/go/" + d;
    }
    
</script>
<?php

$count = file_get_contents("D:\\webpublic\\homeservermusic\\control\\web\\itemc.txt",TRUE);
for ($x=0; $x<$count; $x++) {
    
  echo "<a href='" . URL ."homecontrol/go/" . $x ."' data-c='" . $x ."'>" . file_get_contents("D:\\webpublic\\homeservermusic\\control\\web\\playlist\\" . $x .".md",TRUE) . "</a><br />";
  
} 
//echo $count;

?>
