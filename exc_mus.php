<html>
	<head>
		<title>Exclusão de Músicas</title>
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
		<p class='titulo'>Exclusão de Músicas</p>
		<table>
				<tr>
					<th>Código da Música</th>
					<th>Nome da Música</th>
					<th>Ano de  Lançamento</th>
					<th>Código da Banda</th>
					<th>Nome da Banda</th>
					<th>Número de Likes</th>
				</tr>

				<?php
				try 
				{
					$connection = new PDO("mysql:host=localhost; dbname=bd_php", "root", "");
					$connection->exec("set names utf8");
				} 
				catch (PDOException $e) 
				{
					echo "Falha: ". $e->getMessage();
					exit();
				}
			if(isset($_REQUEST["like"]) && $_REQUEST["like"]==true){
				$sql2 = "UPDATE musicas SET num_likes=num_likes+1 WHERE cod_musica=?";
				$rs2=$connection->prepare($sql2);
				$rs2->bindParam(1, $_POST["id_like"]);
				$rs2->execute();
				$sql = "SELECT * FROM musicas";
				$rs=$connection->prepare($sql);
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
							<input type=submit name='like' value='LIKE' class='like'></input>
						</form></td>";
						echo "<td>";
						echo "<a href='?excluir=true&id=" . $registro->cod_musica . "' class='exclude'>Exclusão</a>";
						echo "</td>";
						echo "</tr>";
					}
				}else{
					echo "<p class='erro'>Falha na Seleção de Músicas</p>";
				}
				
			}else{
				$rs = $connection->prepare("SELECT * FROM musicas");
				$rs2 = $connection->prepare("SELECT nome_banda FROM bandas where cod_banda=?");

				if($rs->execute()){
					while ($registro = $rs->fetch(PDO::FETCH_OBJ)) {
						echo "<tr>";
						echo "<td>" . $registro->cod_musica . "</td>";
						echo "<td>" . $registro->nome_musica . "</td>";
						echo "<td>" . $registro->ano_lancamento . "</td>";
						echo "<td>" . $registro->cod_banda . "</td>";
						$rs2->bindParam(1, $registro->cod_banda);
						$rs2->execute();
						$rgst = $rs2->fetch(PDO::FETCH_OBJ);
						echo "<td>" . $rgst->nome_banda . "</td>";
						echo "<td>" . $registro->num_likes . "<form method=POST action=?like=true>
						<input type=hidden name='id_like' value=".$registro->cod_musica."></input>
						<input type=submit name='like' value='LIKE'class='like'></input>
						</form></td>";						
						echo "<td>";
						echo "<a href='?excluir=true&id=" . $registro->cod_musica . "' class='exclude'>Exclusão</a>";
						echo "</td>";
					}
				}else{
					echo "<p class='erro'>Falha na Seleção de Músicas</p>";
						
				}
					//rotina de exclusão
				if(isset($_REQUEST["excluir"]) && $_REQUEST["excluir"] == true){
					$stmt = $connection->prepare("DELETE FROM musicas WHERE cod_musica = ?");
					$stmt->bindParam(1, $_REQUEST["id"]);
					$stmt->execute();
					if($stmt->errorCode() != "00000"){
						echo "Erro código ". $stmt->errorCode() . ": ";
						echo implode(", ", $stmt->errorInfo());
					}
					else{
						$msg = "<p>Música removida com sucesso!!!</p>";
					}
				}
				$rs = $connection->prepare("SELECT * FROM musicas");
			}
				
				?>
			</table>
			<?php
			if(isset($msg)){
				echo $msg;
			}
			?>
	</div>
	</body>
</html>