<?php
	$erro = null;
	$valido = false;
	$erro = null;
	$valido = false;
	try{
		$connection = new PDO("mysql:host=localhost;dbname=bd_php", "root", ""); //cria a conexão com o banco de dados chamado banco_php do mysql
		$connection->exec("set names utf8");  //define a conexão para receber dados em UTF-8
	}
		catch(PDOException $e){
		echo "Falha: ".$e->getMessage(); //caso não seja possível conectar o banco de dados, será exibida a falaha e mensagem de erro
		exit();
	}
	if(isset($_REQUEST["validar"]) && $_REQUEST["validar"]==true){
		if(strlen($_POST["nome"])<3){
			$erro = "Nome Inválido, o nome deve conter mais de 3 Caracteres";
		}
		else if(strlen($_POST["funcao"])<5){
			$erro = "Função Inválida, a função deve conter mais de 5 Caracteres";
		}
		else{
			$valido = true;
			try {
				$connection = new PDO ("mysql:host=localhost;dbname=bd_php", "root", "");
				$connection->exec("set names utf8");
			} catch (PDOException $e) {
				echo "Falha: ". $e->getMessage();
				exit();
			}
			$sql = "UPDATE artistas set
			nome_artista = ?,
			idade = ?,
			funcao = ?,
			cod_banda = ?
			where cod_artista = ?";

			$stmt = $connection -> prepare ($sql);

			$stmt -> bindParam(1, $_POST["nome"]);
			$stmt -> bindParam(2, $_POST["idade"]);
			$stmt -> bindParam(3, $_POST["funcao"]);
			$stmt -> bindParam(4, $_POST["cod_banda"]);
			$stmt -> bindParam(5, $_REQUEST["id"]);
			$stmt -> execute();

			if ($stmt-> errorCode() != "00000") {
				$valido = false;
				$erro = "Erro Código ". $stmt ->errorCode(). ": ";
				$erro .= implode(", ", $stmt->errorInfo());
			}
		}				
	}else{
		$rs = $connection->prepare("SELECT * FROM artistas WHERE cod_artista = ?");
		$rs->bindParam(1, $_REQUEST["id"]);
			
		if($rs->execute()){
			if($registro = $rs->fetch(PDO::FETCH_OBJ)){
				$_POST["nome"] = $registro->nome_artista;
				$_POST["idade"] = $registro->idade;
				$_POST["funcao"] = $registro->funcao;
				$_POST["cod_banda"] = $registro->cod_banda;
			}else{
				$erro = "Registro não encontrado";
			}
		}else{
			$erro = "Falha na captura do registro";
		}
	}
?>
<html>
	<head>
		<title>Alteração de Artistas</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="customizacao_menu.css" />
	</head>
	<body>
		<div id="menu">
		<div class="center">
				<li>Cadastro
				<ul>
					<li><a href='cad_ban.php'>Bandas</a></li><br />
					<li><a href='cad_art.php'>Artistas</a></li><br />
					<li><a href='cad_mus.php'>Músicas</a></li>
				</ul></li>
				<li>Alteração
				<ul>
					<li><a href='alt_ban.php'>Bandas</a></li><br />
					<li><a href='alt_art.php'>Artistas</a></li><br />
					<li><a href='alt_mus.php'>Músicas</a></li>
				</ul></li>
				<li>Listagem
				<ul>
					<li><a href='list_ban.php'>Bandas</a></li><br />
					<li><a href='list_art.php'>Artistas</a></li><br />
					<li><a href='list_mus.php'>Músicas</a></li>
				</ul></li>
				<li>Pesquisa
				<ul>
					<li><a href='pesq_ban.php'>Bandas</a></li><br />
					<li><a href='pesq_art.php'>Artistas</a></li><br />
					<li><a href='pesq_mus.php'>Músicas</a></li>
				</ul></li>
				<li>Exclusão
				<ul>
					<li><a href='exc_ban.php'>Bandas</a></li><br />
					<li><a href='exc_art.php'>Artistas</a></li><br />
					<li><a href='exc_mus.php'>Músicas</a></li>
				</ul></li>
				<li>Ranking
				<ul>
					<li><a href='rank_ban.php'>Bandas</a></li><br />
					<li><a href='rank_art.php'>Artistas</a></li><br />
					<li><a href='rank_mus.php'>Músicas</a></li>
				</ul></li>
				<li><a href='index.php'>Sair</a></li>
		</div>
	</div>
	<div class='conteudo'>
		<?php
			if($valido == true){
				header("Location: alt_art.php");
			}
			else{
				if(isset($erro)){
					echo "<p class='erro'>".$erro."</p>";
				}
			?>
		<form method=POST action="?validar=true">
			<p class=titulo>Alteração de Artistas</p>
			<p>Nome: <input type=text name=nome
			<?php if(isset($_POST["nome"])) {echo "value= '" . $_POST["nome"] . "'";} ?>
			></p>
			<p>Idade: <input type=text name=idade
			<?php if(isset($_POST["idade"])) {echo "value= '" . $_POST["idade"] . "'";} ?>
			></p>
			<p>Função: <input type=text name=funcao
			<?php if(isset($_POST["funcao"])) {echo "value= '" . $_POST["funcao"] . "'";} ?>
			></p>
			<p>Código da Banda: <input type=text name=cod_banda
			<?php if(isset($_POST["cod_banda"])) {echo "value= '" . $_POST["cod_banda"] . "'";} ?>
			</p><br />
			<INPUT type=HIDDEN name=id value="<?php echo $_REQUEST["id"]; ?>">
			<input type=submit value="Alterar" class='but_env'>
		</form>
		<?php
		}
		?>
	</div>
	</body>
</html>