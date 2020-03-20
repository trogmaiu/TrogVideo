<?php
$tam = 1024 * 1024  * 1;

if(isset($_FILES['arquivo'])) {
date_default_timezone_set("Brazil/East"); //Definindo timezone padrão

      $ext = strtolower(substr($_FILES['fileUpload']['name'],-4)); //Pegando extensão do arquivo
      $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
      $dir = 'uploads/'; //Diretório para uploads

      move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo

if ( $_FILES['arquivo']['size']  > $tam) {
echo "Arquivo maior que a especificacao";
shell_exec( '/var/www/trogsearch/public_html/converter.sh' );

}
   }
?>


