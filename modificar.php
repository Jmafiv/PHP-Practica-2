
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Control bd</title>
</head>

<body>
  <h3>Modificación de datos del artículo</h3>

  <table>
      <?php
  extract($_POST);
  echo "<form method='post'>";
  echo "
    <input type='hidden' name='codigo' value='$codigo'>
    <tr><td>Código: </td><td>$codigo</td></tr>
    <tr><td> Descripción:</td><td><input type='text' name='descripcion' value='$descripcion'></td></tr>
    <tr><td> Precio de compra: </td><td><input type='text' name='precio_compra' value='$precio_compra'></td></tr>
    <tr><td> Precio de venta: </td><td><input type='text' name='precio_venta' value='$precio_venta'></td></tr>
    <tr><td> Stock: </td><td>$stock</td></tr>";
    ?>
    <tr><td>

      <input type="submit"  name="accion" value="Modificar">
      <input type="submit"  name="accion" value="Cancelar">
    </td></tr>
  <?php
  echo "</form>";
  ?>
  </table>
  <?php
    if(isset($_POST["accion"])){
      if($_POST["accion"]=="Modificar"){
        extract($_POST);
        $conexion=mysqli_connect ("localhost","root","","examen");
        $sql = "UPDATE articulo SET descripcion='$descripcion', precio_compra=$precio_compra, precio_venta=$precio_venta WHERE codigo = '$codigo'";
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

  

