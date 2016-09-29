<?php
get_header();
$sources = array();
$grammar = array();
$glossary = array();
$texts = array();
?>

<article id="page-grammar-entry">
            <header>
                <div class="container">
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
                        <div class="col-sm-3">
                            <h3>Sources</h3>
                            <ul>
<?php if (have_posts()) : while( have_posts() ) : the_post(); ?>
<li><a href="<?php the_permalink(); ?>" rel="permalink"><?php the_title(); ?></a></li>
<?php endwhile; else: ?>
<li>No posts</li>
<?php endif; ?>

                            </ul>
                        </div>
                        <div class="col-sm-3">
                            <h3>Grammar</h3>
                            <ul>
                                <li><a href="grammar-entry.php">Ag</a></li>
                                                            </ul>
                        </div>
                         <div class="col-sm-3">
                           <h3>Glossary Words</h3>
                              <ul>
                                <li><a href="glossary-entry.php">a-bhala	</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-3">
                           <h3>Example Texts</h3>
                              <ul>
                                <li><a href="example-Text.php">An Inaugural Ode</a></li>
                            </ul>
                        </div>
                    </div><!-- row -->

                </div><!-- container -->
            </main>
        </article>
<?php get_footer(); ?>
