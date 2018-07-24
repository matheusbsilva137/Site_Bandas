<?php
	$erro = null;
	$valido = false;
	$ano_atual = date('Y');

	if(isset($_REQUEST["validar"]) && $_REQUEST["validar"]==true){
		if(strlen(utf8_decode($_POST["nome"]))<3){
			$erro = "Nome Inválido, o nome deve conter mais de 3 Caracteres";
		}
		else if($_POST["ano"] > $ano_atual){
			$erro = "Data inválida, preencha o campo Ano da Publicação corretamente";
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
			$sql = "INSERT INTO musicas (nome_musica, ano_lancamento, cod_banda, num_likes)
				VALUES (?,?,?,0)";

			$stmt = $connection -> prepare ($sql);

			$stmt -> bindParam(1, $_POST["nome"]);
			$stmt -> bindParam(2, $_POST["ano"]);
			$stmt -> bindParam(3, $_POST["cod"]);
			
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
		<title>Cadastro de Músicas</title>
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
				echo "Dados Enviados com Sucesso!!";
			}
			else{
				if(isset($erro)){
					echo "<p class='erro'>".$erro."</p>";
				}
			}
		?>
		<p class='titulo'>Cadastro de Músicas</p>
		<form method="POST" action="?validar=true">
		<p>Nome da Música: <input type=text name=nome
		<?php if(isset($_POST["nome"])) {echo "value= '" . $_POST["nome"] . "'";} ?>
		></p>
		
		<p>Ano da Publicação: <input type="number" name="ano" 
		<?php if(isset($_POST["ano"])) {echo "value= '" . $_POST["ano"]. "'";} ?>
		></p>	

		<p>Código da Banda: <input type="number" name="cod" 
		<?php if(isset($_POST["cod"])) {echo "value= '" . $_POST["cod"]. "'";} ?>
		></p>

		<p><input type=reset value="Limpar" class='but_env'> <input type=submit value="Enviar" class='but_env'></p>
		</form>
	</body>
</html>