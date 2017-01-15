<?php get_header(); ?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>

<article id="page-glossary-entry">
<main>
<div class="container">
<div class="row">
  <div class="col-sm-12">
    <header>
    <h1><?php the_title(); ?></h1>
    </header>
  </div>
</div>
<div class="row">
  <div class="col-sm-8">
    <h4>Definitions (by source)</h4>
    <p><a href="#" class="toggleAll">Show all</a></p>
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<?php $books = get_books_for_post(get_the_id()); ?>
<?php if (!empty($books)) : foreach ($books as $book_key): ?>

<?php $book = get_post($book_key); ?>

<div class="panel panel-default">
  <div class="panel-heading" role="tab" id="heading-<?php echo $book_key; ?>">
    <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo $book_key; ?>" aria-expanded="false" aria-controls="collapse-<?php echo $book_key; ?>"><?php echo $book->post_title; ?></a></h4>
    </div>
    <div id="collapse-<?php echo $book_key; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading">
      <div class="panel-body">
      <div class="definition">
          <?php echo get_post_meta(get_the_ID(), 'book-'.$book_key, true); ?>
      </div>
      <p class="citation"><a href="<?php echo get_permalink($book); ?>"><?php echo $book->post_title; ?>.</a>
      <?php if ($authors = leamh_display_people($book->ID)): ?>
      <span class="authored-by"><?php echo $authors; ?>.</span>
      <?php endif; ?>
      <?php if ($editors = leamh_display_people($book->ID, 'editors')) :?>
      <span class="edited-by">Edited by <?php echo $editors; ?>.</span>
      <?php endif; ?>
      <?php if ($translators = leamh_display_people($book->ID, 'translators')) :?>
      <span class="translated-by">Translated by <?php echo $translators; ?>.</span>
      <?php endif; ?>
      </div>
    </div>
</div>

<?php endforeach; endif; ?>
</div>

</div>
<div class="col-sm-4">
<?php if ($grammar = get_page_by_path(get_the_title(), OBJECT, 'grammars')): ?>
<h5>See Also</h5>
<a href="<?php echo get_permalink($grammar); ?>">Grammar / <?php echo $grammar->post_title; ?></a>
<?php endif; ?>
</div>
</main>
</article>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
