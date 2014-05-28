<!DOCTYPE html>
<html>
<head>
    <title>Étterem</title>
    <meta charset="UTF-8">
    <link rel='stylesheet' href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel='stylesheet' href="/etterem/stylesheets/main.css">
    <style>
    body {
        margin: 50px;
    }
    </style>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div ><a class="navbar-brand" href="/etterem/">Étterem CRUD</a></div>
    </div>

    <div>
        <ul class="nav nav-tabs" role="navigation">
            <li class="active"><a href="/etterem/">Home</a></li>
            <li><a href="https://github.com/Szil/etterem">Github Repo</a></li>
            <li><a href="/etterem/zh/">Exam Page</a></li>
<!--        <li><a href="#">About</a></li>-->
        </ul>
    </div>
</nav>

<hr/>
    <div class="container-fluid">
        <form role="form">
            <select name="tables" class="btn btn-default" id="tables">
                <option value="">Select a Table</option>
                <option value="1">Fajta</option>
                <option value="2">Anyag</option>
                <option value="3">Étlap</option>
                <option value="4">Recept</option>
                <option value="5">Beszerzés</option>
            </select>
        </form>
    </div>
<hr/>
<div class="container-fluid">
    <form role="form">
        <input type="button" class="btn btn-default" value="Új sor" disabled="disabled" id="newRow"/>
        <input type="button" class="btn btn-default" value="Módosit" disabled="disabled" id="updateRow"/>
        <input type="button" class="btn btn-default" value="Töröl" disabled="disabled" id="deleteRow"/>
    </form>
</div>
<form role="form" hidden="hidden" id="inputForm" action="/etterem/">
    
</form>

<div class="container">
    <form role='form' class="content" id='rowSelect' action='/etterem/'>
        
    </form>
</div>
</body>
<script type='text/javascript' src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type='text/javascript' src="/etterem/javascripts/main.js"></script>
</html>