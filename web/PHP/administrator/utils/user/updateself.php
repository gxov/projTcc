<?php
include_once ("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");


//logica de ediçãp para Usuario
if (isset($_POST['updateP'])) {
  $conn = connect();
  $cod = $_SESSION["id"];
  $nome = $_POST["nomeUpd"];
  $cpf = $_POST["cpfUpd"];
  $email = $_POST["emailUpd"];
  $dtnasc = $_POST["dtnascUpd"];
  $desc = $_POST["descricaoUpd"];

  $filename = $_FILES["imagemUserUpd"]["name"];
  $tempname = $_FILES["imagemUserUpd"]["tmp_name"];


  $folder = "C:/xampp/htdocs/projtcc/web/src/fotos/usuario/" . $filename;

  
  $sql = "UPDATE tb_usuarios
  SET nome ='" . $nome . "', dtnasc = '". $dtnasc . "', cpf = ". $cpf . ", email = '". $email . "', descricao = '". $descricao ."', imagem = '" . $filename . "' 
  WHERE cod = ". $cod;


  $tsql = $conn->prepare($sql);
  $tsql->execute();
  if (move_uploaded_file($tempname, $folder)) {
  } else {
  };
  unset($_POST['updateP']);
}elseif(isset($_POST['updateS'])){
    $conn = connect();
    $cod = $_SESSION['id'];
    $senhaA0 = md5($_POST['senhaA']); 
    $senhaN = md5($_POST['senhaN']);
    $sql2 = "SELECT senha FROM tb_usuarios WHERE cod = ". $cod;
    $tsql2 = $conn->prepare($sql2);
    $tsql2->execute();
    $tsql2->bind_result($senhaA1);
    while($tsql2->fetch()){
        if($senhaA1 == $senhaA0){
            $sql3 = "UPDATE tb_usuarios SET senha = '".$senha."' WHERE cod = ".$cod.";";
        }
    }
    unset($_POST['updateS']);
}

?>