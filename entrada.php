
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Control bd</title>
</head>
<body>
<h3>Entrada de mercancía</h3>

<table>
  <?php
  extract($_POST);
  echo "<tr><td>Código:</td><td>$codigo</td></tr>
  <tr><td>Descripción:</td><td>$descripcion</td></tr>
  <tr><td>Precio de compra:</td><td>$precio_compra</td></tr>
  <tr><td>Precio de venta: </td><td>$precio_venta</td></tr>
  <tr><td>Stock: </td><td>$stock</td></tr>";
  ?>
  <form method="post">
      <?php
        echo "<input type='hidden' name='codigo' value='$codigo'>
        <input type='hidden' name='stock' value='$stock'>
        <tr><td>Unidades que entran al almacén: </td><td><input type='number' min='0' name='unidades' ></td></tr>";
      ?>
      <tr><td><input type="submit" name="accion" value="Entrada"><td><input type="submit"  name="accion" value="Cancelar"></td></tr>
  </form>
</table>
<?php
    // Comprobamos que se haya pulsado el botón
    if(isset($_POST["accion"])){
      // Si el valor del botón que habíamos pulsado, continuamos y extrae del form los valores de los names
      if($_POST["accion"]=="Entrada"){
        extract($_POST);
        $conexion=mysqli_connect ("localhost","root","","examen");
        $sql = "UPDATE articulo SET stock=stock+$unidades WHERE codigo = '$codigo'";
        $conexion->query($sql);
        mysqli_close($conexion);
        header("Location:index.php");
      }
      if($_POST["accion"]=="Cancelar"){
        header("Location:index.php");
      }
    }
  ?>
</body>
</html>
 

 

