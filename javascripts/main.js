 
  $('document').ready(function() {
      event.preventDefault();
      $('#tables').on('change', function() {
         showTable( this.value );
        });
        
      $('#newRow').on('click', function() {
        getForm($('#tables').val());
    });
});
  function showTable(str) {
  if (str==="") {
    $("#content").html("");
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("content").innerHTML=xmlhttp.responseText;
    }
  };
  xmlhttp.open("GET","/etterem/getTables.php?q="+str,true);
  xmlhttp.send();
  
  document.getElementById("updateRow").setAttribute("disabled", "disabled");
  document.getElementById("deleteRow").setAttribute("disabled", "disabled");
}

function actButton() {
    document.getElementById("updateRow").removeAttribute("disabled");
    document.getElementById("deleteRow").removeAttribute("disabled");
}


function getForm(str) {
    if (str === "") {
        return;
    }
    
    
    $.get("/etterem/newForm.php", { table: str } )
            .done(function( data ){
               $('#inputForm').html("");
               $('#inputForm').append( data );
               $('#inputForm').removeAttr('hidden');
            });
}

$('#inputForm').submit(function( event ){
           event.preventDefault();
           var $form = $( this ),
           term = $('#inputForm').serialize(),
           url = $form.attr('action');
           
           var post = $.post( url, term );
           
           post.done(function( data ) {
               alert("Added New Row with data: " + data);
           });

       });