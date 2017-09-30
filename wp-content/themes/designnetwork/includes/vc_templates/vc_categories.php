<?php
vc_map( array(
    "name"                    => __( "Project Categories" ),
    "base"                    => "dn_project_categories",
    "category"                => __( 'Content' ),
    'show_settings_on_create' => false
) );

add_shortcode( 'dn_project_categories', 'dnProjectCategories' );

function dnProjectCategories() {
    $id = get_the_ID();
    //check if we are viewing a project category
    $in_category = dn_is_category($id);
    $type = 'project-category';
    $img_src = 'category-image';
    $categories = dn_get_post_type($type);
    $criteria = $categories->have_posts();
    if($in_category > 0) {
        // viewing a project category so get the projects associate with this category.
        $type = 'project';
        $img_src = 'project-image';
        $categories = dn_get_post_type($type);
        $categoryid = dn_get_custom_field($categories->post->ID, 'belongs_project-category_id', '_wpcf_');
        $criteria = ($categories->have_posts() && $categoryid == $id);
    }
    $html = '
    <div class="row">';
    if($criteria) {
        while ($categories->have_posts()) {
            $categories->the_post();
            $img = dn_get_custom_field($categories->post->ID, $img_src);
            $guid = $img;
            $image_id = dn_get_image_id($guid);
            $img_url = wp_get_attachment_image($image_id, 'project-image-size');
            $title = get_the_title();
            $html .= '
            <div class="col-xs-12 col-sm-4">
                <div class="category-wrapper">
                    <a href="' . esc_url( get_permalink() ) . '">
                        <div class="image-wrapper">
                            ' . $img_url . '
                        </div>    
                        <div class="title">' . $title . '</div>                        
                    </a>
                </div>
            </div>';
        }
    }
    $html .= '</div>';
    return $html;
}