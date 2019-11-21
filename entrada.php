
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
  <tr><td>Unidades que entran al almacén:</td><td><input type="number" min="0"  name="unidades" ></td></tr>
  <tr><td><input type="submit" name="accion" value="Entrada"><td><input type="submit"  name="accion" value="Cancelar"></td></tr>

</table>

</body>
</html>
 

 

