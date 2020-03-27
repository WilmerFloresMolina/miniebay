<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
	print "<script>alert(\"Acceso invalido!\");window.location='login.php';</script>";
}

?>
<?php
include 'global/config.php';
include 'global/conexion.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="index.php">Logo de la empresa</a>
    <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div id="my-nav" class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Carrito</a>
            </li>
        </ul>
    </div>
</nav>
<br/>
<br/>
<div class="container">
<div class="alert alert-success">
    pantalla de mensaje
    <a href="#" class= "badge badge- success" > ver carrito </a>
</div>

    <div class="row">
        <?php
            $sentencia=$pdo->prepare("SELECT * FROM tblproductos");
            $sentencia->execute();
            $listaProductos=$sentencia ->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <?php foreach($listaProductos as $productos){ ?>
            <div class="col-3">
            <div class="card">
                <img title=<?php echo $productos['Nombre']?> 
                alt="Titulo" 
                class="card-img-top" 
                src="<?php echo $productos['Imagen']?>" 
                data-toggle="popover"
                data-trigger = "hover"
                data-content= "<?php echo $productos['Descripcion']?>" 
                >
                <div class="card-body">
                    <span><?php echo $productos['Nombre']?></span>
                    <h5 class="card-title">$<?php echo $productos['Precio']?></h5>
                    <p class="card-text">descripcion</p>
                    <button class="btn btn-primary" 
                    name="btnAccion" value="Agregar" type="submit">Agregar al Carrito
                    </button>
                </div>
            </div>
        </div>
        <?php }  ?>

       
    </div>

</div>

    <script>
        $(function () {
        $('[data-toggle="popover"]').popover()
         });
    </script>
</body>
</html>