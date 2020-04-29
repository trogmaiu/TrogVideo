<?php
/*
Sera colocado identificao das extencoes. 
Talvez possa ainda virar quase um servidor de arquivos, 
por extencao secreta. Um addon.
*/

if(isset($_FILES['arquivo']['name'])) {
$dir = 'uploads/'; 
$nome = 'trogvideo';


//Quantidade de strings. E diminuicao -4. Para padroes.
$nome_real_quantidade = strlen($_FILES['arquivo']['name']);
$quantidade = $nome_real_quantidade - 4;
$nome_diminuido = strtolower(substr($_FILES['arquivo']['name'], 0, $quantidade));
$passar = ("$dir$nome_diminuido.mp4" );


$nome_arquivo = strtolower($_FILES['arquivo']['name']);

$i = 0;
$segundo = date("s");
$seg = $segundo + 1;


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Move o arquivo e salva.
move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir.$nome.$seg.$nome_arquivo); 
//Converte o video
shell_exec("ffmpeg -i $dir$nome$seg$nome_arquivo $dir$nome_diminuido.mp4");
echo("Processo terminado de conversão. Download disponível...");
     echo "<a href=\"$passar\">Download</a><BR/>";
}
?>

<BR>
<BR>
<BR>
<BR>
<html>
<head>
<title> TROGVIDEO</title>
</head>
<body>
</form>
</body>
</html>
