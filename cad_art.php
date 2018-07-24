<?php
	$erro = null;
	$valido = false;

	if(isset($_REQUEST["validar"]) && $_REQUEST["validar"]==true){
		if(strlen(utf8_decode($_POST["nome_artista"]))<3){
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
			$sql = "INSERT INTO artistas (nome_artista, funcao, idade, cod_banda, num_likes)
				VALUES (?,?,?,?, 0)";

			$stmt = $connection -> prepare ($sql);

			$stmt -> bindParam(1, $_POST["nome_artista"]);
			$stmt -> bindParam(2, $_POST["funcao"]);
			$stmt -> bindParam(3, $_POST["idade"]);
			$stmt -> bindParam(4, $_POST["cod_banda"]);
			$stmt -> execute();

			if ($stmt-> errorCode() != "00000") {
				$valido = false;
				$erro = "Erro Código ". $stmt ->errorCode(). ": ";
				$erro .= implode(", ", $stmt->errorInfo());
			}
		}				
	}

?>

<html>
	<head>
		<title>Cadastrar Artistas</title>
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
				echo "<p>Dados Enviados com Sucesso!</p>";
			}
			else{
				if(isset($erro)){
					echo "<p class='erro'>".$erro."</p>";
				}
			}
		?>
		<p class='titulo'>Cadastro de Artistas</p>
		<form method="POST" action="?validar=true">
		<p>Nome do Artista: <input type=text name=nome_artista
		<?php if(isset($_POST["nome_artista"])) {echo "value= '" . $_POST["nome_artista"] . "'";} ?>
		></p>
		
		<p>Idade: <input type="number" name="idade" 
		<?php if(isset($_POST["idade"])) {echo "value= '" . $_POST["idade"]. "'";} ?>
		></p>	

		<p> Função: <input type=text name=funcao
		<?php if(isset($_POST["funcao"])) {echo "value= '" . $_POST["funcao"] . "'";} ?>
		></p>

		<p>Código da Banda: <input type="number" name="cod_banda" 
		<?php if(isset($_POST["cod_banda"])) {echo "value= '" . $_POST["cod_banda"]. "'";} ?>
		></p>

		<p><input type=reset value="Limpar" class='but_env'> <input type=submit value="Enviar" class='but_env'></p>
		</form>
		</div>
	</body>
</html>