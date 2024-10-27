<?php
session_start();

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include_once ("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");
    $conn = connect();
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $query = "SELECT * FROM tb_usuarios WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $token = bin2hex(random_bytes(50));
        $expires = date("U") + 1800; 

        $query = "UPDATE tb_usuarios SET token_recuperacao = '$token', token_expires = '$expires' WHERE email = '$email'";
        mysqli_query($conn, $query);

        $url = "http://localhost/projtcc/web/php/setPass.php?token=" . $token;

        $mail = new PHPMailer();

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; 
            $mail->SMTPAuth = true;
            $mail->Username = 'emanuel.vitorino.silva@escola.pr.gov.br'; 
            $mail->Password = 'zpeo ijna dixw yldm'; 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
            $mail->Port = 587; 

            $mail->setFrom('no-reply@seusite.com', 'COMLIB');
            $mail->addAddress($email); 

            $mail->isHTML(true);
            $mail->Subject = 'Recupere sua Senha';
            $mail->Body = 'Clique no link para redefinir sua senha: <a href="' . $url . '">' . $url . '</a>';

            if ($mail->send()) {
                $_SESSION['recuperacao_sucesso'] = 'Link de recuperação enviado para seu e-mail.';
            } else {
                error_log("Erro ao enviar e-mail: " . $mail->ErrorInfo);
                $_SESSION['recuperacao_erro'] = 'Erro ao enviar o e-mail. Verifique a configuração do servidor de e-mail.';
            }
        } catch (Exception $e) {
            error_log("Erro ao enviar e-mail: " . $e->getMessage());
            $_SESSION['recuperacao_erro'] = 'Erro ao enviar o e-mail. Verifique a configuração do servidor de e-mail.';
        }
    } else {
        $_SESSION['recuperacao_erro'] = 'E-mail não encontrado.';
    }

    header('Location: resetPass.php');
    exit();
}
?>
