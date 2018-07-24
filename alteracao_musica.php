<?php
    $erro = null;
    $valido = false;
    $erro = null;
    $valido = false;
	$ano_atual = date('Y');
    try{

        $connection = new PDO("mysql:host=localhost;dbname=bd_php", "root", "");
        $connection->exec("set names utf8");
    }
    catch(PDOException $e)
    {
        echo "Falha: " . $e->getMessage();
        exit();
    }

    if(isset($_REQUEST["validar"]) && $_REQUEST["validar"] == true){
    	if(strlen(utf8_decode($_POST["nome"]))<3){
    		$erro = "Nome Inválido, o nome deve conter mais de 3 Caracteres";
    	}
    	else if($_POST["ano"] > $ano_atual){
    		$erro = "Data inválida, preencha o campo Ano da Publicação corretamente";
    	}
    	else{
    	    $valido = true;

            $sql = "UPDATE musicas SET
                    nome_musica = ?,
                    ano_lancamento = ?,
                    cod_banda = ?
                    WHERE cod_musica = ?";
                    
            $stmt = $connection->prepare($sql);
            
            $stmt->bindParam(1, $_POST["nome"]);
            $stmt->bindParam(2, $_POST["ano"]);
            $stmt->bindParam(3, $_POST["cod"]);
			$stmt->bindParam(4, $_REQUEST["id"]);
            $stmt->execute();
            
            if($stmt->errorCode() != "00000"){
                $valido = false;
                $erro = "Erro código " . $stmt->errorCode() . ": ";
                $erro .= implode(", ", $stmt->errorInfo());
            }
        }
    }
    else{
        $rs = $connection->prepare("SELECT * FROM musicas WHERE cod_musica = ?");
        $rs->bindParam(1, $_REQUEST["id"]);
        
        if($rs->execute()){
            if($registro = $rs->fetch(PDO::FETCH_OBJ)){
                $_POST["nome"] = $registro->nome_musica;
                $_POST["ano"] = $registro->ano_lancamento;
                $_POST["cod"] = $registro->cod_banda;
            }
            else{
                $erro = "Registro não encontrado";
            }
        }
        else{
            $erro = "Falha na captura do registro";
        }
    }

?>
<HTML>
    <HEAD>
        <TITLE>Alteração de Músicas</TITLE>
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
            	header("Location: alt_mus.php");
            }
            else
            {        
                if(isset($erro))
                {
                    echo "<p class='erro'>".$erro."</p>";
                }
        ?>
        	<FORM method=POST action="?validar=true">
            <p class=titulo>Alteração de Músicas</p>
            <p>Nome da Música: <input type=text name=nome
		<?php if(isset($_POST["nome"])) {echo "value= '" . $_POST["nome"] . "'";} ?>
		></p>
		
		<p>Ano da Publicação: <input type="number" name="ano" 
		<?php if(isset($_POST["ano"])) {echo "value= '" . $_POST["ano"]. "'";} ?>
		></p>	

		<p>Código da Banda: <input type="number" name="cod" 
		<?php if(isset($_POST["cod"])) {echo "value= '" . $_POST["cod"]. "'";} ?>
		></p>
		
			<INPUT type=HIDDEN name=id
                   value="<?php echo $_REQUEST["id"]; ?>"
            >
                
            <INPUT type=SUBMIT value="Alterar" class='but_env'>

        </FORM>
        <?php
            }
        ?>
        </div>
    </BODY>
</HTML>
