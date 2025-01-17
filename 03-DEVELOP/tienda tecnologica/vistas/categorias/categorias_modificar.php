<?php
 include "../../conexion/conectar.php";
 include "../../controlador/categoriascontrolador.php";

 $obj = new Categorias();
 if ($_POST) {

    $obj->id_categoria = $_POST['id_categoria'];
    $obj->nombre_categoria = $_POST['nombre_categoria'];
    $obj->estado_categoria = $_POST['estado_categoria'];
 }
 $key = $_GET['key'];
 $cone = new conexion();
 $c = $cone->conectando();
 $query2 = "select * from categorias where id_categoria = '$key' ";
 $ejecuta2 = mysqli_query($c, $query2);
 $arreglo2 = mysqli_fetch_array($ejecuta2);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/styles.css">
    <title>Modificar Categoria</title>
</head>

<body>
    <div class="container-fluid p-3 mb-5 bg-body rounded container shadow">
        <div>
           <center><img src="../../img/logo_3_T_T.jpg" width="550px" height="110px" alt=""></center>
         <br>
         <br>
         <h2>Modificar Categoria</h2>
        </div>
        <form action="" name="categorias_modificar" method="POST">
            <center>
                <table class="table table-striped table-hover table table-bordered table-sm shadow">
                    <tr class="text-center align-middle">
                        <th class="text-center">
                            Codigo
                        </th>
                        <td class="text-center">
                            <input type="text" name="id_categoria" id="id_categoria"
                            value="<?php echo $arreglo2[0] ?>" placeholder="El Codigo es Asignado por el Sistema" maxlength="50" size="20"readOnly>
                        </td>
                    </tr>
                    <tr class="text-center align-middle">
                        <th class="text-center">
                            Nombre Categoria
                        </th>
                        <td class="text-center">
                            <input type="text" name="nombre_categoria" id="nombre_categoria"
                            value="<?php echo $arreglo2[1] ?>" placeholder="Digite el Nombre de la categoria" maxlength="50" size="20">
                        </td>
                    </tr>
                    <tr class="text-center align-middle">
                        <th class="text-center">
                            Estado
                        </th>
                        <td class="text-center">
                            <select name="estado_categoria" id="estado_categoria">
                                <?php
                                    $query3 = "select * from categorias where id_categoria = '$arreglo2[2]'";
                                    $ejecuta3 = mysqli_query($c, $query3);
                                    $arreglo3 = mysqli_fetch_array($ejecuta3);
                                    echo $arreglo3[0];
                                ?>
                                    <option value="activo">Activo</option>
                                    <option value="inactivo">Inactivo</option>
                    </tr>
                </table>
            </center>
                <a href="categorias.php" target="marco">
                    <P align="right"> <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true">Cerrar</i></button>
                </a>
                <button type="submit" class="btn btn-primary" name="modifica"><i class="fa fa-check" aria-hidden="true">Modificar</i></button>
                </P>
        </form>
    </div>
</body>
</html>