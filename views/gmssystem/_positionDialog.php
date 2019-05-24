
<!doctype html>
<html >
    <head>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
        <!--<link href="../../public/css/h_style.css" rel="stylesheet" type="text/css"/>-->
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
        <title>jQuery UI Selectable - Display as grid</title>



        <style>

        </style>
        <script>
            function pdialog_gotoroom(p_place) {

                $("#select-result").html(p_place)
                $(".room").hide();
                $("#div_house").hide();
                $("#uptoroom").show(1000);
                //alert("#" + p_place);
                $("#room_" + p_place.substring(0, 1)).show(1000);
                $("#dialog .selected").attr('class', 'unselected');

                $("#" + $("#select-result").html()).attr('class', 'selected');
                $("#dialog").dialog("open");
                if (p_place == "") {
                    $("#div_house").show(1000);
                    $("#uptoroom").hide(1000);
                } else {
                    $("#" + p_place + " #p_title").show(1000);
                }

            }
            $(function() {

                $(".room").hide();
                $("#dialog .unselected").click(function() {
                    $("#dialog .selected").attr('class', 'unselected');
                    $(this).attr('class', 'selected');
                    $('#select-result').html($(this).attr('data-num'));
                });
                $("#dialog .unselectedroom").click(function() {
                    $(".room").hide(10);
                    $("#div_house").hide(1000);
                    $("#uptoroom").show(1000);
                    //alert("#" + p_place);

                    $("#room_" + $(this).attr('data-num')).show(1000).delay(800);
                });
                $("#dialog #uptoroom").click(function() {
                    $(".room").hide(1000);
                    $("#div_house").show(1000);
                    $("#uptoroom").hide(1000);
                    //alert("#" + p_place);

                });
                

            });
        </script>
    </head>
    <body>
        <p id="feedback">
            <span>You've selected:</span> <span id="select-result">none</span>.
            <a href="#" id="uptoroom" style="float: right;">全屋</a>
        </p>
        <div id="div_house"  >
            <h2 id="p_title" style="font-size:20px">房間圖</h2>
            <table  id="house" style="float:left">  
                <tr>
                    <td data-num="xxxxx" class="roombase" ></td>
                    <td data-num="xxxxx" class="roombase" ></td>
                    <td data-num="xxxxx" class="roombase" ></td>
                    <td data-num="xxxxx" class="roombase" ></td>   
                    <td data-num="xxxxx" class="roombase" ></td>                  
                    <td data-num="xxxxx" class="roombase" ></td>                  
                    <td data-num="xxxxx" class="roombase" ></td>                  
                    <td data-num="xxxxx" class="roombase" ></td>                  
                    <td data-num="xxxxx" class="roombase" ></td>                      
                    <td data-num="xxxxx" class="roombase" ></td>                     
                </tr>
                <tr>
                    <td data-num="xxxxx" class="roombase" rowspan="3" colspan="3"></td>
                    <td id="A0010" data-num="A0010"  class="unselectedroom" colspan="4" >陽台</td>

                    <td id="A0009" data-num="A0009" class="unselectedroom" rowspan="4" colspan="2">貽仁房間</td>
                    <td id="A0001" data-num="xxxxx" class="roombase" ></td>   
                </tr>
                <tr>
                    <td  id="A0002" data-num="A0002" class="unselectedroom" rowspan="2" >廚房</td>    
                    <td  id="A0008" data-num="A0008" class="unselectedroom" rowspan="2" colspan="3">捷瑜</td>
                    <td id="A0001" data-num="xxxxx" class="roombase" ></td>   
                </tr>
                <tr>
                    <td id="A0001" data-num="xxxxx" class="roombase" ></td>
                </tr>

                <tr>
                    <td  id="A" data-num="A" class="unselectedroom" rowspan="6" colspan="4">客廳</td>
                    <td  id="B" data-num="B" class="unselectedroom" rowspan="5" colspan="3">餐廳</td>                    
                </tr>
                <tr>
                    <td id="A0001" data-num="xxxxx" class="roombase" ></td>
                </tr>
                <tr>
                    <td  id="D" data-num="D" class="unselectedroom" rowspan="5" colspan="2">主臥室</td>
                    <td id="A0001" data-num="xxxxx" class="roombase" ></td>
                </tr>
                <tr>
                    <td id="A0001" data-num="xxxxx" class="roombase" ></td>
                </tr>
                <tr>
                    <td id="A0001" data-num="xxxxx" class="roombase" ></td>
                </tr>
                <tr>
                    <td  id="C" data-num="C" class="unselectedroom" rowspan="2" colspan="3">工作間</td>   
                    <td id="A0001" data-num="xxxxx" class="roombase" ></td>

                </tr>
                <tr>
                    <td id="A0010" data-num="A0010"  class="unselectedroom" colspan="4" >陽台</td>
                    <td id="A0001" data-num="xxxxx" class="roombase" ></td>
                </tr>
            </table>
        </div>
        <div id="room_A" class="room" >
            <h2 id="p_title" style="font-size:20px">客廳</h2> 


            <table  id="livingroom_00" style="float:left">  
                <caption><h2 style="font-size:20px">電視牆</h2></caption>
                <tr>
                    <td id="A0001" data-num="A0001" class="unselected">01</td>
                    <td id="A0010" data-num="A0010"  class="unselected"rowspan="3" style="width: 50%">電視(10)</td>

                    <td id="A0009" data-num="A0009" class="unselected">09</td>
                </tr>
                <tr>
                    <td  id="A0002" data-num="A0002" class="unselected">02</td>    
                    <td  id="A0008" data-num="A0008" class="unselected">08</td>
                </tr>
                <tr>
                    <td  id="A0003" data-num="A0003" class="unselected">03</td>

                    <td  id="A0007" data-num="A0007" class="unselected">07</td>
                </tr>
                <tr>
                    <td  id="A0004" data-num="A0004" class="unselected">04</td>
                    <td  id="A0005" data-num="A0005" class="unselected" style="width: 50%">05</td>

                    <td  id="A0006" data-num="A0006" class="unselected">06</td>
                </tr>

            </table>
            <table id="livingroom_01" style=" margin-left: 10px;  float:left"  >  
                <caption><h2 style="font-size:20px">檯面牆</h2></caption>
                <tr>
                    <td id="A0101" data-num="A0101" class="unselected">01</td>   
                    <td id="A0109" data-num="A0109" class="unselected">09</td>
                    <td id="A0117" data-num="A0117"  class="unselected" rowspan="8" style="width: 100px">廁所(17)</td>
                    <td id="A0118" data-num="A0118" class="unselected" >18</td>
                </tr>
                <tr>
                    <td id="A0102" data-num="A0102" class="unselected">02</td>    
                    <td id="A0110" data-num="A0110" class="unselected">10</td>
                    <td id="A0119" data-num="A0119" class="unselected" >19</td>
                </tr>
                <tr>
                    <td id="A0103" data-num="A0103" class="unselected">03</td>    
                    <td id="A0111" data-num="A0111" class="unselected">11</td>  
                    <td id="A0120" data-num="A0120" class="unselected" rowspan="4" style="width:90px ">檯面(20)</td>
                </tr>
                <tr>
                    <td id="A0104" data-num="A0104" class="unselected">04</td>
                    <td id="A0112" data-num="A0112" class="unselected">12</td>



                </tr>
                <tr>
                    <td id="A0105" data-num="A0105" class="unselected">05</td>
                    <td id="A0113" data-num="A0113" class="unselected">13</td>       
                </tr>
                <tr>
                    <td id="A0106" data-num="A0106" class="unselected">06</td>
                    <td id="A0114" data-num="A0114" class="unselected">14</td>     

                </tr>
                <tr>
                    <td id="A0107" data-num="A0107" class="unselected">07</td>
                    <td id="A0115" data-num="A0115" class="unselected">15</td>     
                    <td id="A0121" data-num="A0121" class="unselected">21</td>       
                </tr>
                <tr>
                    <td id="A0108" data-num="A0108" class="unselected">08</td>
                    <td id="A0116" data-num="A0116" class="unselected">16</td>       
                    <td id="A0122" data-num="A0122" class="unselected">22</td>     

                </tr>
            </table>

        </div>

        <div id="room_B" class="room" >
            <caption><h2 style="font-size:20px">餐廳</h2></caption>    
            <table   style="float:left">  
                <caption><h2 style="font-size:20px">檯面櫃</h2></caption>                
                <tr>
                    <td id="B0001" data-num="B0001" class="unselected" colspan="2">01</td>

                </tr>
                <tr>
                    <td id="B0002" data-num="B0002" class="unselected" colspan="2">02</td>
                </tr>
                <tr>
                    <td id="B0003" data-num="B0003" class="unselected" colspan="2">03</td>
                </tr>
                <tr>
                    <td id="B0004" data-num="B0004" class="unselected"  colspan="2">04</td>
                </tr>
                <tr>
                    <td id="B0005" data-num="B0005" class="unselected" colspan="2">05</td>
                </tr>
                <tr>
                    <td  data-num="xxxxx" class="roombase"></td>
                    <td  data-num="xxxxx"  class="roombase"></td>

                </tr>
            </table>

        </div>
        <div id="room_C" class="room" >
            <caption><h2 style="font-size:20px">工作間</h2></caption>    
            <table   style="float:left">  
                <caption><h2 style="font-size:20px">後櫃</h2></caption>                
                <tr>
                    <td id="C0001" data-num="C0001" class="unselected">01</td>
                    <td id="C0006" data-num="C0006" class="unselected" colspan="2">06</td>
                    <td id="C0011" data-num="C0011" class="unselected">11</td>
                    <td id="C0016" data-num="C0016" class="unselected">16</td>     
                </tr>
                <tr>
                    <td id="C0002" data-num="C0002" class="unselected">02</td>
                    <td id="C0007" data-num="C0007" class="unselected" colspan="2">07</td>
                    <td id="C0012" data-num="C0012" class="unselected">12</td>
                    <td id="C0017" data-num="C0017" class="unselected">17</td>                   
                </tr>
                <tr>
                    <td id="C0003" data-num="C0003" class="unselected">03</td>
                    <td id="C0008" data-num="C0008" class="unselected" colspan="2">08</td>
                    <td id="C0013" data-num="C0013" class="unselected">13</td>
                    <td id="C0018" data-num="C0018" class="unselected">18</td>                   
                </tr>
                <tr>
                    <td id="C0004" data-num="C0004" class="unselected">04</td>
                    <td id="C0009" data-num="C0009" class="unselected" colspan="2">09</td>
                    <td id="C0014" data-num="C0014" class="unselected">14</td>
                    <td id="C0019" data-num="C0019" class="unselected">19</td>                   
                </tr>
                <tr>
                    <td id="C0005" data-num="C0005" class="unselected">05</td>
                    <td id="C0010" data-num="C0010" class="unselected" colspan="2">10</td>
                    <td id="C0015" data-num="C0015" class="unselected">15</td>
                    <td id="C0020" data-num="C0020" class="unselected">20</td>                   
                </tr>
                <tr>
                    <td  data-num="xxxxx"  class="roombase"></td>
                    <td  data-num="xxxxx"  class="roombase"></td>
                    <td  data-num="xxxxx"  class="roombase"></td>
                    <td  data-num="xxxxx"  class="roombase"></td>
                    <td  data-num="xxxxx"  class="roombase"></td>
                </tr>
            </table>
