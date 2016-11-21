<?php get_header(); ?>
<article id="page-homepage">
  <header>
    <div class="container">
      <div class="well">
<?php get_template_part('images/inline', 'logo.svg'); ?>

        <p class="tagline">Learn Early Modern Irish</p>
      </div>
    </div>
  </header>
  <main>
    <div class="container">
      <div class="row">

        <div class="col-sm-3">
        <h1><span class="glyphicon glyphicon-align-left"></span></h1>
        <p>Annotated <a href="<?php echo get_post_type_archive_link( 'texts' ); ?>">example texts</a> of Early Modern Irish poetry and prose.</p>
        </div>
        <div class="col-sm-3">
        <h1><span class="glyphicon glyphicon-book"></span></h1>
        <p>A <a href="<?php echo get_post_type_archive_link( 'glossary' ); ?>">glossary</a> of words compiled from printed editions and manuscripts.</p>
        </div>
        <div class="col-sm-3">
        <h1><span class="glyphicon glyphicon-check"></span></h1>
        <p><a href="<?php echo get_post_type_archive_link( 'grammars' ); ?>">Grammar</a> detailing how the language works.</p>
        </div>
      </div>
    </div>
  </main>
</article>
<?php get_footer(); ?>

