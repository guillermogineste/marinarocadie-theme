<?php
/*
*  Author: Todd Motto | @toddmotto
*  URL: html5blank.com | @html5blank
*  Custom functions, support, custom post types and more.
*/

/*------------------------------------*\
External Modules/Files
\*------------------------------------*/

/*------------------------------------*\
Functions
\*------------------------------------*/

// Main navigation

function header_nav(){
  // CATEGORIES + POSTS
  global $post;
  // Get an array of all categories
  $categories = get_categories(array(
    'orderby'   => 'description',
    'parent'    => 0,
  ) );
  // Loop each category and display the name + list of posts
  foreach ( $categories as $category ) {
    // Print the category title
    // If current category = this post category add class active
    if (has_category($category->term_id,$post->ID)){
      printf('<li class="main-navigation__item main-navigation__item--%1$s current">%2$s</li>',$category->slug, esc_html( $category->name ));
    } else {
      printf('<li class="main-navigation__item main-navigation__item--%1$s">%2$s</li>',$category->slug, esc_html( $category->name ));
    }
    // Category ID
    $category_ID = $category->term_id;
    // echo $category_ID;

    // Get posts for this category
    $args = [
      'post_type' => 'projects',
      'tax_query' => [
        [
          'taxonomy' => 'category',
          'terms' => $category_ID,
          'include_children' => true,
        ],
      ],
      'offset' => 0,
      'posts_per_page' => 14,
    ];
    $posts = get_posts($args);

    if ($posts) {
      printf('<ul class="submenu submenu--%1$s">', $category->slug);
      printf('<li class="submenu__item submenu__item--title submenu__item--%1$s">%2$s</li>',$category->slug , esc_html( $category->name ));
      foreach ($posts as $single_post) {
        // get current post ID
        global $post;
        if ($single_post->ID == $post->ID) {
          printf('<li class="submenu__item active">');
          printf($single_post->post_title);
        } else {
          printf('<li class="submenu__item">');
          printf('<a href="%1$s">%2$s</a>', get_permalink($single_post->ID), $single_post->post_title);
        }
        echo '</li>';
      }
      echo '</ul>';
    }
  }

  // PAGES
  // Get home page ID
  $homepage = get_option('page_on_front');
  // List all pages excluding the home page
  $page = wp_list_pages(array(
    'title_li' => '' ,
    'exclude' => $homepage,
  ));

}

// Remove Admin bar
function remove_admin_bar()
{
  return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
  return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// ADD "BEM" CLASSES TO COMMON CONTENT TAGS
function add_classes($content){

  $find = array(
    '/<pre([^>]+)?>/',
    '/<p([^>]+)?>/',
    '/<strong([^>]+)?>/',
    '/<em([^>]+)?>/',
    '/<h1([^>]+)?>/',
    '/<h2([^>]+)?>/',
    '/<h3([^>]+)?>/',
    '/<h4([^>]+)?>/',
    '/<h5([^>]+)?>/',
    '/<h6([^>]+)?>/',
    '/<blockquote([^>]+)?>/',
    '/<hr([^>]+)?>/');
  $replace = array(
    '<pre$1 class="preformated">',
    '<p$1 class="paragraph">',
    '<strong$1 class="bold">',
    '<em$1 class="italic">',
    '<h1$1 class="heading heading--one">',
    '<h2$1 class="heading heading--two">',
    '<h3$1 class="heading heading--three">',
    '<h4$1 class="heading heading--four">',
    '<h5$1 class="heading heading--five">',
    '<h6$1 class="heading heading--six">',
    '<blockquote$1 class="blockquote">',
    '<hr$1 class="horizontal-line">');

  $contentWithClasses = preg_replace($find, $replace, $content);

  return $contentWithClasses;
}
add_filter('the_content', 'add_classes');
