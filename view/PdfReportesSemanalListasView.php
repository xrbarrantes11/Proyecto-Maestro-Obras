<!DOCTYPE html>
<Html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes</title>

</head>
<body> 
<header>
<h1>Listas</h1>      
<nav>  
<ul>  
<li>  
<a href="/Proyecto-Maestro-Obras/fpdf/PdfReporteEmpleadoPago.php"> Reporte empleado pago </a>  
</li>  
<li>  
<a href="/Proyecto-Maestro-Obras/view/View.php"> Reporte obra pago </a>  
</li>  
<li>  
<a href="/Proyecto-Maestro-Obras/view/View.php"> Reporte costo por hora total </a>  
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