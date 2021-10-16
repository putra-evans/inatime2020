<?php
	$query = mysql_query("SELECT profesi, hargasebelum FROM tb_simposium WHERE id_simposium = '$id_simposium'") or die(mysql_error());
	$data_simposium = mysql_fetch_assoc($query);

	// SQL WORKSHOP
	$sql_work = "
		SELECT tb_detail_workshop.*, tb_workshop.*
		FROM tb_detail_workshop, tb_workshop
		WHERE
			tb_detail_workshop.id_workshop = tb_workshop.id_workshop AND
			tb_detail_workshop.id_daftar = '$id_daftar'
	";
	$query_workshop = mysql_query($sql_work) or die(mysql_error());
	
	// SQL daftar
	$sql_daftar = "
		SELECT tb_daftar.*
		FROM tb_daftar
		WHERE
			tb_daftar.id_daftar = '$id_daftar'
	";
	$query_daftar = mysql_query($sql_daftar) or die(mysql_error());
	$data_daftar = mysql_fetch_assoc($query_daftar);

	require_once "send_user_isi.php";

// 	echo $isi_pesan; die;

	$mail = new PHPMailer(true);
	    try {
	        //Server settings
	        //$mail->SMTPDebug = 4;
	        //$mail->isSMTP();
	        $mail->Host = 'smtp.gmail.com';
	        $mail->SMTPAuth = true;
	        $mail->Username = EMAIL;
	        $mail->Password = PASS;
	        $mail->SMTPSecure = 'tls';
	        $mail->SMTPAuth = true;
	        $mail->Port = 587;
	        //Recipients
	        $mail->setFrom(EMAIL, 'Registrasi Pendaftaran');
	        $mail->addAddress($_POST['email']);     // Add a recipient

	        $mail->addReplyTo(EMAIL);
	       #DBDBDB
	        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	        //Content

	        $mail->isHTML(true);                                  // Set email format to HTML
	        $mail->Subject = "Detail Pendaftaran ".$_POST['nama_lengkap'];
	        $mail->Body    = $isi_pesan;
	        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
	        $mail->send();
	         echo "<script>alert('Thank you, registration information has been sent via Email.'); window.location.href='index.php?ac=print&id=$id_daftar';</script>";
	    } catch (Exception $e) {
	        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
	    }

?>
