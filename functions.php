<?php

/**
 * Custom Post Types
 */
function leamh_register_post_types() {

    $defaults = array(
        'public' => true,
        'supports' => array( 'title', 'editor', 'page-attributes', 'custom-fields','excerpt' ),
        'menu_position' => 20,
        'hierarchical' => false,
        'has_archive' => true,
        'show_in_nav_menus' => true
    );

    $post_types = array(
        'texts' => array(
            'labels' => array(
                'name' => __( 'Texts' ),
                'singular_name' => __( 'Text' )
              ),
            'rewrite' => array('slug' => 'texts')
        ),
        'grammars' => array(
            'labels' => array(
                'name' => __( 'Grammar' ),
                'singular_name' => __( 'Grammar Entry' )
              ),
            'rewrite' => array('slug' => 'grammar')
        ),
        'glossary' => array(
            'labels' => array(
                'name' => __( 'Glossary' ),
                'singular_name' => __( 'Glossary Entry' )
              ),
            'rewrite' => array('slug' => 'glossary')
        ),
        'book' => array(
            'labels' => array(
                'name' => __('Books'),
                'singular_name' => __('Book')
            ),
            'rewrite' => array('slug' => 'books')
        ),
        'person' => array(
            'labels' => array(
                'name' => __('People'),
                'singular_name' => __('Person')
            ),
            'rewrite' => array('slug' => 'person')
        ),

    );


    foreach ($post_types as $name => $args) {
        $args = array_merge($args, $defaults);
        register_post_type($name, $args);
    }

}

add_action( 'init', 'leamh_register_post_types' );

/**
 * Create taxonomies.
 */
function leamh_create_post_taxonomies() {

    $taxonomies = array(
        'texts' => array(
            'name' => _x( 'Texts Categories', 'taxonomy general name' ),
            'singular_name' => _x( 'Texts Category', 'taxonomy singular name' ),
            'search_items' =>  __( 'Search Texts Categories' ),
            'all_items' => __( 'All Texts Categories' ),
            'parent_item' => __( 'Parent Texts Category' ),
            'parent_item_colon' => __( 'Parent Texts Category:' ),
            'edit_item' => __( 'Edit Texts Category' ),
            'update_item' => __( 'Update Texts Category' ),
            'add_new_item' => __( 'Add New Texts Category' ),
            'new_item_name' => __( 'New Texts Category Name' ),
            'menu_name' => __( 'Texts Categories' ),
        ),
        'grammars' => array(
            'name' => _x( 'Grammars Categories', 'taxonomy general name' ),
            'singular_name' => _x( 'Grammars Category', 'taxonomy singular name' ),
            'search_items' =>  __( 'Search Grammars Categories' ),
            'all_items' => __( 'All Grammars Categories' ),
            'parent_item' => __( 'Parent Grammars Category' ),
            'parent_item_colon' => __( 'Parent Grammars Category:' ),
            'edit_item' => __( 'Edit Grammars Category' ),
            'update_item' => __( 'Update Grammars Category' ),
            'add_new_item' => __( 'Add New Grammars Category' ),
            'new_item_name' => __( 'New Grammars Category Name' ),
            'menu_name' => __( 'Grammars Categories' ),
          )
    );

    foreach($taxonomies as $name => $labels) {
        register_taxonomy($name.'-category',array($name), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => $name.'-category' ),
        ));
    }

        $author_labels = array(
            'name' => _x( 'Authors', 'taxonomy general name' ),
            'singular_name' => _x( 'Author', 'taxonomy singular name' ),
            'search_items' =>  __( 'Search Authors' ),
            'all_items' => __( 'All Authors' ),
            'parent_item' => __( 'Parent Authors ' ),
            'parent_item_colon' => __( 'Parent Authors Category:' ),
            'edit_item' => __( 'Edit Author' ),
            'update_item' => __( 'Update Author' ),
            'add_new_item' => __( 'Add New Author' ),
            'new_item_name' => __( 'New Author' ),
            'menu_name' => __( 'Book Authors' )
          );

          $editor_labels = array(
            'name' => _x( 'Editors', 'taxonomy general name' ),
            'singular_name' => _x( 'Editor', 'taxonomy singular name' ),
            'search_items' =>  __( 'Search Editors' ),
            'all_items' => __( 'All Editors' ),
            'parent_item' => __( 'Parent Editors ' ),
            'parent_item_colon' => __( 'Parent Editors Category:' ),
            'edit_item' => __( 'Edit Editor' ),
            'update_item' => __( 'Update Editor' ),
            'add_new_item' => __( 'Add New Editor' ),
            'new_item_name' => __( 'New Editor' ),
            'menu_name' => __( 'Book Editor' )
          );

          $translators_labels = array(
            'name' => _x( 'Translators', 'taxonomy general name' ),
            'singular_name' => _x( 'Translator', 'taxonomy singular name' ),
            'search_items' =>  __( 'Search Translator' ),
            'all_items' => __( 'All Translators' ),
            'parent_item' => __( 'Parent Translators ' ),
            'parent_item_colon' => __( 'Parent Translators Category:' ),
            'edit_item' => __( 'Edit Translator' ),
            'update_item' => __( 'Update Translator' ),
            'add_new_item' => __( 'Add New Translator' ),
            'new_item_name' => __( 'New Translator' ),
            'menu_name' => __( 'Book Translator' )
          );


    register_taxonomy(
      'authors',
      'book',
      array(
        'hierarchical' => true,
        'labels' => $author_labels,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'author')
      )
    );

    register_taxonomy(
      'editors',
      'book',
      array(
        'hierarchical' => true,
        'labels' => $editor_labels,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'editor')
      )
    );

    register_taxonomy(
      'translators',
      'book',
      array(
        'hierarchical' => true,
        'labels' => $translator_labels,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'translator')
      )
    );

}

