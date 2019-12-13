<!DOCTYPE html>
<html <?php language_attributes();?>>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php bloginfo('name'); ?>  <?php if(is_home()) echo '&#xbb; 100% Coconut Oil'; else echo wp_title();  ?> </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="<?php if(is_single() && get_post_meta($post->ID, "description", true) !='' ) echo get_post_meta($post->ID, "description", true); else echo 'Number One Website Designing Company ';?>" />
    <meta name="keywords" content="<?php if(is_single() && get_post_meta($post->ID, "keywords", true) != '') echo get_post_meta($post->ID, "keywords", true); else echo 'We lead others follow';?>" />
    
    <meta property="og:url"                content="<?php echo get_site_url(); ?>" />
    <meta property="og:type"               content="website" />
    <meta property="og:title"              content="<?php bloginfo('name'); ?>  <?php if(is_home()) echo '&#xbb; 100% Coconut Oil'; else echo wp_title();  ?>"  />
    <meta property="og:description"        content="<?php if(is_single() && get_post_meta($post->ID, "description", true) !='' ) echo get_post_meta($post->ID, "description", true); else echo 'Number One Website Designing Company ';?>" />
    <meta property="og:image"              content="<?php if(is_single() && get_post_meta($post->ID, "meta_image", true) !='' ) echo get_post_meta($post->ID, "meta_image", true); else echo get_template_directory_uri(); ?>/img/logo/Havilah&hill.png;" />
    
    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto|Tinos|Ubuntu&display=swap" rel="stylesheet">


 <!-- =======================================================
        Theme Name: Havilah & Hills Theme
        Author: Michael
        ======================================================= -->


    <?php wp_head(); ?>
    </head>

    <body>


    <!--==========================
    Header
    ============================-->
    <header id="header"> 
        <div class="container-fluid ml-4 ">

            <div id="logo" class="pull-left">
                <a href="https://havilahandhills.com/NEW/" class="scrollto"><img src="<?php echo get_template_directory_uri(); ?>/img/logo/Havilah&hill.png" width="250px" alt="" title=""></a>
            </div>

            <nav id="nav-menu-container" class="mr-5">

                <?php
                wp_nav_menu(
                array(
                'theme_location' => 'top-menu',
                'menu' => 'main-menu',
                'container' => 'ul',
                'menu_class' => 'nav-menu',
                'walker' =>	new wp_bootstrap_navwalker()
                )
                ); ?>
                
                
                  <li class="aproject" style="padding-left: 400px; padding-top:5px; list-style:none;"><a  style="color: #038BB4;
    background: none;
    padding: 7px 22px;
    border-radius: 7px;
    border: 2px solid #038BB4;
    transition: all ease-in-out 0.3s;
    font-weight: 500;
    margin-left: 8px;
    margin-top: 2px;
    line-height: 1;
    font-size: 13px;
    
    text-decoration:none; 
  cursor:pointer;" 
    
    href="" data-toggle="modal" data-target="#modalLoginForm">Start A Project</a></li>
            </nav><!-- #nav-menu-container -->
        </div>
    </header><!-- End of header -->