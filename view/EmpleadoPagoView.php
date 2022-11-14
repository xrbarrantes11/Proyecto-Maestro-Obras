<!DOCTYPE html>
<Html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago</title>

</head>
<body> 
<header>
<h1>Listas</h1>      
<nav>  
<ul>  
<li>  
<a href="/ProyectoMaestroObras/view/PagoHoraView.php"> Por hora </a>  
</li>  
<li>  
<a href="/ProyectoMaestroObras/view/PagoDiaView.php"> Por dia </a>  
</li>  
<li>  
<a href="/ProyectoMaestroObras/view/PagoSemanaView.php"> Por semana </a>  
</li>  
<li> 
<a href="/ProyectoMaestroObras/view/PagoTareaView.php"> Por tarea </a>  
</li>    
</ul>  
</nav>  
</header>  
</br>

<form action ="../business/HomeAction.php" method = "POST">
    <button type="submit" name="regresar"> Regresar</button>
    </form>

    <?php
    if(isset($_GET['message'])){
    echo $_GET['message'];
    }
    ?>
</body>
</Html>