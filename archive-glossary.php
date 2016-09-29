<?php get_header(); ?>
<article id="page-glossary-index">
  <header>
    <div class="container">
      <h1>Glossary</h1>
    </div>
  </header>
  <main>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <nav>
          <?php

$letters = range('A', 'Z');

foreach ($letters as $letter) {
  echo "<a href='#$letter'>$letter</a> ";
}
?>
</nav>
      </div>
</div>
      <div class="row">
        <div class="col-sm-8">
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Word</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>
              <?php if(have_posts()): while(have_posts()): the_post(); ?>
              <tr>
                <td><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></td>
                <td><?php the_excerpt(); ?></td>
              </tr>
              <?php endwhile; endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>
</article>
<?php get_footer(); ?>
