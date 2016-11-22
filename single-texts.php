<?php get_header(); ?>

<?php if (have_posts()) : while(have_posts()) : the_post(); ?>

<?php

$text_metadata = array();

if ($source = get_post_meta($post->ID, 'Source', true)) {
  $text_metadata['source'] = '<li><b>Source</b>: <a href="'.get_permalink($source).'">'.get_the_title($source).'</a></li>';
}

if ($team = get_post_meta($post->ID, 'Team Members', true)) {
  $text_metadata['team'] = '<li><b>Léamh team</b>: '.$team.'</li>';
}

if ($excerpt = $post->post_excerpt) {
  $text_metadata['excerpt'] = '<li><b>Description</b>: '.$excerpt.'</li>';
}

if ($manuscript = get_post_meta($post->ID, 'Manuscript', true)) {
  $text_metadata['manuscript'] = '<li><b>Manuscript</b>: <a href="'.$manuscript.'">Manuscript</a></li>';
}
?>
        <article id="page-translation">
          <header>
              <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
            <h1><?php the_title(); ?></h1>
            <?php if ($authors = leamh_display_people($post->ID, 'authors')): ?><p>By <?php echo $authors; ?></p><?php endif; ?>
            <ul><?php echo implode('', $text_metadata); ?></ul>
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
