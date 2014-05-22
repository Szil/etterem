//  window.onload = function() {
//    document.getElementById('tables').onchange = showTable($('#tables').selectedIndex);
//    document.getElementById('newRow').onclick = getForm;
//};
  
  $('document').ready(function() {
      $('#tables').on('change', function() {
         showTable( this.value );
        });
  });
  
  function showTable(str) {
  if (str=="") {
    document.getElementById("content").innerHTML="";
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

function sendXHTTP(str) {
}

function getForm(str) {
    console.log(str);
}