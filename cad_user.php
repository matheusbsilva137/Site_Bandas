<?php
	$erro= null;
	$valido = false;
	if(isset($_REQUEST["validar"]) && $_REQUEST["validar"]==true){
		if(strlen($_POST["login"])<5){
			$erro = "Nome de Usuário incorreto! Digite no mínimo 5 caracteres.";
		}elseif(strlen($_POST["senha"])<5){
			$erro = "Senha incorreta! Digite no mínimo 5 caracteres.";
		}elseif(($_POST["senha"])!=($_POST["senha2"])){
			$erro = "As senhas digitadas não correspondem!";
		}else{
			try{
				$connection = new PDO("mysql:host=localhost;dbname=bd_php", "root", "");
				$connection->exec("set names utf8");
			}catch(PDException $e){
				echo "Falha: ".$e->getMessage();
				exit();
			}
			$senhacript = md5($_POST["senha"]);
			$sql = "INSERT INTO usuarios (nome, login, senha) values (?, ?, ?)";
			$stmt = $connection->prepare($sql);
			$stmt->bindParam(1, $_POST["nome"]);
			$stmt->bindParam(2, $_POST["login"]);
			$stmt->bindParam(3, $senhacript);
			$stmt->execute();
			if($stmt->errorCode() != "00000"){
				$valido = false;
				$erro = "Erro código ".$stmt->errorCode().": ";
				$erro .= implode(", ", $stmt->errorInfo());
			}else{
				header('Location: index.php');
			}
		}
	}
?>
<html>
	<head>
		<title>Cadastro de Usuário</title>
		<link rel="stylesheet" href="customizacao.css" />
		<meta charset="UTF-8"/>
	</head>
	<body>
		<div id="caixa_login">
			<?php
				if($valido == false){					
			?>
			<form method="POST" action="?validar=true">
				<p id='titulo'><strong>Login</strong></p>
				<p><label>Nome:</label><input type='text' name='nome'
				<?php if(isset($_POST["nome"])) { echo "value = '".$_POST["nome"]."'"; } ?>></p>
				<p><label>Usuário:</label><input type='text' name='login'
				<?php if(isset($_POST["login"])) { echo "value = '".$_POST["login"]."'"; } ?>></p>
				<p><label>Senha:</label><input type='password' name='senha'
				<?php if(isset($_POST["senha"])) { echo "value = '".$_POST["senha"]."'"; } ?>></p>
				<p><label>Repetir Senha:</label><input type='password' name='senha2'
				<?php if(isset($_POST["senha2"])) { echo "value = '".$_POST["senha2"]."'"; } ?>></p>
				<input type="submit" value="Enviar" class='but_env'/><br />
				<p><a href='index.php'>Já é um usuário? FAÇA LOGIN!</a></p>
			</form>
			<?php
					if(isset($erro)){
						echo "<p class='erro'>".$erro."<br /><br />";
					}
				}
			?>
		</div>
	</body>
</html>