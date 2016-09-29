<?php
get_header();

$args = array(
  'hide_empty' => 0
);
$mainCategories = array('parts-of-speech', 'pronounciation', 'other');

?>

<article id="page-grammar-entry">
  <header>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h1>Grammar</h1>
        </div>
      </div>
    </div>
  </header>
  <main>
    <div class="container">
      <div class="row">

<?php foreach ($mainCategories as $category): ?>

<?php
$parent = get_term_by('slug', $category, 'grammars-category');
$query = array_merge($args, array('child_of' => (int) $parent->term_id));
$terms = get_terms('grammars-category', $query);
?>
<div class="col-sm-4">
<h3><?php echo $parent->name; ?></h3>

<ul>
  <?php foreach($terms as $term): ?>
  <li>
    <a href="<?php echo esc_url( get_term_link( $term ) ); ?>">
    <?php echo $term->name; ?>
    </a>
  </li>
  <?php endforeach; ?>
</ul>

</div>

<?php endforeach; ?>
</div>
</div>
</div>
</main>
</article>
<?php get_footer(); ?>
