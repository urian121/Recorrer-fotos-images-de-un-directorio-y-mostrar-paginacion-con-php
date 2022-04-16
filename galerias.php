<table>
 <tr>
<?php
header('Content-type: text/html; charset=utf-8');
# Galería de imágenes
# (CC) Alfonso Saavedra "Son Link"
# Bajo GPLv3
 
$path = 'img'; # Directorio donde están las imágenes
$limit = 6; # Cuantas imágenes se mostraran por pagina
$limit_file = 5; # Imágenes a mostrar por linea en la tabla
$n = 0;
$desde;
$hasta;
# Comprobamos si es un directorio y si lo es nos movemos a el
if (is_dir($path)){
 $dir = opendir($path);
 # Recorremos los ficheros que hay en el directorio y cogemos solamente aquellos cuya extensión
 # sea jpg, gif y png y la guardamos en una lista
 while (false !== ($file = readdir($dir))) {
  if (preg_match("#([a-zA-Z0-9_\-\s]+)\.(gif|GIF|jpg|JPG|png|PNG)#is",$file)){
   $list[] = $file;
  }
 }
 # Cerramos el directorio
 closedir($dir);
 # Ordenamos la lista
 sort ($list);
 # Contamos el total de elementos en la lista
 $total = count($list);
 $paginas = ceil($total/$limit);
 if (!isset($_GET['pg'])){
  $desde = 0;
  $hasta = $desde + $limit;
 }else if((int)$_GET['pg'] > ($paginas-1)){
  # Si pg es mayor que el total de paginas se muestra un error
  echo "<b>No existe esta pagina en la galería</b>
<a href='galeria.php'>Volver a la galería</a>";
  die();
 }else{
  $desde = (int)$_GET['pg'];
 }
 # Y generamos los enlaces con los thumbnails
 for ($i=($desde*$limit);($i!=$total) && ($i<($desde*$limit)+$limit);$i++){
  # Comprobamos si existe en la lista una llave con el valor actual de $i para evitar errores
  if(array_key_exists($i, $list)){
   echo "<td><a href='$path/$list[$i]'><img src='$path/$list[$i]'  width='150px' /></a>
</td>\n";
   $n++;
   if ($n == $limit_file){
    echo "</tr>\n<tr>\n";
    $n = 0;
   }
  }
 }
}else{
 echo "$path no es un directorio";
}
?>
 </tr>
</table>
<p id="paginas">
<?php
# Generamos un listado de las paginas de la galería
for ($p = 0; $p<$paginas; $p++){
 $pg = $p+1;
 if ($p == $desde){
  echo "$pg ";
 }else{
  echo "<a href ='?pg=$p'>$pg</a> ";
 } 
}?>
</p>
<?php echo "Hay un total de $total imagen(es) en $paginas paginas(s)" ?>
