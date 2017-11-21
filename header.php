<!DOCTYPE html>
<html <?php language_attributes();?>>

<head>
 <meta charset="<?php bloginfo('charset'); ?>">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>
  <?php wp_title(' | ', true, 'right'); ?>
 </title>

 <link rel="shortcut icon" href="<?php echo get_template_directory_uri() . '/img/favicon.ico'?>">

 <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
 <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
 <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

 <?php wp_head(); ?>



</head>

<body <?php body_class(); ?>>

 <div id="wrapper">

  <header class="main-header">
   <nav id='cssmenu' class="container">
    <div class="logo">
     <a href="<?php echo get_option('siteurl'); ?>">
      <?php
      $custom_logo_id = get_theme_mod( 'custom_logo' );
      $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );

      if(has_custom_logo()):
      echo '<img src="'. esc_url( $logo[0] ) .'">'; else:  echo '<h1>'.get_option('blogname').'</h1>'; endif;

      ?>

     </a>
    </div>
    <div id="head-mobile"></div>
    <div class="button"></div>

    <?php echo minimalist_navigation(); ?>


   </nav>
  </header>
