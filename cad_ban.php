<?php
	$erro = null;
	$valido = false;
	$ano_atual = date('Y');
	if(isset($_REQUEST["validar"]) && $_REQUEST["validar"]==true){
		if($_POST["genero"] == "Selecione"){
			$erro = "Escolha um Genêro";
		}
		else if($_POST["ano"] > $ano_atual){
			$erro = "Data inválida, preencha o campo Ano de Fundação corretamente";
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
			$sql = "INSERT INTO bandas (nome_banda, genero, ano_fundacao, num_likes)
				VALUES (?,?,?,0)";

			$stmt = $connection -> prepare ($sql);

			$stmt -> bindParam(1, $_POST["nome_banda"]);
			$stmt -> bindParam(2, $_POST["genero"]);
			$stmt -> bindParam(3, $_POST["ano"]);

			$stmt -> execute();

			if ($stmt->errorCode() != "00000") {
				$valido = false;
				$erro = "Erro Código ". $stmt->errorCode(). ": ";
				$erro .= implode(", ", $stmt->errorInfo());
			}
		}				
	}

?>

<html>
	<head>
		<title>Cadastrar Banda</title>
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
		<p class='titulo'>Cadastro de Bandas</p>
		<form method="POST" action="?validar=true">
		<p>Nome da Banda: <input type=text name=nome_banda
		<?php if(isset($_POST["nome_banda"])) {echo "value= '" . $_POST["nome_banda"] . "'";} ?>
		></p>

		<p> Genêro Musical:
		<select name= 'genero'>
		<option>Selecione</option>
		<option <?php if(isset($_POST["genero"]) && $_POST["genero"] == "Axé") {echo "selected";} ?>
		>Axé</option>

		<option <?php if(isset($_POST["genero"]) && $_POST["genero"] == "Black Music") {echo "selected";} ?>
		>Black Music</option>

		<option <?php if(isset($_POST["genero"]) && $_POST["genero"] == "Blues") {echo "selected";} ?>
		>Blues</option>

		<option <?php if(isset($_POST["genero"]) && $_POST["genero"] == "Rock") {echo "selected";} ?>
		>Rock</option>

		<option <?php if(isset($_POST["genero"]) && $_POST["genero"] == "Clássico") {echo "selected";} ?>
		>Clássico</option>

		<option <?php if(isset($_POST["genero"]) && $_POST["genero"] == "Country") {echo "selected";} ?>
		>Country</option>

		<option <?php if(isset($_POST["genero"]) && $_POST["genero"] == "Eletronica") {echo "selected";} ?>
		>Eletronica</option>

		<option <?php if(isset($_POST["genero"]) && $_POST["genero"] == "Forró") {echo "selected";} ?>
		>Forró</option>
		<option <?php if(isset($_POST["genero"]) && $_POST["genero"] == "Funk") {echo "selected";} ?>
		>Funk</option>

		<option <?php if(isset($_POST["genero"]) && $_POST["genero"] == "Gospel") {echo "selected";} ?>
		>Gospel</option>

		<option <?php if(isset($_POST["genero"]) && $_POST["genero"] == "Hip Hop") {echo "selected";} ?>
		>Hip Hop</option>

		<option <?php if(isset($_POST["genero"]) && $_POST["genero"] == "Indie") {echo "selected";} ?>
		>Indie</option>
		<option <?php if(isset($_POST["genero"]) && $_POST["genero"] == "Infantil") {echo "selected";} ?>
		>Infantil</option>

		<option <?php if(isset($_POST["genero"]) && $_POST["genero"] == "Instrumental") {echo "selected";} ?>
		>Instrumental</option>

		<option <?php if(isset($_POST["genero"]) && $_POST["genero"] == "Jazz") {echo "selected";} ?>
		>Jazz</option>

		<option <?php if(isset($_POST["genero"]) && $_POST["genero"] == "MPB") {echo "selected";} ?>
		>MPB</option>
		<option <?php if(isset($_POST["genero"]) && $_POST["genero"] == "Pagode") {echo "selected";} ?>
		>Pagode</option>

		<option <?php if(isset($_POST["genero"]) && $_POST["genero"] == "Pop") {echo "selected";} ?>
		>Pop</option>

		<option <?php if(isset($_POST["genero"]) && $_POST["genero"] == "Rap") {echo "selected";} ?>
		>Rap</option>

		<option <?php if(isset($_POST["genero"]) && $_POST["genero"] == "Reggae") {echo "selected";} ?>
		>Reggae</option>

		<option <?php if(isset($_POST["genero"]) && $_POST["genero"] == "Samba") {echo "selected";} ?>
		>Sertanejo</option>

		<option <?php if(isset($_POST["genero"]) && $_POST["genero"] == "Sertanejo") {echo "selected";} ?>
		>Samba</option>

		<option <?php if(isset($_POST["genero"]) && $_POST["genero"] == "World Music") {echo "selected";} ?>
		>World Music</option>
		</select>
		</p>

		<p>Ano de Fundação: <input type="text" max = '4' name="ano" 
		<?php if(isset($_POST["ano"])) {echo "value= '" . $_POST["ano"]. "'";} ?>
		></p>	

		<p><input type=reset value="Limpar" class='but_env'> <input type=submit value="Enviar" class='but_env'></p>


		</form>
	</body>
</html>