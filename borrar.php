
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Control bd</title>
</head>
<body>
  <h3 class="text-center">Se borrará el siguiente artículo de la base de datos:</h3>
  <hr> 
  <?php 
  extract($_POST);
  echo "Código: $codigo
  <br>Descripción: $descripcion
  <br>Precio de compra: $precio_compra
  <br>Precio de venta: $precio_venta
  <br>Stock: $stock";
  ?>
  <hr>
  ¿Está seguro?
  <table>
    <tr>
      <td>
        <form method="post">
          <?php
            echo "<input type='hidden' name='codigo' value='$codigo'>";
          ?>
        <input type="submit" name="accion" value="Eliminar">
        <input type="submit"  name="accion" value="Cancelar">
        </form>
      </td>
    </tr>
  </table>
  <?php
    if(isset($_POST["accion"])){
      if($_POST["accion"]=="Eliminar"){
        $conexion=mysqli_connect ("localhost","root","","examen");
        $conexion->query("DELETE from articulo where codigo = '$codigo'");
        header("Location:index.php");
      }
      if($_POST["accion"]=="Cancelar"){
        header("Location:index.php");
      }
    }
  ?>
</body>
</html>