<table   style="float:left; margin-left: 10px;  ">  
                <caption><h2 style="font-size:20px; ">鋼琴後方櫃</h2></caption>                
                <tr>
                    <td id="C0101" data-num="C0101" class="unselected">01</td>                    
                    <td id="C0102" data-num="C0102" class="unselected" colspan="2">02</td>                    
                </tr>               
                <tr>
                    <td  data-num="xxxxx"  class="roombase"></td>
                    <td  data-num="xxxxx"  class="roombase"></td>
                    <td  data-num="xxxxx"  class="roombase"></td>
                    
                </tr>
            </table>
        </div>
        
        <div id="room_D" class="room" >
            <caption><h2 style="font-size:20px">主臥室</h2></caption>    
            <table   style="float:left">  
                <caption><h2 style="font-size:20px">後櫃</h2></caption>                
                <tr>
                    <td id="C0001" data-num="C0001" class="unselected">01</td>
                    <td id="C0006" data-num="C0006" class="unselected" colspan="2">06</td>
                    <td id="C0011" data-num="C0011" class="unselected">11</td>
                    <td id="C0016" data-num="C0016" class="unselected">16</td>     
                </tr>
                <tr>
                    <td id="C0002" data-num="C0002" class="unselected">02</td>
                    <td id="C0007" data-num="C0007" class="unselected" colspan="2">07</td>
                    <td id="C0012" data-num="C0012" class="unselected">12</td>
                    <td id="C0017" data-num="C0017" class="unselected">17</td>                   
                </tr>
                <tr>
                    <td id="C0003" data-num="C0003" class="unselected">03</td>
                    <td id="C0008" data-num="C0008" class="unselected" colspan="2">08</td>
                    <td id="C0013" data-num="C0013" class="unselected">13</td>
                    <td id="C0018" data-num="C0018" class="unselected">18</td>                   
                </tr>
                <tr>
                    <td id="C0004" data-num="C0004" class="unselected">04</td>
                    <td id="C0009" data-num="C0009" class="unselected" colspan="2">09</td>
                    <td id="C0014" data-num="C0014" class="unselected">14</td>
                    <td id="C0019" data-num="C0019" class="unselected">19</td>                   
                </tr>
                <tr>
                    <td id="C0005" data-num="C0005" class="unselected">05</td>
                    <td id="C0010" data-num="C0010" class="unselected" colspan="2">10</td>
                    <td id="C0015" data-num="C0015" class="unselected">15</td>
                    <td id="C0020" data-num="C0020" class="unselected">20</td>                   
                </tr>
                <tr>
                    <td  data-num="xxxxx"  class="roombase"></td>
                    <td  data-num="xxxxx"  class="roombase"></td>
                    <td  data-num="xxxxx"  class="roombase"></td>
                    <td  data-num="xxxxx"  class="roombase"></td>
                    <td  data-num="xxxxx"  class="roombase"></td>
                </tr>
            </table>
<table   style="float:left; margin-left: 10px;  ">  
                <caption><h2 style="font-size:20px; ">鋼琴後方櫃</h2></caption>                
                <tr>
                    <td id="C0101" data-num="C0101" class="unselected">01</td>                    
                    <td id="C0102" data-num="C0102" class="unselected" colspan="2">02</td>                    
                </tr>               
                <tr>
                    <td  data-num="xxxxx"  class="roombase"></td>
                    <td  data-num="xxxxx"  class="roombase"></td>
                    <td  data-num="xxxxx"  class="roombase"></td>
                    
                </tr>
            </table>
        </div>
    </body>
</html>









<!--
<table id="livingroom" style="">  
<tr>
  <td>01</td>
  <td  rowspan="3" style="width: 50%">XX</td>
  
  <td>09</td>
</tr>
<tr>
  <td>02</td>
  
  <td>08</td>
</tr>
  <tr>
  <td>03</td>
  
  <td>07</td>
</tr>
  <tr>
  <td>04</td>
  <td style="width: 50%">05</td>
  
  <td>06</td>
</tr>

</table>-->