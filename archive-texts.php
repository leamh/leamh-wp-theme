<?php
get_header();

$args = array(
  'taxonomy' => 'texts-category',
  'post_type' => 'texts',
  'posts_per_page' => -1,
  'order' => ASC
);

$postTypes = array('poetry','prose');

?>
<article id="page-glossary-index">
  <header>
    <div class="container">
      <h1>Texts</h1>
    </div>
  </header>
  <main>
    <div class="container">
      <div class="row">

<?php foreach ($postTypes as $postType): ?>

<?php
$query = array_merge($args, array('term' => $postType));
$texts = new WP_Query($query);
?>

  <div class="col-sm-6">
  <h3><?php echo ucwords($postType); ?></h3>

<?php if ($texts->have_posts()): ?>
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>Title</th>
      <th>Genre</th>
    </tr>
  </thead>
  <tbody>
  <?php while($texts->have_posts()) : $texts->the_post(); ?>
    <tr>
      <td>
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br>
      </td>
      <td><?php echo get_post_meta(get_the_ID(), 'Genre', true); ?></td>
    </tr>
  <?php endwhile; ?>
  </tbody>
</table>
<?php endif; ?>
</div>
<?php endforeach; ?>
</div>
</div>
</div>
</main>
</article>
<?php get_footer(); ?>

