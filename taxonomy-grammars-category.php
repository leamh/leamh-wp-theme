<?php
get_header();

$grammarEntries = array();

?>
<article id="page-grammar-entry">
<header>
<div class="container">
<ol class="breadcrumb">
  <li><a href="<?php echo get_post_type_archive_link('grammars'); ?>">Grammar</a></li>
  <li class="active"><?php single_term_title(); ?></li>
</ol>
<div class="row">
<div class="col-sm-12">
<h1><?php single_term_title(); ?></h1>
</div>
</div>
</div>
</header>
<main>
<div class="container">
<div class="row">
  <div class="col-sm-8">
  <p><?php echo term_description(); ?></p>
    <h3>Some examples:</h3>
    <ul>
<?php if (have_posts()) : while( have_posts() ) : the_post(); ?>
<li><a href="<?php the_permalink(); ?>" rel="permalink"><?php the_title(); ?></a></li>
<?php endwhile; else: ?>
<li>No posts</li>
<?php endif; ?>
    </ul>
  </div>
  <div class="col-sm-4">
      <h3>Notes</h3>
      <p>Optional Notes</p>
  </div>
</div><!-- row -->
</div>
</div>
</main>
</article>
<?php get_footer(); ?>
