<?php
 include "../../conexion/conectar.php";
 include "../../controlador/documentos_controlador.php";

 $obj = new Documentos();
 if ($_POST) {

    $obj->id_tipo_documento = $_POST['id_tipo_documento'];
    $obj->nombre_documento = $_POST['nombre_documento'];
    $obj->acronimo_documento = $_POST['acronimo_documento'];
    $obj->estado_documento = $_POST['estado_documento'];
 }
 $key = $_GET['key'];
 if ($key > 0) {

    $cone = new conexion();
    $c = $cone->conectando();
    $query2 = "select * from tipo_documentos where id_tipo_documento = '$key' ";
    $ejecuta2 = mysqli_query($c, $query2);
    $arreglo2 = mysqli_fetch_array($ejecuta2);
    $obj->id_tipo_documento = $arreglo2[0];
    $obj->nombre_documento = $arreglo2[1];
    $obj->acronimo_documento = $arreglo2[2];
    $obj->estado_documento = $arreglo2[3];
 }
 else {
    $obj->id_tipo_documento = "";
    $obj->nombre_documento = "";
    $obj->acronimo_documento = "";
    $obj->estado_documento = "";
 }

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
    <title>Eliminar Documento</title>
</head>

<body>
    <div class="container-fluid p-3 mb-5 bg-body rounded container shadow">
        <div>
          <center><img src="../../img/logo_3_T_T.jpg" width="550px" height="110px" alt=""></center>
         <br>
         <br>
         <h2>Eliminar Documento</h2>
        </div>
        <form action="" name="documentos_eliminar" method="POST">
            <center>
                <table class="table table-striped table-hover table table-bordered table-sm shadow">
                        <tr class="text-center align-middle">
                            <th class="text-center">
                             Código
                            </th>
                            <td class="text-center">
                             <input type="number" name="id_tipo_documento" id="id_tipo_documento" 
                             value="<?php echo $obj->id_tipo_documento?>" readOnly >
                            </td>
                        </tr>
                    <tr class="text-center align-middle">
                        <th class="text-center">
                          Nombre Documento
                        </th>
                        <td class="text-center">
                          <input type="text" name="nombre_documento" id="nombre_documento" 
                          value="<?php echo $obj->nombre_documento?>" readOnly >
                        </td>
                    </tr>
                    <tr class="text-center align-middle">
                        <th class="text-center">
                          Acronimo Documento
                        </th>
                        <td class="text-center">
                          <input type="text" name="acronimo_documento" id="acronimo_documento" 
                          value="<?php echo $obj->acronimo_documento?>" readOnly >
                        </td>
                    </tr>
                    <tr class="text-center align-middle">
                        <th class="text-center">
                         Estado
                        </th>
                        <td class="text-center">
                          <input type="text" name="estado_documento" id="estado_documento" 
                          value="<?php echo $obj->estado_documento ?>" readonly maxlength="50" size="20">
                        </td>            
                    </tr>
                </table>
                <a href="documentos.php" target="marco">
                  <P align="right"> <button type="button" class="btn btn-secondary"><i class="fa fa-times" aria-hidden="true">Cerrar</i></button>
                </a>

                <a href="documentos.php" target="marco">
                    <button type="submit" class="btn btn-primary" name="elimina">Eliminar</button>
                </a>
                  </P>
            </center>
        </form>
    </div>
</body>

</html>