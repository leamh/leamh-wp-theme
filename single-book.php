<?php get_header(); ?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>
<article id="page-grammar-entry">
<header>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
            <h1><?php the_title(); ?></h1>
<?php $authors = leamh_display_people($post->ID); ?>
<?php if (!empty($authors)):?>
  <p>By <?php echo $authors; ?>.</p>
<?php endif; ?>

<?php
$citation = get_post_meta($post->ID, 'Citation', true);
$editors = leamh_display_people($post->ID, 'editors');
$translators = leamh_display_people($post->ID, 'translators');
?>
<p>
<?php if($editors): ?>
  Edited by <?php echo $editors; ?>.
<?php endif; ?>
<?php if($translators): ?>
  Translated by <?php echo $translators; ?>.
<?php endif; ?>
<?php echo $citation; ?>
</p>
<?php if ($offical_site = get_post_meta( $post->ID, 'Official Site', true )): ?>
            <a href="<?php echo $offical_site; ?>" class="btn btn-default">Official Site</a>
            <?php endif; ?>

            <?php if ($purchase = get_post_meta( $post->ID, 'Purchase', true )): ?>
            <a href="<?php echo $purchase; ?>" class="btn btn-default">Purchase</a>
            <?php endif; ?>
            </p>
            <?php if ($isbn = get_post_meta( $post->ID, 'ISBN', true )): ?>
            <p class="muted">ISBN: <?php echo $isbn; ?></a>
            <?php endif; ?>

              </div>
        </div>
    </div>
</header>
<main>
                <div class="container">
                <h2>Source For</h2>
                    <div class="row">

                        <div class="col-sm-3">
                            <h3>Grammar</h3>
                            <ul>
                              <li><a href="#">Grammar Post</a></li>
                            </ul>
                        </div>
                         <div class="col-sm-3">
                           <h3>Glossary</h3>
                              <ul>
                              <li><a href="#">Glossary Post</a></li>
                              </ul>
                        </div>
                    </div><!-- row -->

                </div><!-- container -->
            </main>
        </article>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
