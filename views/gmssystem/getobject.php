<!DOCTYPE html>

<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<div id="dialog" title="座標輸入輔助">
    <?php require 'views/gmssystem/_positionDialog.php'; ?>
    <p></p>
</div> 

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
                    $("#opener").val($("#select-result").html())
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
<script>
    $(function() {
        $('#result').hide();
        $('#s_frm').submit(function() {
            var url = $(this).attr('action');
            var data = $(this).serialize();
            $.get(url, data, function(o) {
                //alert('已送出');

                for (var i = 0; i < o.length; i++)
                {
                    $('#txt_name').val(o[i].object_name);
                    $('#txt_type').val(o[i].object_type);
                    $('#datepicker').val(o[i].object_datetime);
                    $('#opener').val(o[i].object_position);
                    $('#txt_obarcode').val(o[i].object_obarcode);
                    $('#txt_barcode').val(o[i].object_barcode);
                    //$("#bcTarget").barcode(o[i].object_barcode, "ean13");    
                    $('#txt_memo').val(o[i].object_memo);
                    if (o[i].object_position.length > 0) {

                        $('#select-result').html(o[i].object_position);
                        pdialog_gotoroom(o[i].object_position);

                    }

                }

                if (o.length > 0) {
                    $('#result').show("fold");
                } else {
                    $('#result').hide("fold");
                }

            }, 'json');



            return false;
        });

    });

    $(function() {
        $('#s_frm1').submit(function() {

            var url = $(this).attr('action');
            var data = $(this).serialize();

            $.get(url, data, function(o) {

                $('#aa').html('');
                for (var i = 0; i < o.length; i++)
                {


                    $('#aa').append('<tr>');
                    $('#aa').append('<td><a data-c="' + o[i].idtable_objects + '" onclick="goDetail(' + o[i].idtable_objects + ');">' + o[i].idtable_objects + '</a></td>');
                    $('#aa').append('<td>' + o[i].object_name + '</td>');
                    $('#aa').append('<td>' + o[i].object_type + '</td>');
                    $('#aa').append('<td>' + o[i].object_position + '</td>');
                    $('#aa').append('<td>' + o[i].object_barcode + '</td>');
                    $('#aa').append('</tr>');


                }

                if (o.length > 0) {
                    $('#resultlist').show("fold");
                } else {
                    $('#resultlist').hide("fold");
                }

            }, 'json');
            return false;
        });

        $('#s_frm2').submit(function() {
            var url = '<?php echo URL; ?>gmssystem/getObectByid';

            var data = $(this).serialize();
            $.get(url, data, function(o) {
                

                for (var i = 0; i < o.length; i++)
                {
                    $('#txt_name').val(o[i].object_name);
                    $('#txt_type').val(o[i].object_type);
                    $('#datepicker').val(o[i].object_datetime);
                    $('#opener').val(o[i].object_position);
                    $('#txt_obarcode').val(o[i].object_obarcode);
                    $('#txt_barcode').val(o[i].object_barcode);
                    //$("#bcTarget").barcode(o[i].object_barcode, "ean13");    
                    $('#txt_memo').val(o[i].object_memo);
                    if (o[i].object_position.length > 0) {

                        $('#select-result').html(o[i].object_position);
                        pdialog_gotoroom(o[i].object_position);

                    }

                }

                if (o.length > 0) {
                    $('#result').show("fold");
                } else {
                    $('#result').hide("fold");
                }

            }, 'json');

            return false;
        });


    });

    function goDetail(n) {
        $('#s_frm2_id').val(n);
        $('#s_frm2').submit();

    }
</script>
<h1>物件劉覽</h1>
<div id="search_frms">
    <div class="panel panel-primary" style="float: left;"><FORM id="s_frm" method="get" action="xhrgetobject">
            Barcode:<input name="s" type="search">
            <span onclick="javascript:$('#s_frm').submit();" class="glyphicon glyphicon-search"></span>
        </FORM>
    </div>
    <div class="panel panel-primary" style="float: left;"><FORM id="s_frm1" method="get" action="xhrsearchobject">
            Search:<input name="s" type="search">
            <span onclick="javascript:$('#s_frm1').submit();" class="glyphicon glyphicon-search"></span>
        </FORM>
    </div>
    <div class="panel panel-primary" style="display:  none;"><FORM id="s_frm2" method="get" action="xhrsearchobject">
            <input name="id" id="s_frm2_id" type="search">

        </FORM>
    </div>
    <a onclick="javascript:$('#result').show('fold');$('#search_frms').hide('fold');">結果</a>
</div>
<br>

<hr>
<div id="results">
    <table id="resultlist">
        <thead>
        <td>ID</td>
        <td>Name</td>
        <td>type</td>
        <td>位置</td>    
        <td>條碼</td>   
        </thead>
        <tbody id="aa">

        </tbody>
    </table>
    <hr>
    <br>
    <table id="result">
        <tr>
            <td>名稱:</td>
            <td><input id="txt_name"></td>            
        </tr>
        <tr>           
            <td>類型:</td>
            <td><input id="txt_type"></td>                   
        </tr>
        <tr>
            <td>時間:</td>
            <td><input type="text" id="datepicker"></td>

        </tr><tr>            
            <td>位置:</td>
            <td><input   id="opener" ></td>        
        </tr>
        <tr>        
            <td>原條碼:</td>       
            <td><input id="txt_obarcode"></td>        
        </tr>
        <tr>        
            <td>條碼:</td>       
            <td><input id="txt_barcode"></td>        
        </tr>
        <tr>        
            <td>備註:</td>       
            <td><textarea rows="5" cols="30" id="txt_memo"></textarea></td>        
        </tr>
        <tr>        
            <td></td>       
            <td><input ></td>        
        </tr>

    </table>
    <a onclick="javascript:$('#result').hide('fold');$('#search_frms').show('fold');">搜尋</a>
</div>