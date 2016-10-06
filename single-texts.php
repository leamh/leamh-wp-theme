<?php get_header(); ?>

<?php if (have_posts()) : while(have_posts()) : the_post(); ?>

<?php

$text_metadata = array(
  'Source' => get_post_meta($post->ID, 'Source', 'true'),
  'Team Members' => get_post_meta($post->ID, 'Team Members', 'true'),
);

if ($manuscript = get_post_meta($post->ID, 'Manuscript', 'true')) {
  $text_metadata['Manuscript'] = '<a href="'.$manuscript.'">Manuscript</a>';
}
?>
        <article id="page-translation">
          <header>
              <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <p><?php echo implode(' · ', $text_metadata); ?></p>
                        </div>
                    </div>
                  <ul class="nav nav-tabs" role="tablist">
                      <li role="presentation" class="active"><a href="#tab-narrative" aria-controls="messages" role="tab" data-toggle="tab">Narrative</a></li>
                      <li role="presentation"><a href="#tab-translation" aria-controls="home" role="tab" data-toggle="tab">Translation</a></li>
                  </ul>
                </div>
</header>
<main>
                <div class="container">
                    <div class="row">
                        <!-- Tab panes -->
                        <div class="tab-content">
                          <div role="tabpanel" class="tab-pane active" id="tab-narrative">
                            <div class="col-sm-6">
                              <?php the_content(); ?>
                              <div id="chunk-popover" class="popover right">
                                <a href="#" title="close" class="glyphicon glyphicon-remove" id="popover-close"></a>
                                <h3 class="popover-title chunk-title">Chunk Title Goes Here, the Original Text</h3>
                                <div class="popover-content">
                                  <h5 class="chunk-subheading">Definition</h5>
                                  <p class="chunk-definition">Definition goes here.</p>
                                  <h5 class="chunk-subheading">Form</h5>
                                  <p class="chunk-form">Form goes here.</p>
                                  <h5 class="chunk-subheading">Function</h5>
                                  <p class="chunk-function">Function goes here.</p>
                                </div>
                              </div>
                             </div>
                            <div class="col-sm-6">
                              <aside id="narrative">
                              <h2>Narrative</h2>
                              <?php echo wpautop(get_post_meta( $post->ID, 'Narrative', true )); ?>
                              </aside>
                            </div>
                          </div>
                          <div role="tabpanel" class="tab-pane" id="tab-translation">
                            <div class="col-sm-6">
                              <?php the_content(); ?>
                              <div id="chunk-popover" class="popover right">
                                <a href="#" title="close" class="glyphicon glyphicon-remove" id="popover-close"></a>
                                <h3 class="popover-title chunk-title">Chunk Title Goes Here, the Original Text</h3>
                                <div class="popover-content">
                                  <h5 class="chunk-subheading">Definition</h5>
                                  <p class="chunk-definition">Definition goes here.</p>
                                  <h5 class="chunk-subheading">Form</h5>
                                  <p class="chunk-form">Form goes here.</p>
                                  <h5 class="chunk-subheading">Function</h5>
                                  <p class="chunk-function">Function goes here.</p>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <aside id="translation">
                              <h2>Translation</h2>
                                <?php echo wpautop(get_post_meta( $post->ID, 'Translation', true )); ?>
                              </aside>
                            </div>
                          </div>

                      </div>
                </div>
            </div>
        </main>

        </article>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
