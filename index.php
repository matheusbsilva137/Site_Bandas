<?php
	$erro= null;
	$valido = false;
	if(isset($_REQUEST["validar"]) && $_REQUEST["validar"]==true){
		if(strlen($_POST["login"])<5){
			$erro = "Nome de Usuário incorreto! Digite no mínimo 5 caracteres.";
		}elseif(strlen($_POST["senha"])<5){
			$erro = "Senha incorreta!";
		}else{
			try{
				$connection = new PDO("mysql:host=localhost;dbname=bd_php", "root", "");
				$connection->exec("set names utf8");
			}catch(PDException $e){
				echo "Falha: ".$e->getMessage();
				exit();
			}
			$sql = "SELECT * FROM usuarios where login = ?";
			$stmt = $connection->prepare($sql);
			$stmt->bindParam(1, $_POST["login"]);
			$stmt->execute();
			if($stmt->errorCode() != "00000"){
				$valido = false;
				$erro = "Login incorreto!";
			}else{
				$reg = $stmt->fetch(PDO::FETCH_OBJ);
				if(($_POST["login"] == $reg->login) && (md5($_POST["senha"]) == $reg->senha)){
					$valido = true;
				}else{
					$erro = "Não Logou!";
				}
			}
		}
	}
?>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" href="customizacao.css" />
		<meta charset="UTF-8"/>
	</head>
	<body>
		<div id="caixa_login">
			<form method="POST" action="?validar=true">
				<p id='titulo_index'><strong>Login</strong></p>
				<p><label>Usuário:</label><input type='text' name='login'
				<?php if(isset($_POST["login"])) { echo "value = '".$_POST["login"]."'"; } ?>></p>
				<p><label>Senha:</label><input type='password' name='senha'
				<?php if(isset($_POST["senha"])) { echo "value = '".$_POST["senha"]."'"; } ?>></p>
				<input type="submit" value="Enviar" class='but_env'/>
				<p><a href='cad_user.php'>Não é um usuário? CADASTRE-SE!</a></p>
			</form>
			<?php
				if($valido == true){
					header('Location: menu.html');
				}else{
					if(isset($erro)){
						echo "<p class='erro'>".$erro."</p><br /><br />";
					}
				}
			?>
		</div>
	</body>
</html>