add_action( 'init', 'leamh_create_post_taxonomies', 0 );

/**
 * Updates the query on custom post types.
 *
 * 1. Sets the posts_per_page to -1 to get all posts.
 * 2. Orders alphabetically by family name.
 * 3. Checks query variable for people-category value.
 */
function leamh_pre_get_posts( $query ) {

    if ( is_admin() || ! $query->is_main_query() )
        return;

    if ( is_post_type_archive( array( 'texts', 'grammars', 'glossary', 'people' ) ) ) {
        $query->set( 'posts_per_page', -1 );
        $query->set( 'orderby', 'title');
        $query->set('order', 'ASC');
    }

}

add_action( 'pre_get_posts', 'leamh_pre_get_posts', 1 );
add_action( 'admin_menu', 'leamh_custom_meta_boxes' );
add_action( 'save_post', 'leamh_save_texts_meta_box', 10, 2 );
add_action( 'save_post', 'leamh_save_book_meta_box', 10, 2 );
add_action( 'save_post', 'leamh_save_grammar_meta_box', 10, 2 );
add_action( 'save_post', 'leamh_save_glossary_meta_box', 10, 2 );

function leamh_custom_meta_boxes() {
    add_meta_box( 'leamh-texts-meta-box', 'Additional Texts Fields', 'leamh_texts_meta_box_html', 'texts', 'normal', 'high' );
    add_meta_box( 'leamh-book-meta-box', 'Additional Book Fields', 'leamh_book_meta_box_html', 'book', 'normal', 'high' );
  	add_meta_box( 'leamh-grammar-meta-box', 'Books', 'leamh_grammar_meta_box_html', 'grammars', 'normal', 'high' );
  	add_meta_box( 'leamh-glossary-meta-box', 'Books', 'leamh_glossary_meta_box_html', 'glossary', 'normal', 'high' );
}

function leamh_texts_meta_box_html( $object, $box ) { ?>
  <p>
    <label for="source">Source</label>
    <br>
    <input type="text" name="source" value="<?php echo get_post_meta( $object->ID, 'Source', true); ?>">
  </p>
  <p>
    <label for="era">Era</label>
    <br>
    <input type="text" name="era" value="<?php echo get_post_meta( $object->ID, 'Era', true); ?>">
  </p>
	<p>
		<label for="narrative">Narrative</label>
		<br />

<?php

    wp_editor( htmlspecialchars_decode(get_post_meta( $object->ID, 'Narrative', true )), 'narrative', $settings = array('textarea_name'=>'narrative') );

?>
<br>
<label for="narrative">Translation</label>
		<br />
<?php

    wp_editor( htmlspecialchars_decode(get_post_meta( $object->ID, 'Translation', true )), 'translation', $settings = array('textarea_name'=>'translation') );

?>

		<input type="hidden" name="leamh_texts_meta_box_nonce" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
	</p>
<?php }

