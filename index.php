<?php 

require_once("config.php");
/*Codigo simples de consulta
$sql = new Sql();

$usuarios = $sql->select("SELECT * FROM tb_usuarios");

echo json_encode($usuarios);
*/

//Carrega apenas um usuario
/* Retorna apenas um usuario do banco por id
$root = new Usuario();

$root->loadbyId(1);

echo $root;
*/

//Carrega uma lista de usuarios
/*$lista = Usuario::getList();

echo json_encode($lista);
*/

//Carrega uma lista de usuarios buscando pelo login
//Ou se contem aquele conjunto de caracteres...
/*$busca = Usuario::search("jo");

echo json_encode($busca);
*/
//Carrega um usuario usando o login e a senha
/*$usuario = new Usuario();
$usuario->login ("jose","abcde");
echo ($usuario);
*/

 ?>