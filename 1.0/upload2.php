<?php
/* Sera colocado identificao das extencoes. 
Talvez possa ainda virar quase um servidor de arquivos, 
por extencao secreta. Um addon.
*/
// E claro isset.!!!
if(isset($_FILES['arquivo']['name')) {
    $dir = 'uploads/'; 
    $nome = 'trogvideo';
    //Quantidade de strings. E diminuicao -4. Para padroes.
    $nome_real_quantidade = strlen($_FILES['arquivo']['name']);
   $quantidade = $nome_real_quantidade - 4;
   $nome_diminuido = strtolower(substr($_FILES['arquivo']['name'], 0, $quantidade));
   $passar = fopen('temp/1.txt', 'w');
   fwrite($passar, "$dir$nome_diminuido.mp4" );
   fclose($passar);
    //Converte para minusculas
    $nome_arquivo = strtolower($_FILES['arquivo']['name']);
    // Trabalhar tempo para aletoriedade
    $i = 0;
    $segundo = date("s");
    $seg = $segundo + 1;
    
     //Move o arquivo e salva.
     move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir.$nome.$seg.$nome_arquivo); 
    //Fazer upload do arquivo
    $arquivo_texto = fopen('converter.sh','w');
    //fwrite($arquivo_texto, "#!/bin/bash \r\n");
    fwrite($arquivo_texto,"ffmpeg -i $dir$nome$seg$nome_arquivo $dir$nome_diminuido.mp4");
    fclose($arquivo_texto);
    echo("Click para INICIAR O PROCESSO DE CONVERSÂO");
}
else{
    $abrir_arquivo = "1.txt";
    $Open_arquivo = fopen($abrir_arquivo, "r");
    $buffer = fread($Open_arquivo, filesize($abrir_arquivo));
    fclose($Open_arquivo);
  echo "<a href=\"$buffer\">Download</a><BR/>";
       }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  if(isset($_GET['VAI']))
{

exec('/var/www/trogsearch/public_html/converter.sh');
echo ("CONVERTIDO");
}
?>

 <html>
   <head>
     <title> Formulario truque</title>
   </head>
   <body>
<form action="upload2.php" method="GET">
<input type="submit" name="VAI"  value="Converter">
</form>
     
   </body>
  </html>
