/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(function(){
    $('#randomInsert').submit(function(){
        var url = $(this).attr('action');
        var data = $(this).serialize();
        
        $.post(url,data,function(o){
            alert('a');
        });
            
        
        return false;
    });
});


