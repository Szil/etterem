$('document').ready(function() {
    var url = "/etterem/zh/fajtak.php";
    
    var get = $.get(url);
    
            get.done(function(data) {
                $('.fajtaSel').html(data);
                $('.fajtak').on('click', function() {
                    $('#fajtaVal').removeAttr('hidden', 'hidden');
                   var etel = $.get("/etterem/zh/etel.php", {tipus : $(this).attr('id')});
                   etel.done(function(data){
                      $('.fajtaList').html(data);
                      
                   });
                });
            });
            
    
});