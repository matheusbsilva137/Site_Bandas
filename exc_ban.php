<html>
	<head>
		<title>Exclusão de Bandas</title>
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
		<p class='titulo'>Exclusão de Bandas</p>
		<table>
				<tr>
					<th>Código da Banda</th>
					<th>Nome da Banda</th>
					<th>Gênero</th>
					<th>Ano de Fundação</th>
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
					$sql2 = "UPDATE bandas SET num_likes=num_likes+1 WHERE cod_banda=?";
					$rs2=$connection->prepare($sql2);
					$rs2->bindParam(1, $_POST["id_like"]);
					$rs2->execute();
					$sql = "SELECT * FROM bandas";
					$rs=$connection->prepare($sql);
					if($rs->execute()){
						while($registro = $rs->fetch(PDO::FETCH_OBJ)){
							echo "<tr>";
							echo "<td>". $registro->cod_banda ."</td>";
							echo "<td>". $registro->nome_banda ."</td>";
							echo "<td>". $registro->genero ."</td>";
							echo "<td>". $registro->ano_fundacao ."</td>";
							echo "<td>". $registro->num_likes ."
							<form method=POST action=?like=true>
								<input type=hidden name='id_like' value=".$registro->cod_banda."></input>
								<input type=submit name='like' value='LIKE' class='like'></input>
							</form></td>";
							echo "<td>";
							echo "<a href='?excluir=true&id=" . $registro->cod_banda . "' class='exclude'>Exclusão</a>";
							echo "</td>";
							echo "</tr>";
						}
					}else{
						echo "<p class='erro'>Falha na Seleção de Bandas</p>";
					}
					
				}else{
					$rs = $connection->prepare("SELECT * FROM bandas");
					$rs2 = $connection->prepare("SELECT nome_banda FROM bandas where cod_banda=?");

					if($rs->execute()){
						while ($registro = $rs->fetch(PDO::FETCH_OBJ)) {
							echo "<tr>";
							echo "<td>". $registro->cod_banda ."</td>";
							echo "<td>". $registro->nome_banda ."</td>";
							echo "<td>". $registro->genero ."</td>";
							echo "<td>". $registro->ano_fundacao ."</td>";
							echo "<td>". $registro->num_likes ."
							<form method=POST action=?like=true>
								<input type=hidden name='id_like' value=".$registro->cod_banda."></input>
								<input type=submit name='like' value='LIKE' class='like'></input>
							</form></td>";
							echo "<td>";
							echo "<a href='?excluir=true&id=" . $registro->cod_banda . "' class='exclude'>Exclusão</a>";
							echo "</td>";
							echo "</tr>";
						}
					}else{
						echo "<p class='erro'>Falha na Seleção de Bandas</p>";
							
					}
						//rotina de exclusão
					if(isset($_REQUEST["excluir"]) && $_REQUEST["excluir"] == true){
						$stmt = $connection->prepare("DELETE FROM bandas WHERE cod_banda = ?");
						$stmt->bindParam(1, $_REQUEST["id"]);
						$stmt->execute();
						if($stmt->errorCode() != "00000"){
							echo "Erro código ". $stmt->errorCode() . ": ";
							echo implode(", ", $stmt->errorInfo());
						}else{
							$msg = "<p>Banda removida com sucesso!!!</p>";
						}
					}
					$rs = $connection->prepare("SELECT * FROM bandas");
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