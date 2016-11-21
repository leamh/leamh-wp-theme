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

$letters = range('a', 'z');

foreach ($letters as $letter) {
  echo "<a href='#$letter'>$letter</a> ";
}

?>
</nav>
      </div>
</div>
      <div class="row">
        <div class="col-sm-8">

              <?php if(have_posts()): while(have_posts()): the_post(); ?>
              <li><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></li>
              <?php endwhile; endif; ?>
          </ul>
        </div>
      </div>
    </div>
  </main>
</article>
<?php get_footer(); ?>
