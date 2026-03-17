<?php
$mapa1=array("joão", "alisson", "higor");

$contatos["Vanesaa"]="123456";
$contatos["João"]="678910";

//tirar elemento
unset($mapa1[2]);
print_r($mapa1);

//contar elementos
$quantidade= count($mapa1);
echo "elementos mapa 1 = $quantidade"


//asort($contatos); pelo valor
//ksort ordena pela chave

?>