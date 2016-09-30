<?php get_header(); ?>
<?php

$breadcrumb = array();
if ($terms = wp_get_post_terms($post->ID, 'grammars-category')) {
  foreach ($terms as $term) {
    $breadcrumb[] = '<a href="' . get_term_link($term) . '">'
                  . $term->name
                  . '</a>';
  }
}

?>
<?php if (have_posts()): while(have_posts()): the_post(); ?>
<article id="page-grammar-entry">
<header>
<div class="container">
			<ol class="breadcrumb">
				<li><a href="<?php echo get_post_type_archive_link('grammars'); ?>">Grammar</a></li>
        <li><a href="#"><?php echo implode($breadcrumb, ' · '); ?></a></li>
        <li class="active"><?php the_title(); ?></li>
			</ol>
    <div class="row">
        <div class="col-sm-12">
            <h1><?php the_title(); ?></h1>
        </div>
    </div>
</div>
</header>
<main>
<div class="container">
    <div class="row">
      <div class="col-sm-6">
      <?php the_content(); ?>
      </div>
      <div class="col-sm-6">
<h4>Sources</h4>
<p><a href="#" class="toggleAll">All</a></p>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<?php $books = get_books_for_post(get_the_ID()); ?>
<?php if (!empty($books)) : foreach ($books as $book_key): ?>

<?php $book = get_post($book_key); ?>

<div class="panel panel-default">
  <div class="panel-heading" role="tab" id="heading-<?php echo $book_key; ?>">
    <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo $book_key; ?>" aria-expanded="false" aria-controls="collapse-<?php echo $book_key; ?>"><?php echo $book->post_title; ?></a></h4>
    </div>
    <div id="collapse-<?php echo $book_key; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading">
      <div class="panel-body">
      <h3><a href="<?php echo get_permalink($book); ?>"><?php echo $book->post_title; ?></a></h3>
      <?php if ($authors = leamh_display_people($book->ID)): ?>
      <p>By <?php echo $authors; ?></p>
      <?php endif; ?>
      <?php if ($editors = leamh_display_people($book->ID, 'editors')) :?>
      <p>Edited by <?php echo $editors; ?></p>
      <?php endif; ?>
      <?php if ($translators = leamh_display_people($book->ID, 'translators')) :?>
      <p>Translated by <?php echo $translators; ?></p>
      <?php endif; ?>
      <?php echo get_post_meta(get_the_ID(), 'book-'.$book_key, true); ?>
      </div>
    </div>
</div>

<?php endforeach; endif; ?>
</div>
      </div>
    </div>
</div>
</main>
</article>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
