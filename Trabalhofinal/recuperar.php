<?php
  include 'menu.php';
  ?>

<form method="post">
    <label for="">Digite seu usuário </label>
<input type="text" name="login" required >
<button name="send" type="submit">Enviar</button>
</form>

<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

include 'conexao.php';
if (isset($_POST['login'])) {
    $chave = sha1(uniqid( mt_rand(), true));
    $login = $_POST['login'];

    $query = "SELECT usuario_id, email FROM usuario where login='$login'";
    $resultado = mysqli_query($conexao, $query);
    if ($resultado) {
        $linha = mysqli_fetch_array($resultado);
        $email = $linha['email'];

        $conf = mysqli_query($conexao, "INSERT INTO recuperacao VALUES ('$email', '$chave')");

        if ($conf) {
            $link = "http://localhost/Trabalhofinal/alt-usuario.php?utilizador=$login&confirmacao=$chave";
            
        }
    } 

}

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = '0000488076@senaimgaluno.com.br';                 // SMTP username
    $mail->Password = 'isa13171041';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('$email');
    $mail->addAddress('', 'Isa Xavier');     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
   // $mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Redefinição de senha';
    $mail->Body    = "<b> Olá, $login! Segue o link para a redefinição de sua senha: http://example.net/recuperar.php?utilizador=$login&confirmacao=$chave  </b>";
    $mail->AltBody = 'Olá, $login! \n Segue o link para refefinir a sua senha: ';

    $mail->send();
    echo 'Mensagem foi enviada';
} catch (Exception $e) {
    echo 'Mensagem não pode ser enviada.';
    echo ' Error: ' . $mail->ErrorInfo;

}