function leamh_book_meta_box_html( $object, $box ) {
  $people = get_posts(array('numberposts' => 0, 'post_type' => 'person'));

?>

<?php if (!empty($people)): ?>
  <p>
    <label for="authors">Authors</label>
    <br>
    <?php echo leamh_people_select('authors'); ?>
  </p>

  <p>
    <label for="editors">Editors</label>
    <br>
    <?php echo leamh_people_select('editors'); ?>

  </p>

  <p>
    <label for="translators">Translators</label>
    <br>
    <?php echo leamh_people_select('translators'); ?>
  </p>

<?php endif; ?>
  <p>
    <label for="citation">Citation</label>
    <br>
    <input type="text" name="citation" value="<?php echo get_post_meta( $object->ID, 'Citation', true); ?>">
  </p>

  <p>
    <label for="officialsite">Offical Site</label>
    <br>
    <input type="text" name="officialsite" value="<?php echo get_post_meta( $object->ID, 'Official Site', true); ?>">
  </p>
  <p>
    <label for="purchase">Purchase</label>
    <br>
    <input type="text" name="purchase" value="<?php echo get_post_meta( $object->ID, 'Purchase', true); ?>">
  </p>

  <p>
    <label for="isbn">ISBN</label>
    <br>
    <input type="text" name="isbn" value="<?php echo get_post_meta( $object->ID, 'ISBN', true); ?>">
  </p>
		<input type="hidden" name="leamh_book_meta_box_nonce" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
	</p>
<?php }

function leamh_grammar_meta_box_html( $object, $box ) { ?>
<div id="postcustomstuff">
    <table id="newmeta">
      <thead>
        <th class="left">
            <label for="leamh_book">Book</label>
        </th>
        <th>
            <label for="leamh_book_text">Grammar Entry</label>
        </th>
      </thead>
      <tbody>
        <tr>
            <td id="newmetaleft" class="left"><?php echo leamh_posts_select(); ?></td>
            <td><textarea name="leamh_book_text" rows="20"></textarea></td>
        </tr>
      </tbody>
    </table>
		<input type="hidden" name="leamh_grammar_meta_box_nonce" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
</div>
<?php }

function leamh_glossary_meta_box_html( $object, $box ) { ?>
<div id="postcustomstuff">
    <table id="newmeta">
      <thead>
        <th class="left">
            <label for="leamh_book">Book</label>
        </th>
        <th>
            <label for="leamh_book_text">Glossary Entry</label>
        </th>
      </thead>
      <tbody>
        <tr>
            <td id="newmetaleft" class="left"><?php echo leamh_posts_select(); ?></td>
            <td><textarea name="leamh_book_text" rows="20"></textarea></td>
        </tr>
      </tbody>
    </table>

		<input type="hidden" name="leamh_glossary_meta_box_nonce" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
</div>
<?php }

function leamh_save_texts_meta_box( $post_id, $post ) {
    if ( !wp_verify_nonce( $_POST['leamh_texts_meta_box_nonce'], plugin_basename( __FILE__ ) ) )
		    return $post_id;

    $fields = array('Source', 'Era', 'Narrative', 'Translation');
    leamh_save_custom_metadata( $fields, $post_id );
}

function leamh_save_book_meta_box( $post_id, $post ) {
    if ( !wp_verify_nonce( $_POST['leamh_book_meta_box_nonce'], plugin_basename( __FILE__ ) ) )
		    return $post_id;

    $peoplefields = array('authors', 'editors', 'translators');

    foreach ($peoplefields as $field) {
      $data = maybe_serialize($_POST[$field]);
      update_post_meta($post_id, ucwords($field), $data);
    }

    $textfields = array('Citation', 'ISBN', 'Official Site', 'Purchase');
    leamh_save_custom_metadata( $textfields, $post_id );

}

function leamh_save_grammar_meta_box( $post_id, $post ) {
    if ( !wp_verify_nonce( $_POST['leamh_grammar_meta_box_nonce'], plugin_basename( __FILE__ ) ) )
		    return $post_id;

    $leamh_grammar_entry = array(
      'book_id' => $_POST['leamh_book'],
      'book_text' => $_POST['leamh_book_text']
    );

    update_post_meta($post_id, 'book-'.$leamh_grammar_entry['book_id'], $leamh_grammar_entry['book_text']);

}

