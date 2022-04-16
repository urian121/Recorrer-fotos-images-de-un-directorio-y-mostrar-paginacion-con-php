<?php
   /* $directory="img";
    $dirint = dir($directory);
    while (($archivo = $dirint->read()) !== false)
    {
        if (eregi("gif", $archivo) || eregi("jpg", $archivo) || eregi("png", $archivo)){
            echo '<img src="'.$directory."/".$archivo.'">'."\n";
        }
    }
    $dirint->close();*/
/**************************************************/

/*$ruta = "img/"; // Indicar ruta
$filehandle = opendir($ruta); // Abrir archivos
while ($file = readdir($filehandle)) {
        if ($file != "." && $file != "..") {
                $tamanyo = GetImageSize($ruta . $file);
                echo "<p><img src='$ruta$file' $tamanyo[3]><br></p>\n";
        } 
} 
closedir($filehandle); // Fin lectura archivos*/

//definimos el path de acceso
$path = "img/";
//$ruta = $carpeta . "/";
//abrimos el directorio
$dir = opendir($path);
//Mostramos las informaciones
while ($elemento=readdir($dir))
{ 
if(($elemento!='.')&&($elemento!='..'))
{ 
echo '<img src="'.$path.$elemento.'"  width="150px">'.$elemento; 
echo "<br>";
}}
//Cerramos el directorio
closedir($dir); 
?>