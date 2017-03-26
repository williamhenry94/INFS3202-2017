$(document).ready(function(){

    $('.link').click(function(){
        var id= this.id;
        var filePath =  $('#'+id).attr('href');
        $('#avator').css('background-image',"url('./"+filePath+"')");
    });

    $('#avator').click(function(){
        $("#avator").css('background-image',"url('./images/avator.jpg')");
    });

});