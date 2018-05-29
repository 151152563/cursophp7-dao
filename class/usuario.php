<?php 

class Usuario {
	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

public function getIdusuario()
{
    return $this->idusuario;
}

public function setIdusuario($idusuario)
{
    $this->idusuario = $idusuario;
}

public function getDeslogin()
{
    return $this->deslogin;
}

public function setDeslogin($deslogin)
{
    $this->deslogin = $deslogin;
}


public function getDessenha()
{
    return $this->dessenha;
}

public function setDessenha($dessenha)
{
    $this->dessenha = $dessenha;
}


public function getDtcadastro()
{
    return $this->dtcadastro;
}

public function setDtcadastro($dtcadastro)
{
    $this->dtcadastro = $dtcadastro;
}

//Busca pelo id referente no banco de dados
public function loadByID($id){

	$sql = new Sql();

	$result= $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(":ID"=>$id
	));

	if (count($result) > 0) {

		$row = $result[0];

		$this->setIdusuario($row['idusuario']);
		$this->setDeslogin($row['deslogin']);
		$this->setDessenha($row['dessenha']);
		$this->setDtcadastro(new DateTIme($row['dtcadastro']));
	}
}

//Metodos estaticos não precisam ser instanciados
//Podendo ser chamados diretamente pela classe.
//ex) $lista = Usuario::getList();
//Melho utilizado quando não se utiliza $this
public static function getList(){

	$sql = new Sql();

	return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin;");

}
//Para buscar apenas pelo login
public static function search($login){

	$sql = new Sql();
	return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(
		':SEARCH'=>"%".$login."%"

	));	

}
//Serve para retornar os dados do usuario informando o
//login e senha
public function login($login, $passsword){

	$sql = new Sql();

	$result= $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD", array(
		":LOGIN"=>$login,
		":PASSWORD"=>$passsword
	));

	if (count($result) > 0) {

		$row = $result[0];

		$this->setIdusuario($row['idusuario']);
		$this->setDeslogin($row['deslogin']);
		$this->setDessenha($row['dessenha']);
		$this->setDtcadastro(new DateTIme($row['dtcadastro']));
	} else {

		throw new Exception("Login e/ou senha inválidos.");
		
	}
}

public function __toString(){
	return json_encode(array(
		"idusuario"=>$this->getIdusuario(),
		"deslogin"=>$this->getDeslogin(),
		"dessenha"=>$this->getDessenha(),
		"dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
	));
}

}

?>