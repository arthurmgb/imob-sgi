<?
	@$sql2 = "SELECT * FROM $bancobarra WHERE id_imovel='$id_imovel'";
	@$resultado2 = mysql_query($sql2)
	or die ("<B>Não foi possível realizar a consulta ao banco de dados</B>");
	
	$linha2=mysql_fetch_array($resultado2);		 	 	 	 	 	 	
		$pronto = $linha2["pronto"];		 	 	 	 	 	 	
		$obra = $linha2["obra"];	 	 	 	 	 	 	
		$escavacao = $linha2["escavacao"];	 	 	 	 	 	 	
		$contencao = $linha2["contencao"];	 	 	 	 	 	 	
		$fundacao = $linha2["fundacao"];		 	 	 	 	 	 	
		$estrutura = $linha2["estrutura"];			 	 	 	 	 	 	
		$alvenaria = $linha2["alvenaria"];			 	 	 	 	 	 	
		$instalacao = $linha2["instalacao"];			 	 	 	 	 	 	
		$rinterno = $linha2["rinterno"];			 	 	 	 	 	 	
		$rexterno = $linha2["rexterno"];			 	 	 	 	 	 	
		$acabamento = $linha2["acabamento"];
		$finalizacao = $linha2["finalizacao"];

		
		
function show_prog_bar($width, $percent, $type, $color = '#000') {
	$font =			'arial';
	$font_size =		'10px';
	$font_weight =		'bold';	// bold, normal
 
	include "../../config/index/dados.php";

	// == Don't edit below ==
	$percent = min($percent, 100);
	$width -= 2;
	$result = (($percent*$width) / 100);
	$return = '';
	$return .= '<div name="progress">';
	$return .= '<div style="background: url(../../temas/'.$tema.'/images/progress_bar.gif) no-repeat; height: 25px; width: 1px; display: block; float: left"><!-- --></div>';
	$return .= '<div style="background: url(../../temas/'.$tema.'/images/bg_bar.gif); height: 25px; width: '.$width.'px; display: block; float: left">';

	$return .= '<span style="background: url(../../temas/'.$tema.'/images/'.strtolower($type).'.gif); display: block; float: left; width: '.$result.'px; height: 23px; margin: 1px 0; font-size: '.$font_size.'; font-family: \''.$font.'\'; line-height: 23px; font-weight: '.$font_weight.'; text-align: right; color: '.$color.'; letter-spacing: 1px;">&nbsp;'.$percent.'%&nbsp;</span>';

	$return .= '</div>';
	$return .= '<div style="background: url(../../temas/'.$tema.'/images/progress_bar.gif) no-repeat; height: 25px; width: 1px; display: block; float: left"><!-- --></div>';
	$return .= '</div>';
	return $return;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

	<div class='item_imovel_barra'>Pronto para morar <?=show_prog_bar(240, $pronto, 'barra01');?> </div>

	<div class='item_imovel_barra'> Obras iniciadas </b></p><?=show_prog_bar(240, $obra, 'barra02');?></div>
    
    <div class='item_imovel_barra'> Escavações </b></p><?=show_prog_bar(240, $escavacao, 'barra02');?></div>
    
    <div class='item_imovel_barra'> Contenções </b></p><?=show_prog_bar(240, $contencao, 'barra02');?></div>
    
   <div class='item_imovel_barra'> Fundações </b></p><?=show_prog_bar(240, $fundacao, 'barra02');?></div>
    
    <div class='item_imovel_barra'> Estrutura </b></p><?=show_prog_bar(240, $estrutura, 'barra02');?></div>
    
    <div class='item_imovel_barra'> Alvenaria </b></p><?=show_prog_bar(240, $alvenaria, 'barra02');?></div>
    
   <div class='item_imovel_barra'> Instalações </b></p><?=show_prog_bar(240, $instalacao, 'barra02');?></div>
    
   <div class='item_imovel_barra'> Revestimento interno </b></p><?=show_prog_bar(240, $rinterno, 'barra02');?></div>
    
   <div class='item_imovel_barra'> Revestimento externo </b></p><?=show_prog_bar(240, $rexterno, 'barra02');?></div>
    
   <div class='item_imovel_barra'> Acabamento </b></p><?=show_prog_bar(240, $acabamento, 'barra02');?></div>
    
   <div class='item_imovel_barra'> Finalização </b></p><?=show_prog_bar(240, $finalizacao, 'barra02');?></div>
    

<body>
</body>
</html>