<?php
date_default_timezone_set('|America/Sao_Paulo');

require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



	if ((isset($_POST['email']) && !empty(trim($_POST['email']))) && (isset($_POST['mensagem'])
	 && !empty(trim($_POST['mensagem'])))){
		
		$nome = !empty($_POST['nome']) ? $_POST['nome'] : 'Não informado';
		$email = $_POST['email'];
		$assunto = !empty($_POST['assunto']) ? utf8_decode($_POST['assunto']) : 'Não informado';
		$mensagem = !empty($_POST['mensagem']) ? trim($_POST['mensagem']) : 'Não informado';
		$data = date('d/m/y H:i:s');

		$mail = new PHPMailer(true);
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'wmsoftwares1@gmail.com';
		$mail->Password = 'WMsoftware2020';
		$mail->Port = 587;

		$mail->setFrom('wmsoftwares1@gmail.com'); #email que esta enviando
		$mail->addAddress('wmsoftwares1@gmail.com'); # email do provedor


		$mail->isHTML(true);
		$mail->Subject = $assunto;
		$mail->Body = "Nome: {$nome}<br>
					   Email: {$email}<br>
					   Mensagem: {$mensagem}<br>
					   Data/Hora: {$data}";

		if ($mail->send()) {
			echo 'Email enviado com sucesso';
		} else {
			echo 'Email nao enviado';
		}
	} else {
		echo 'Email não enviado: preencher os campos email e mensagem.';
	}
