<?
		@session_start();
		header('Content-Type: text/html; charset=utf-8');
		// Настройка локали
		setlocale(LC_ALL, 'ru_RU.65001', 'rus_RUS.65001', 'Russian_Russia. 65001', 'russian');;
		date_default_timezone_set('Etc/UTC');
		require 'libs/phpmailer/PHPMailerAutoload.php';
		$mail = new PHPMailer;
		$mail->isSMTP();
		$mail->SMTPDebug = 1;
		$mail->Debugoutput = 'html';
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 465;
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = "ssl";
		$mail->Username = "primebellsrussia@gmail.com";
		$mail->Password = "C1MgaKcGvfwr";

		if(!empty($lk->user['id']))
		{
			header( 'Location:'.$lk->site_url ); 
		}
		function generatePasswords($length = 8)
		{
		  $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ1234567890';
		  $numChars = strlen($chars);
		  $string = '';
		  for ($i = 0; $i < $length; $i++)
		  {
			$string .= substr($chars, rand(1, $numChars) - 1, 1);
		  }
		  return $string;
		}
	if($_POST['gorestor'])
	{
		if(!empty($_POST['login'])&&!empty($_POST['gorestor'])){
			$login = trim(strip_tags($_POST['login']));
			$sql_get = "SELECT id,email  FROM `imp_userLogin` WHERE email = '".$login."'";
			$info_array = $db->query($sql_get);
			$info = $info_array->fetch_assoc();
			if(!empty($info['id']))
			{
				$token = rand(1000000,9999999);
				$today = date("Y-m-d H:i:s");
				$sql_set = "INSERT INTO `tokens` (`user_id`, `token`, `date`) VALUES ('".$info['id']."', '".$token."', '".$today."')";
				if($db->query($sql_set) === true)
				{	
					$mail->setFrom('primebellsrussia@gmail.com', 'Prime Bells');
					$mail->addReplyTo('primebellsrussia@gmail.com', 'Prime Bells');
					$mail->addAddress($info['email'], 'Востановление пароля');
					$mail->Subject = 'Востановление пароля';
					$mail->msgHTML("<p>перейдите по ссылке для получения нового пароля<a href='".$lk->site_url."?page=user&action=restore&token=$token'>".$lk->site_url."?page=user&action=restore&token=$token</a></p>");
					$mail->send();
					$success='Сообщение отправленно';
					$template->assign("sendemail_restor", 'send');	
				}
			}
		}else{
			$error = 'Данный Email не существует';
		}
	}
	elseif(isset($_GET['token']))
	{
		$token = (int)$_GET['token']*1;
		$sql_get_new = "SELECT id,user_id,active FROM `tokens` WHERE token = '".$token."'";
		$array_new = $db->query($sql_get_new);
		$new = $array_new->fetch_assoc();
		if(!empty($new['id']))
		{
			if($new['active']=="1")
			{
				$error =$lng['restore_mail_error_token'];
				exit;
			}
			$sql_get_pass = "SELECT id,email FROM `user` WHERE id = '".$new['user_id']."'";
			$array_pass = $db->query($sql_get_pass);
			$user_pass = $array_pass->fetch_assoc();
			$password = generatePassword();
			$pass = md5(md5($password).'nv78HBcas8db');
			$sql_activate_user = "UPDATE imp_userLogin SET password = '".$pass."' WHERE id = '".$user_pass['id']."'";
			$sql_activate_token = "UPDATE tokens SET active = '1' WHERE id = '".$new['id']."'";
			if($db->query($sql_activate_user)===TRUE&&$db->query($sql_activate_token)===TRUE)
			{
					$mail->setFrom('primebellsrussia@gmail.com', 'Prime Bells');
					$mail->addReplyTo('primebellsrussia@gmail.com', 'Prime Bells');
					$mail->addAddress($user_pass['email'], 'Востановление пароля');
					$mail->Subject = 'Пароль Востановлен';
					$mail->msgHTML("<p>Ваш новый пароль ".$password."</p>");
					$mail->send();
					$success= $lng['restore_success'];
			}
		}
	}
$template->assign("token_restor", $_GET['token']);	
$template->assign("success", $success); 
$template->assign("error", $error); 
?>
