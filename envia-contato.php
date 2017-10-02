<?php require_once("PHPMailerAutoload.php"); ?>
<?php
	$nome = $_REQUEST['nome'];
	$email = $_REQUEST['email'];
	$mensagem = $_REQUEST['mensagem'];

	$mail = new PHPMailer();

	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;
	$mail->Username = "moniqueaz.si@gmail.com";
	$mail->Password = "xxx";

	$mail->setFrom("moniqueaz.si@gmail.com", "Caelum - Curso PHP e MySQL");
	$mail->addAddress("moniqueaz.si@gmail.com");
	$mail->Subject = "Email de contato da loja";
	$mail->msgHTML("<html>de: {$nome}<br/>email: {$email}<br/>
					mensagem: {$mensagem}</html>");
	$mail->AltBody = "de: {$nome}\nemail:{$email}\nmensagem: {$mensagem}";
	if($mail->send()) {
		header("Location: index.php?sucesso=Mensagem enviada com sucesso");
	} else {
		header("Location: contato.php?falha=Erro ao enviar mensagem: " 
		. $mail->ErrorInfo);
	}
	die();

?>