<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php wp_title(' · ', true, 'right'); ?><?php bloginfo('name'); ?></title>

        <!-- Feeds -->
        <link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom feed" href="<?php bloginfo('atom_url'); ?>">
        <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS feed" href="<?php bloginfo('rss2_url'); ?>">

        <!-- Stylesheets -->
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

        <script src="<?php bloginfo('stylesheet_directory'); ?>/javascripts/vendor/jquery-1.11.3.min.js"></script>
        <script src="<?php bloginfo('stylesheet_directory'); ?>/bootstrap-sass-master/assets/javascripts/bootstrap.min.js"></script>
        <script src="<?php bloginfo('stylesheet_directory'); ?>/javascripts/main.js"></script>

        <?php wp_head(); ?>

    </head>
    <body <?php body_class(); ?>>
    <header role="banner" id="masthead">
      <div class="container">


<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php bloginfo('url'); ?>">
<?php get_template_part('images/inline', 'logo.svg'); ?>
</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="nav-texts"><a href="<?php echo get_post_type_archive_link('texts'); ?>">Texts</a></li>
        <li class="nav-grammars"><a href="<?php echo get_post_type_archive_link('grammars'); ?>">Grammar</a></li>
        <li class="nav-glossary"><a href="<?php echo get_post_type_archive_link('glossary'); ?>">Glossary</a></li>
        <li class="nav-book"><a href="<?php echo get_post_type_archive_link('book'); ?>">Books</a></li>
        <li class="nav-person"><a href="<?php echo get_post_type_archive_link('person'); ?>">People</a></li>
      </ul>
      <?php get_search_form(); ?>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
      </div>
    </header>

