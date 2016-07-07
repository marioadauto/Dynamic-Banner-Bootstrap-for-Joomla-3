<?php

defined('_JEXEC') or die;

$document = JFactory::getDocument();

require_once JPATH_ROOT . '/components/com_banners/helpers/banner.php';

$baseurl = JUri::base();

$check = 0;

$lang = JFactory::getLanguage();

$pagelang = $lang->getTag();

$bgcolor = $params->get('backgroundcolor');

$mod_path = 'modules/mod_bannercamoes/';

$document->addStyleSheet($mod_path.'css/default.min.css');

?>

<div id="main-banner" style="background-color:<?php echo "$bgcolor" ?>" class="carousel slide" data-ride="carousel">
<div class="carousel-inner" role="listbox">
<?php foreach ($list as $item) : ?>
			<?php $link = JRoute::_('index.php?option=com_banners&task=click&id=' . $item->id);?>

			<?php echo str_replace(array('{CLICKURL}', '{NAME}'), array($link, $item->name), $item->custombannercode);?>

			<?php $imageurl = $item->params->get('imageurl');?>

			<?php $h2 =  $item->name;?>

			<?php $desc =  $item->description;?>

			<?php $desctext =  strip_tags($desc);?>

			<?php $descshort = substr($desctext, 0, 150)."";?>

			<?php $width = $item->params->get('width');?>

			<?php $height = $item->params->get('height');?>

			<?php $alt = $item->params->get('alt');?>

			<?php $alt = $alt ? $alt : $item->name; ?>


			<!--Filter Language-->

			<?php if($pagelang == 'pt-PT')

			{                   

			      $readmore = "ler mais";



			}

			if($pagelang == 'en-GB')

			{

			      $readmore = "read more";



			}?>

			<?php if ($check == 0 ){

			 	echo " 

			<div class=\"item  active\">
			<a href=\"$link\" title=\"$h2\">
			<div class=\"banner-image\" style=\"background-image:url($imageurl);\" >
			</div>
			</a>

			<div class=\"description-banner\">			

			<a href=\"$link\" title=\"$h2\">
			
			<h2>$h2</h2>
			
			</a>

			<p class=\"description-banner-text\">

				$descshort

			</p>			

			<span class=\"description-banner-text\">

			<a href=\"$link\" class=\"ler-mais\" title=\"$readmore\">

				$readmore >

				</a>

			</span>			

			</div>	";

			echo "</div>";		

			}

			else{

			echo "

			<div class=\"item \">
			<a href=\"$link\" title=\"$h2\">
			<div class=\"banner-image\" style=\"background-image:url($imageurl);\" >
			</div>
			</a>
			<div class=\"description-banner\">			
			<a href=\"$link\" title=\"$h2\">			
			<h2>$h2</h2>
			</a>

			<p class=\"description-banner-text\">

				$descshort

			</p>			

			<span class=\"description-banner-text\">

			<a href=\"$link\" class=\"ler-mais\"  title=\"$h2 \">

				$readmore >

				</a>

			</span>		

			</div>";

			echo "</div>";	

			}$check++;

			?>
<?php endforeach; ?>
</div>
</div>

<?php $document->addScript($mod_path.'js/default.min.js'); ?>