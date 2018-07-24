<html>
	<head>
		<meta charset="UTF-8" />
		<title>Pesquisa de Músicas</title>
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
		<form method="POST" action="?validar=true">
				<label><strong>Nome da Música:</strong></label>
					<input type='text' name='nome' id='entrada'
					<?php if(isset($_POST["nome"])) { echo "value = '".$_POST["nome"]."'"; } ?>><input type='submit' class='but_env' value="OK"></p>
		</form>
		<?php
		$digit='';
		if(isset($_POST["nome"])==false){
			$_POST["nome"]='';
		}else{
			$digit = $_POST["nome"];
		}
		if(isset($_REQUEST["like"]) && $_REQUEST["like"]==true){
			try{
				$connection = new PDO("mysql:host=localhost; dbname=bd_php", "root", "");
				$connection->exec("set names utf8");
			}catch(PDOException $e){
				echo "Falha: ".$e->getMessage();
				exit();
			}
			$sql2 = "UPDATE musicas SET num_likes=num_likes+1 WHERE cod_musica=?";
			$rs2=$connection->prepare($sql2);
			$rs2->bindParam(1, $_POST["id_like"]);
			$rs2->execute();
			$sql = "SELECT * FROM musicas WHERE nome_musica LIKE ?";
			$rs=$connection->prepare($sql);
			$var = '%'.$digit.'%';
			$rs->bindParam(1, $var);
			echo "<table>";
				echo "<tr>";
					echo "<th>Código da Música</th>";
					echo "<th>Nome da Música</th>";
					echo "<th>Ano de Lançamento</th>";
					echo "<th>Código da Banda</th>";
					echo "<th>Nome da Banda</th>";
					echo "<th>Número de Likes</th>";
				echo "</tr>";
			$rs2 = $connection->prepare("SELECT nome_banda FROM bandas where cod_banda=?");
			if($rs->execute()){
				while($registro = $rs->fetch(PDO::FETCH_OBJ)){
					echo "<tr>";
					echo "<td>". $registro->cod_musica ."</td>";
					echo "<td>". $registro->nome_musica ."</td>";
					echo "<td>". $registro->ano_lancamento ."</td>";
					echo "<td>". $registro->cod_banda ."</td>";
					$rs2->bindParam(1, $registro->cod_banda);
					$rs2->execute();
					$rgst = $rs2->fetch(PDO::FETCH_OBJ);
					echo "<td>" . $rgst->nome_banda . "</td>";
					echo "<td>". $registro->num_likes ."
					<form method=POST action=?like=true>
						<input type=hidden name='id_like' value=".$registro->cod_musica."></input>
						<input type=submit name='like' value='LIKE'class='like'></input></td>
					</form>";
					echo "</tr>";
				}
			}else{
				echo "<p class='erro'>Falha na Seleção de Músicas</p>";
			}
			echo "</table>";
		}
		if(isset($_REQUEST["validar"]) && $_REQUEST["validar"]==true){
			try{
				$connection = new PDO("mysql:host=localhost; dbname=bd_php", "root", "");
				$connection->exec("set names utf8");
			}catch(PDOException $e){
				echo "Falha: ".$e->getMessage();
				exit();
			}
			$sql = "SELECT * FROM musicas WHERE nome_musica LIKE ?";
			$rs=$connection->prepare($sql);
			$var = '%'.$_POST["nome"].'%';
			$rs->bindParam(1, $var);
			echo "<table>";
				echo "<tr>";
					echo "<th>Código da Música</th>";
					echo "<th>Nome da Música</th>";
					echo "<th>Ano de Lançamento</th>";
					echo "<th>Código da Banda</th>";
					echo "<th>Nome da Banda</th>";
					echo "<th>Número de Likes</th>";
				echo "</tr>";
			$rs2 = $connection->prepare("SELECT nome_banda FROM bandas where cod_banda=?");
			if($rs->execute()){
				while($registro = $rs->fetch(PDO::FETCH_OBJ)){
					echo "<tr>";
					echo "<td>". $registro->cod_musica ."</td>";
					echo "<td>". $registro->nome_musica ."</td>";
					echo "<td>". $registro->ano_lancamento ."</td>";
					echo "<td>". $registro->cod_banda ."</td>";
					$rs2->bindParam(1, $registro->cod_banda);
					$rs2->execute();
					$rgst = $rs2->fetch(PDO::FETCH_OBJ);
					echo "<td>" . $rgst->nome_banda . "</td>";
					echo "<td>". $registro->num_likes ."
					<form method=POST action=?like=true>
						<input type=hidden name='id_like' value=".$registro->cod_musica."></input>
						<input type=submit name='like' value='LIKE'class='like'></input></td>
					</form>";
				echo "</tr>";
			}
		}else{
			echo "<p class='erro'>Falha na Seleção de Músicas</p>";
		}
		echo "</table>";
	}
?>
	</div>
	</body>
</html>