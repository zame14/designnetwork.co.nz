<?php
vc_map( array(
    "name"                    => __( "Other Projects" ),
    "base"                    => "dn_other_projects",
    "category"                => __( 'Content' ),
    'show_settings_on_create' => false
) );

add_shortcode( 'dn_other_projects', 'dnOtherProjects' );

function dnOtherProjects() {
    global $post;
    $html = '
    <div class="row vc_row-o-equal-height vc_row-flex">';
    foreach(getProjects() as $project) {
        if($project->id() <> $post->ID) {
            $imageid = getImageID($project->getFeatureImage());
            $img = wp_get_attachment_image_src($imageid, 'feature');
            $html .= '
            <div class="col-xs-12 col-sm-12 col-md-3 other-projects">
                <a href="' . $project->link() . '">
                    <div class="inner-wrapper">
                        <div class="image-wrapper">
                            <img src="' . $img[0] . '" alt="' . $project->getTitle() . '" />
                        </div>
                        <div class="title-wrapper">
                            <h3>' . $project->getTitle() . '</h3>
                        </div>                  
                    </div>
                </a>
            </div>';
        }

    }
    $html .= '
    </div>';

    return $html;
}