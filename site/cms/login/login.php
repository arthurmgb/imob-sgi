<?php
/*
* HomeDevice v1.0
* HomeDevice é um Software proprietário, não livre, cuja cópia, 
* redistribuição ou modificação são em alguma medida restritos 
* pelo seu criador ou distribuidor.
* Desenvolvido por Fernando Blomer
* HomeDevice e WebDevice são nomes fansatia de produtos
* ou sistemas de propriedade de Fernando Blomer
* www.webdevice.com.br
*/
session_start();                        
if(file_exists("init.php")){
        require_once "init.php";
		require_once BASEPATH . "seguranca.class.php";
} else {
        die("Arquivo de init não encontrado");
}

function limpa($string){
        $var = trim($string);
        $var = addslashes($var);        
        return $var;
}

if(getenv("REQUEST_METHOD") == "POST"){
        $nome  = isset($_POST["nome"]) ? limpa($_POST["nome"]) : "";
        $senha = isset($_POST["senha"]) ? limpa($_POST["senha"]) : "";
        
        $sql = sprintf("select count(*) from usuario where login = '%s' and senha = md5('%s')", $nome, $senha);
        mysql_connect($dbserver, $dbuser, $dbpass) or die(mysql_error());
        mysql_select_db($dbname) or die(mysql_error());        
        $re = mysql_query($sql) or die(mysql_error());
		
        if(mysql_result($re, 0)){
                $re        = mysql_query("select * from usuario where login = '$nome' and senha = md5('$senha')") or die(mysql_error());               
                $resultado = mysql_fetch_array($re);
                if($resultado["nivel"] > 0){
                        $dados = array();
                        $dados["nome"] = $nome;
                        $dados["senha"] = $senha; 
						$dados["nivel"] = $resultado["nivel"];
						$dados["id_usuario"] = $resultado["id_usuario"];
						                      
                        $_SESSION["dados"] = $dados;                    
                        
                        if(isset($_POST["cookie"])){                    
                                setcookie("dados", serialize($dados), time()+60*60*24*365);                     
                        }
                        header("Location: ../index.php");
                } else {
                        header("Location: ../login.html");
						
                }               
        } else {
                header("Location: ../login.html");
        }
		
}
?>