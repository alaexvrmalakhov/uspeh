<?php
		// $Id: page.tpl.php,v 0.1.2 2009/10/02 22:22:32 symphonythemes Exp $
		global $theme_path;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
<head>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <?php print $scripts; ?>

  <!--[if IE]>
    <link rel="stylesheet" href="<?php print $base_path.$directory; ?>/css/ie.css" type="text/css" />
  <![endif]-->
  <!--[if IE 6]>
    <link rel="stylesheet" href="<?php print $base_path.$directory; ?>/css/ie6.css" type="text/css" />
    <script type="text/javascript" src="<?php print $base_path.$directory; ?>/js/supersleight.js"></script>
  <![endif]-->
  <!--[if IE 7]>
    <link rel="stylesheet" href="<?php print $base_path.$directory; ?>/css/ie7.css" type="text/css" />
    <link rel="stylesheet" href="<?php print $base_path.$directory; ?>/css/font-awesome-ie7.min.css" type="text/css" />
  <![endif]-->
		
		<script>      
				jQuery(function(){      
				$("#banners img").hover(function(){      
						$(this).stop().animate({opacity:'1.0'})},      
								function(){$(this).stop().animate({opacity:'.5'})}      
						);      
				});      
				jQuery(function(){      
				$("#logofooter img").hover(function(){      
						$(this).stop().animate({opacity:'1.0'})},      
								function(){$(this).stop().animate({opacity:'.8'})}      
						);      
				});
		</script> 
		<style>      
				#banners img{opacity:.5;filter:alpha(opacity=50)}
				#logofooter img{opacity:.8;filter:alpha(opacity=80)}
		</style>
</head>
<?php 
  $menu_style = theme_get_setting('menu_style'); 
  if ($menu_style == 1) {
    include ($directory . '/menu/splitmenu/splitmenu.php');
    $result = getTitleActiveMenu('primary-links');
    $tree = $result['submenu'];
    $title_submenu = $result['title'];
  }