function leamh_save_glossary_meta_box( $post_id, $post ) {
    if ( !wp_verify_nonce( $_POST['leamh_glossary_meta_box_nonce'], plugin_basename( __FILE__ ) ) )
		    return $post_id;

    $leamh_glossary_entry = array(
      'book_id' => $_POST['leamh_book'],
      'book_text' => $_POST['leamh_book_text']
    );

    update_post_meta($post_id, 'book-'.$leamh_glossary_entry['book_id'], $leamh_glossary_entry['book_text']);

}

/**
 * Helper function to save custom post metadata for an array of fields.
 */
function leamh_save_custom_metadata( $fields = array(), $post_id ) {
    if (!empty($fields)) {

        foreach($fields as $field) {
          $meta_value = get_post_meta( $post_id, $field, true );
          $new_meta_value = stripslashes( $_POST[strtolower(str_replace(" ", "",$field))] );

          if ( $new_meta_value && '' == $meta_value )
              add_post_meta( $post_id, $field, $new_meta_value, true );

          elseif ( $new_meta_value != $meta_value )
              update_post_meta( $post_id, $field, $new_meta_value );

          elseif ( '' == $new_meta_value && $meta_value )
              delete_post_meta( $post_id, $field, $meta_value );
        }

    }
}

function leamh_posts_select($post_type = 'book') {

    $html = '';

    $posts = get_posts(array('post_type' => $post_type, 'numberposts' => 0));

    if ($posts) {
        $html = '<select name="leamh_book">'
              . '<option>Select a Book</option>';

        foreach ($posts as $post) {
            $html .= '<option value="'.$post->ID.'">'.$post->post_title.'</option>';
        }

        $html .= '</select>';
    }

    return $html;

}

function leamh_people_select($field) {

    global $post;
    $html = '';
    $people = get_posts(array('post_type' => 'person', 'numberposts' => 0));
    if ($people) {
      $data = get_post_meta( $post->ID, ucwords($field), true );
      $data = maybe_unserialize($data);
      $html .= '<select multiple="multiple" name="'.$field.'[]" class="select-multiple" size="5">';
      foreach ($people as $person) {
          $attributes = array(
            'value' => $person->ID
          );

          $attributes['selected'] = 'selected';

        $html .= '<option ';
        if ((!empty($data)) && (in_array($person->ID, $data))) {
          $html .= 'selected="selected" ';
        }
        $html .= 'value="'.$person->ID.'" >'.$person->post_title.'</option>';
      }
      $html .= '</select>';

    }
  return $html;
}

function comma_and($array) {
  $html = '';

  if (!empty($array)) {
    $last  = array_slice($array, -1);
    $first = join(', ', array_slice($array, 0, -1));
    $both  = array_filter(array_merge(array($first), $last), 'strlen');

    if (count($array) > 2) {
      $and = ', and ';
    } elseif (count($array) > 1) {
      $and = ' and ';
    } else {
      $and = '';
    }
    $html = join($and, $both);

  }
  return $html;
}


function leamh_display_people($post_id, $type = 'authors') {
  $person_ids = maybe_unserialize(get_post_meta($post_id, ucwords($type), true));
  $html = '';
  $links = array();
  if (!empty($person_ids)) {
    foreach ($person_ids as $id) {
      $links[] = '<a href="' . get_permalink($id) . '">'
                    . get_the_title($id)
                    . '</a>';
    }
  }
  $html = comma_and($links);

  return $html;

}

function get_books_for_post($post_id) {
    $ids = array();

    $custom_keys = get_post_custom_keys($post_id);

    foreach ($custom_keys as $value) {
        if (strpos($value, 'book-') !== false) {
          $ids[] = explode('-', $value)[1];
        }
    }

    return $ids;
}

function get_term_entries_by_book($book_id, $term_type) {
    $args = array(
        'numberposts' => 0,
        'post_type' => $term_type,
        'meta_query' => array(
            array(
              'key' => 'book-'.$book_id,
              'compare' => 'EXISTS'
            )
        )
      );
    return get_posts( $args );
}

