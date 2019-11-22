<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Control bd</title>
</head>
<body>
<h3>
      Salida de mercancía
  </h3>
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
              <tr><td>Unidades que salen del almacén: </td><td><input type='number' min='0' max='$stock' name='unidades' ></td></tr>";
        ?>
         <tr><td><input type="submit" name="accion" value="Salida">             
			<input type="submit"  name="accion" value="Cancelar"></td>
      </form>
    </tr>
  </table>
  <?php
    if(isset($_POST["accion"])){
      if($_POST["accion"]=="Salida"){
        extract($_POST);
        $conexion=mysqli_connect ("localhost","root","","examen");
        if($stock == $unidades){
          $sql = "DELETE from articulo where codigo = '$codigo'";
        }
        else{
          $sql = "UPDATE articulo SET stock=stock-".$unidades." WHERE codigo = '$codigo'";
        }
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