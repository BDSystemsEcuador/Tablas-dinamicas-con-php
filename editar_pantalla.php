<?php
include("conexion.php");
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $SELECT="SELECT * FROM empleados WHERE id='$id'";
    $mtst=$conn->query($SELECT);
    $result=$mtst->fetch_row();
}
if(isset($_POST['btn-editar'])){
    $id=$_GET['id'];
    $nombre=$_POST['nombre'];
    $telefono=$_POST['telefono'];
    $fecha_nacimiento=$_POST['fecha_nacimiento'];
    $estado_civil=$_POST['estado_civil'];
    $UPDATE="UPDATE empleados set nombre='".$nombre."', telefono='".$telefono."', fecha_nacimiento='".$fecha_nacimiento."', estado_civil='".$estado_civil."' WHERE id='$id'";
    $stmt=$conn->prepare($UPDATE);
    $stmt->execute();
    header("Location:index.php");
}
?>
<?php
    echo "<!DOCTYPE html>
    <html lang='es'>
    
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css' rel='stylesheet'
            integrity='sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl' crossorigin='anonymous'>
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js'
            integrity='sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0'
            crossorigin='anonymous'></script>
        <script src='https://code.jquery.com/jquery-3.6.0.js'
            integrity='sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=' crossorigin='anonymous'></script>
        <link rel='stylesheet' href='css/jquery.dataTables.min.css'>
        <title>Empresa</title>
    </head>
    
    <body>
        
        <div class='container'>
        <nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
      <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarTogglerDemo01' aria-controls='navbarTogglerDemo01' aria-expanded='false' aria-label='Toggle navigation'>
        <span class='navbar-toggler-icon'></span>
      </button>
      <div class='collapse navbar-collapse' id='navbarTogglerDemo01'>
        <a class='navbar-brand' href='index.php'>Empresa</a>
        <ul class='navbar-nav mr-auto mt-2 mt-lg-0'>
          <li class='nav-item active'>
            <a class='nav-link' href='index.php'>Inicio<span class='sr-only'></span></a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='agregar.php'>Agregar</a>
          </li>
        </ul>
      </div>
    </nav>      
            <h1 class=''>Editar empleado</h1>
            <div class='row'>
                <div class='card p-3'>
                    <form id='registro' name='registro' method='POST' action='editar_pantalla.php?id=".$_GET['id']."'>
                        <div class='form-group'>
                            <label for='nombre'>Nombre</label>
                            <input type='text' class='form-control' id='nombre' name='nombre' placeholder='Introduce tu nombre' value='".$result[1]."' autofocus required>
                        </div>
                        <div class='form-group'>
                            <label for='telefono'>Telefono</label>
                            <input type='text' class='form-control' id='telefono' name='telefono' placeholder='Introduce tu telefono' value='".$result[2]."' required>
                        </div>
                        <div class='form-group'>
                            <label for='fecha_nacimiento'>Fecha Nacimiento</label>
                            <input type='date' class='form-control' id='fecha_nacimiento' name='fecha_nacimiento' value='".$result[3]."' required>
                        </div>
                        <div class='form-group'>
                            <label for='estado_civil'>Estado Civil</label>
                            <select name='estado_civil' id='estado_civil' class='form-control' value='".$result[4]."' required>
                                <option value='Soltero'>Soltero</option>
                                <option value='Casado'>Casado</option>
                                <option value='Divorciado'>Divorciado</option>
                            </select>
                        </div>
                        <div class='form-group'>
                            <input type='submit' class='form-control btn btn-primary mt-3' id='btn-editar' name='btn-editar' value='Editar el registro'>
                        </div>
                    </form>
                </div>
    
            </div>
            
        </div>
    
    
        <script src='js/jquery.dataTables.min.js'></script>
        <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js'
            integrity='sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi'
            crossorigin='anonymous'></script>
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js'
            integrity='sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG'
            crossorigin='anonymous'></script>
    </body>
    
    </html>";
    ?>