?>
<body id="bd">
  <!-- Header -->
  <div id="st_wrapper">
    <div class="container_16 main-container clear-block">
      <div id="st_header_top">
        <div id="st_header_top_inner">
          <div id="st_logo_header" class="logo_header">
              <?php
                // Prepare header
                if ($logo || $site_name) {
                  print '<a href="'. check_url($front_page) .'" title="'. $site_name .'">';
                  if ($logo) {
                    print '<img src="'. check_url($logo) .'" alt="'. $site_name .'" id="logo" />';
                  }
                  else {
                    $logo_path = $base_path.$directory . '/images/' . theme_get_setting('color') . '/logo.png';
                    print '<img src="'. check_url($logo_path) . '" alt="'. $site_name .'" id="logo" />';
                  }
                  print $site_html .'</a>';
                }
              ?>
          </div>
          <div id="st_sitename">
            <h1>
              <a href="<?php print check_url($front_page) ;?>" title="<?php print $site_name;?>"><?php print $site_name;?></a>
            </h1>
          </div>
          <div id="st_search" class="st_search"><?php print $search_box; ?></div>
          </div>
        </div>
        <div id="st_header">
        <!-- Main menu -->
        <div id="st_main_menu" class="grid_12 menutop">
          <?php if (isset($primary_links)) :
            if ($menu_style == 1) {
              print theme('links', $primary_links, array('class' => 'links primary-links'));
            }
            else {
              include($directory . '/menu/menu.class.php');
              print get_links('primary-links');
            }
          endif; ?>
        </div>
        <!-- End main menu -->
      </div> <!-- End header -->

      <!-- Slogan -->
      <?php if ($slider): ?>
      <div id="st_slogan" class="grid_16">
          <?php print $slider; ?>
      </div>
      <?php endif; ?>
      <!-- End slogan -->

      <!-- Main -->
      <div id="st_main">
        <?php $count_grid = 16;
          if ($left or ($tree and !$right)) $count_grid -= 3;
          if ($right) $count_grid -= 4;
        ?>
  
        <!-- Left -->
        <?php if ($left or ($tree and !$right)): ?>
        <div id="st_sidebar_left" class="sidebar grid_3">
          <!-- Split menu -->
          <?php if ($tree) { ?>
            <div id="st_main_menu_level2" class="module_box">
              <h2><?php print $title_submenu; ?></h2>
              <?php print $tree; ?>
            </div>
          <?php } ?>
  
          <?php print $left; ?>
        </div>
        <?php endif; ?>
        <!-- End left -->
                
        <!-- Main Content -->
        <div id="st_center" class="grid_<?php print $count_grid;?>">
          <div id="st_center_inner">
            <!-- Breadcumb -->
            <?php if (theme_get_setting('show_breadcrumb') and $breadcrumb and !$is_front) { ?>
            <div id="breadcrumb"><div id="breadcrumb-inner">
              <?php print($breadcrumb); ?>
            </div></div>
            <?php } ?>
            <?php if ($mission): print '<div id="mission">' . $mission . '</div>'; endif; ?>
            <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block">'; endif; ?>
            <?php if ($title): print '<h2' . ($tabs ? ' class="with-tabs"' : ' class="node-title"') . '>' . $title . '</h2>'; endif; ?>
            <?php if ($tabs): print $tabs . '</div>'; endif; ?>
            <?php if ($tabs2): print $tabs2; endif; ?>
            <?php if ($show_messages && $messages): print $messages; endif; ?>
            <?php print $help; ?>
    
            <div class="clear-block">
              <?php print $content ?>
            </div>
            <?php print $feed_icons ?>
          </div>
        </div>
        <!-- End content -->
      </div> 
      <!-- End Main -->
    </div>
  </div>
  <div id="st_wrapper_news">    
    <div class="container_16 clear-block">
      <!-- News -->
      <?php if ($news1 or $news2 or $news3 or $news4): ?>
      <?php 
        $count_news = 0;
        if ($news1) $count_news++;
        if ($news2) $count_news++;
        if ($news3) $count_news++;
        if ($news4) $count_news++;
        switch ($count_news) {
          case 1: 
            $grid_news_class = "grid_16";
            break;
			
          case 2:
            $grid_news_class = "grid_8";
            break;
			
          case 3:
          case 4:
            $grid_news_class = "grid_4";
            break;
			
          default:
            $grid_news_class = "grid_4";
            break;
        }
      ?>
      <div id="st_news">
        <!-- News1 -->
        <?php if ($news1): ?>
          <div id="st_news1" class="<?php print $grid_news_class;?>">
            <?php print $news1; ?>
          </div>
        <?php endif; ?>
        <!-- End News1-->
  
        <!-- News2 -->
        <?php if ($news2): ?>
          <div id="st_news2" class="<?php print $grid_news_class;?>">
            <?php print $news2; ?>
          </div>
        <?php endif; ?>
        <!-- End News2-->
  
        <!-- News3 -->
        <?php if ($news3): ?>
          <div id="st_news3" class="<?php if ($count_news == 3 and !$news4) print "grid_8 omega"; else print $grid_news_class; ?>">
            <?php print $news3; ?>
          </div>
        <?php endif; ?>
        <!-- End News3-->
  
        <!-- News4 -->
        <?php if ($news4): ?>
          <div id="st_news4" class="<?php if ($count_news == 3) print "grid_8"; else print $grid_news_class; ?> omega">
            <?php print $news4; ?>
          </div>
        <?php endif; ?>
        <!-- End News4-->
      </div>
      <?php endif; ?>
      <!-- End News -->
      <div class="grid_16 footerbanners" id="banners">
        <div class="footerbanners-out">
          <div class="banners_f_1"><a href="#"><img src="/<?php print $theme_path;?>/banners/zuptor.jpg" /></a></div>
    			<div class="banners_f_2"><a href="#"><img src="/<?php print $theme_path;?>/banners/siloking.jpg" /></a></div>
    			<div class="banners_f_3"><a href="#"><img src="/<?php print $theme_path;?>/banners/kverneland.jpg" /></a></div>
          <div class="banners_f_4"><a href="#"><img src="/<?php print $theme_path;?>/banners/agromash.jpg" /></a></div>
    		</div>
	    </div>
      </div>
    </div>
  <div id="st_wrapper_footer">    
    <div class="container_16 clear-block">
      <!-- Footer -->
      <div id="st_footer" class="grid_16">
        <div id="st_footer_logo">
          <?php
          // Prepare footer
		  $logo_footer = theme_get_setting('show_logo_footer');
          if ($logo_footer || $site_name) {
            print '<h1 id="logofooter"><a href="'. check_url($front_page) .'" title="'. $site_name .'">';
            if ($logo_footer) {
		  	  $logo_path = $base_path.$directory . '/images/' . theme_get_setting('color') . '/logo-footer.png';
			  print '<img src="'. check_url($logo_path) .'" alt="'. $site_name .'" id="logo" />';
            }   
            print '</a></h1>';
          }
          ?>
      </div>
      
      <!-- Main menu -->
      <div id="st_menu_footer">
        <?php if (isset($footer_menu)): ?>
          <?php print $footer_menu ?>
        <?php endif; ?>
      </div>
      <!-- End main menu -->
      <?php if ($copyright): ?>
      <div id="st_copyright" class="grid_16 alpha">
        <?php print $copyright; ?>
      </div>
      <?php endif; ?>
        </div>
        <!-- End main menu -->
      </div>
      <!-- End Footer -->
    </div>
  </div>  
  <?php print $closure; ?>
  </body>
</html>