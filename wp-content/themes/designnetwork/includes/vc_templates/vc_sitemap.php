<?php
vc_map( array(
    "name"                    => __( "Sitemap" ),
    "base"                    => "dn_sitemap",
    "category"                => __( 'Content' ),
    'show_settings_on_create' => false
) );

add_shortcode( 'dn_sitemap', 'dnSitemap' );

function dnSitemap() {
    $posts_array = get_posts([
        'post_type' => 'page',
        'post_status' => 'publish',
        'numberposts' => -1,
        'order' => 'asc'
    ]);
    $html = '
    <ul class="sitemap">';
    foreach ($posts_array as $post) {
        if($post->ID <> 13) {
            // dont include site map page
            $page_title = get_the_title($post);
            $html .= '<li><a href="' . get_page_link($post->ID) . '">' . $page_title . '</a></li>';
            if($post->ID == 9) {
                // projects, display each project.
                $html .= '
                <ul>';
                foreach(getProjects() as $project) {
                    $html .= '<li><a href="' . $project->link() . '">' . $project->getTitle() . '</a></li>';
                }
                $html .= '
                </ul>';
            }
        }
    }
    $html .= '</ul>';

    return $html;
}