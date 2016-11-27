<?php
// $Id: page.tpl.php,v 1.18.2.1 2009/04/30 00:13:31 goba Exp $
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<?php print $head ?>
		<link rel="shortcut icon" href="/favicon.ico" />
		<title><?php print $head_title ?></title>
		<?php print $styles ?>
		<?php print $scripts ?>
		<script type="text/javascript">
				Cufon.replace("#block-menu-primary-links ul li a");
				Cufon.replace("ul#mainmenu li.active a", {color:'#8cc541'});
				Cufon.replace("div#lang a");
				Cufon.replace("h2");
  </script>
</head>
<body>
		<div class="layer-out">
				<div id="header">
						<?php print $header ?>
						<div class="left" id="logo"><?php if ($logo) { ?><a href="<?php print $front_page ?>" title="<?php print t('Home') ?>"><img src="<?php print $logo ?>" alt="<?php print t('Home') ?>" /></a><?php } ?></div>
						<?php if (isset($primary_links)) : ?>
								<div id="block-menu-primary-links">
										<?php print theme('links', $primary_links, array('class' => 'links primary-links')) ?>
								</div>
						<?php endif; ?>
						<?php print switch_language(); ?>
						<br class="clearfix"/>
						<?php switch_language(); ?>
				</div>
				<div id="center">
						<?php print $breadcrumb; ?>
						<div class="left-column left">
								<?php if ($mission): print '<div id="mission">'. $mission .'</div>'; endif; ?>
								<?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block">'; endif; ?>
										<?php if ($title): print '<h1 class="title">'. $title .'</h1>'; endif; ?>
										<?php if ($tabs): print '<div class="tabs primary">'. $tabs .'</div>'; endif; ?>
								<?php if ($tabs): print '</div>'; endif; ?>
								<?php if ($tabs2): print '<div class="tabs secondary">'. $tabs2 .'</div>'; endif; ?>
								<?php if ($show_messages && $messages): print $messages; endif; ?>
								<?php print $help; ?>
								<?php print $content ?>
						</div>
						<div class="right-column right"><?php print $right ?></div><br class="clearfix"/>
				</div>
				<div id="footer"><?php print $footer_message . $footer ?></div>
		</div>
		<?php print $closure ?>
</body>
</html>