<?php
   pegarEnviar();
   function pegarEnviar() {

   		$id = $_POST['id'];
   		$assunto = $_POST['title'];
   		$msg = $_POST['msg'];
   		$contato = $_POST['contato'];
	   
       enviarEmail('danielcurtixpiratax@gmail.com', "$id", "$assunto", "$msg", "$contato");
   }
   
   function enviarEmail($para, $nome, $assunto, $mensagem, $contato) {
	   
	   require_once("phpmailer/PHPMailerAutoload.php");
	   
	   date_default_timezone_set("America/Sao_Paulo");
	   
	   $Email = new PHPMailer();
	   
	   $Email->isSMTP();
	   
	   $Email->SMTPDebug = 1;
	   
	   $Email->SMTPAuth = true;
	   
	   $Email->SMTPSecure = 'tls';
	   
	   $Email->Host = 'smtp.gmail.com';
	   
	   $Email->Port = 587;
	   
	   $Email->Username = 'danielcurti179';
	   $Email->Password = 'daniel2380';
	   
	   $Email->SetLanguage("br");
	   
	   $Email->FromName = $nome;
	   
	   $Email->AddAddress($para);
	   
	   $Email->Subject = $assunto;
	   
	   $Email->Body = $mensagem." $contato";
	   
	   echo "qualquer coisa";

	   if ($Email->Send() )
	       return "A mensagem não foi enviada. Erro:".$Email->ErrorInfo;
	   else
	       return "Mensagem enviada!";
   }
   

?>
