<?php
echo '<?xml version="1.0" encoding="UTF-8"?>';

$hoje = date('Y-m-d');
$server = $_SERVER['SERVER_NAME']; 
$site = "http://" . $server;

?>

<urlset
xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
<url>
<loc><?php echo $site;?>/</loc>
  <lastmod><?php echo $hoje;?></lastmod>
  <priority>1.00</priority>
  <changefreq>daily</changefreq>
</url>
<url>
  <loc><?php echo $site;?>/home/index/index.php</loc>
  <lastmod><?php echo $hoje;?></lastmod>
  <priority>0.80</priority>
  <changefreq>daily</changefreq>
</url>
<url>
  <loc><?php echo $site;?>/empresa/index/index.php</loc>
  <lastmod><?php echo $hoje;?></lastmod>
  <priority>0.80</priority>
  <changefreq>daily</changefreq>
</url>
<url>
  <loc><?php echo $site;?>servico/index/index.php</loc>
  <lastmod><?php echo $hoje;?></lastmod>
  <priority>0.80</priority>
  <changefreq>daily</changefreq>
</url>
<url>
  <loc><?php echo $site;?>/imovel/index/index.php</loc>
  <lastmod><?php echo $hoje;?></lastmod>
  <priority>0.80</priority>
  <changefreq>daily</changefreq>
</url>
<url>
  <loc><?php echo $site;?>/imovel/index/index.php?negocio=comprar</loc>
  <lastmod><?php echo $hoje;?></lastmod>
  <priority>0.80</priority>
  <changefreq>daily</changefreq>
</url>
<url>
  <loc><?php echo $site;?>/imovel/index/index.php?negocio=alugar</loc>
  <lastmod><?php echo $hoje;?></lastmod>
  <priority>0.80</priority>
  <changefreq>daily</changefreq>
</url>
<url>
  <loc><?php echo $site;?>/contato/venda/index.php</loc>
  <lastmod><?php echo $hoje;?></lastmod>
  <priority>0.80</priority>
  <changefreq>daily</changefreq>
</url>
<url>
  <loc><?php echo $site;?>/contato/index/index.php</loc>
  <lastmod><?php echo $hoje;?></lastmod>
  <priority>0.80</priority>
  <changefreq>daily</changefreq>
</url>
<url>
  <loc><?php echo $site;?>/contato/ligar/index.php</loc>
  <lastmod><?php echo $hoje;?></lastmod>
  <priority>0.80</priority>
  <changefreq>daily</changefreq>
</url>
<url>
  <loc><?php echo $site;?>/contato/chat/index.php</loc>
  <lastmod><?php echo $hoje;?></lastmod>
  <priority>0.80</priority>
  <changefreq>daily</changefreq>
</url>
</urlset>