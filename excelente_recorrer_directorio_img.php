

<?php 
 //busca el numero de imagenes en la carpeta 
$dir = "img"; 
$dh  = opendir($dir); 
while (false !== ($nombre_archivo = readdir($dh))) { 
   $archivos[] = $nombre_archivo; 
} 

$total_archivos = count($archivos); 
$total = $total_archivos-2; 
// fin 


$num_colum = 3;   // el numero de columnas a mostrar 
$carpeta="img";    // la carpeta de las imagenes 
echo '<center>'; 
$d = dir("$carpeta"); 
$temcount = 1; 
while (false !== ($entry = $d->read())) { 
if( preg_match('/(\.gif$|\.png$|\.jpg)$/is', $entry) ) { 
if( $entry != '.' && $entry != '..' ) { 
$patterns[0] = "/\.gif/"; 
$patterns[1] = "/\.png/"; 
$patterns[2] = "/\.jpg/"; 
$replacements[2] = ""; 
$replacements[1] = ""; 
$replacements[0] = ""; 
ksort($patterns); 
ksort($replacements); 
$entryname =  preg_replace($patterns, $replacements, $entry); 
$a=1; 
if($carpeta!=""){ 
$entrya = "$carpeta/$entry"; 
}else{ 
$entrya = $entry; 
} 
echo '<a href="'.$carpeta.'/'.$entry.'"">' 
.'<img src="'.$carpeta.'/'.$entry.'" border="0" alt="'.$entryname.'" width=200 title="'.$entryname.'" hspace="10" vspace="10"></a>'; 
} 
} 
if ($temcount == $num_colum) { 
echo '<br>'; 
$temcount=0; 
} 
$temcount++; 
} 
echo '</center>'; 

?>