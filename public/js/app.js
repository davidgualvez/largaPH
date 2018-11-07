$('#cityFrom').on('change',function(e){
    //console.log(e);
    var cityCode = e.target.value; 
    //ajax
    $.get('/getBrgy?cityCode='+cityCode,function(data){
        //success data
        console.log(data);
        $('#brgyFrom').empty();
        $.each(data,function(index,brgyObj){
            $('#brgyFrom').append('<option value="'+brgyObj.brgyCode+'">'+brgyObj.description+'</option>');
        });
    });
});
 
$('#cityTo').on('change',function(e){
    //console.log(e);
    var cityCode = e.target.value; 
    //ajax
    $.get('/getBrgy?cityCode='+cityCode,function(data){
        //success data
        console.log(data);
        $('#brgyTo').empty();
        $.each(data,function(index,brgyObj){
            $('#brgyTo').append('<option value="'+brgyObj.brgyCode+'">'+brgyObj.description+'</option>');
        });
    });
});

$('#vehicleType').on('change',function(e){ 
    var vehicle = e.target.value; 
    //ajax  
    if(vehicle == 1) { //Motorcycle capctiy - the triver
        $('#seatsNeed').empty();
        for(count = 1; count <= 1; count++){
            $('#seatsNeed').append('<option value="'+count+'">'+count+'</option>');
        } 
    }else if(vehicle == 2) { // Sedan capctiy - the triver
        $('#seatsNeed').empty();
        for(count = 1; count <= 4; count++){
            $('#seatsNeed').append('<option value="'+count+'">'+count+'</option>');
        }
    }else if(vehicle == 3) { // Suv capctiy - the triver
        $('#seatsNeed').empty();
        for(count = 1; count <= 8; count++){
            $('#seatsNeed').append('<option value="'+count+'">'+count+'</option>');
        } 
    }else if(vehicle == 4) { // Van capctiy - the triver
        $('#seatsNeed').empty();
        for(count = 1; count <= 16; count++){
            $('#seatsNeed').append('<option value="'+count+'">'+count+'</option>');
        } 
    }else if(vehicle == 5) { // Bus capctiy - the triver
        $('#seatsNeed').empty();
        for(count = 1; count <= 40; count++){
            $('#seatsNeed').append('<option value="'+count+'">'+count+'</option>');
        } 
    }else if(vehicle == 6) { // Truck capctiy - the triver
        $('#seatsNeed').empty();
        for(count = 1; count <= 20; count++){
            $('#seatsNeed').append('<option value="'+count+'">'+count+'</option>');
        } 
    }
    
});

$('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });
$(".form_datetime").datetimepicker({format: 'yyyy-mm-dd hh:ii'});

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});

$(document).ready(function() {
    $('#myCarousel').carousel({
        interval: 10000
    });

    //called when key is pressed in textbox
  $("#cost").keypress(function (e) { 
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Integer Only").show().fadeOut("slow");
               return false;
    }
   });
});