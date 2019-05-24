<h2>Adding Object</h2>
<script>
    $(function() {

        $("#datepicker").datepicker({
            showButtonPanel: true,
            showOn: "both",
            changeMonth: true,
            changeYear: true
        });
        $("#datepicker").datepicker("option", "dateFormat", 'yy-mm-dd');

    });
</script>
<script>
    $(function() {
        $('#').submit(function(o){
            alert(o);
            
        });
        $("#dialog").dialog({
            modal: true,
            autoOpen: false,
            width: 750,
            show: {
                effect: "slide",
                duration: 1000
            },
            hide: {
                effect: "explode",
                duration: 1000
            },
            buttons: {
                "確定輸入": function() {
                    $('#opener').val($('#select-result').html());
                    $(this).dialog("close");

                },
                Cancel: function() {
                    $(this).dialog("close");
                }
            }
        });
        $("#opener").click(function() {
            $("#dialog").dialog("open");
            pdialog_gotoroom($("#opener").val());
        });

    });
</script>
<div id="dialog" title="座標輸入輔助">
    <?php require 'views/gmssystem/_positionDialog.php'; ?>
    <p></p>
</div> 


<form id="submit_form" method="post" action="xhrObjectInsert" >
    <table>
        <tr>
            <td>名稱:</td>
            <td><input name="txt_name"></td>            
        </tr>
        <tr>           
            <td>類型:</td>
            <td><input name="txt_type"></td>                   
        </tr>
        <tr>
            <td>時間:</td>
            <td><input type="text" id="datepicker" name="txt_datetime"></td>

        </tr><tr>            
            <td>位置:</td>
            <td><input   id="opener" name="txt_position"></td>        
        </tr>
        <tr>        
            <td>原條碼:</td>       
            <td><input name="txt_obarcode"></td>        
        </tr>
        <tr>        
            <td>條碼:</td>       
            <td><input name="txt_barcode"></td>        
        </tr>
        <tr>        
            <td>備註:</td>       
            <td><textarea rows="5" cols="30" name="txt_memo"></textarea></td>        
        </tr>
        <tr>        
            <td></td>       
            <td><input type="submit"></td>        
        </tr>

    </table>

</form>