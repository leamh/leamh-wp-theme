<?php get_header(); ?>
<main role="main" id="main">
<div class="container">
<div class="row">
<div class="col-sm-12">
<?php if(have_posts()): while(have_posts()): the_post(); ?>
<article>
<header>
<h1><?php the_title(); ?></h1>
</header>
<?php the_content(); ?>
</article>
<?php endwhile; endif; ?>
</div>
</div>
</div>
</main>
<?php get_footer(); ?>
