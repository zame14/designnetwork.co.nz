<?php
vc_map( array(
    "name"                    => __( "Projects" ),
    "base"                    => "dn_projects",
    "category"                => __( 'Content' ),
    'show_settings_on_create' => false
) );

add_shortcode( 'dn_projects', 'dnProjects' );

function dnProjects() {
    $i = 1;
    $class = 'col-md-6';
    $html = '
    <div class="row vc_row-o-equal-height vc_row-flex project-list">';
        foreach(getProjects() as $project) {
            $imageid = getImageID($project->getFeatureImage());
            $img = wp_get_attachment_image_src($imageid, 'feature');
            if($i > 2) $class = 'col-md-4';
            $html .= '
            <div class="col-xs-12 col-sm-12 ' . $class . ' project">
                <a href="' . $project->link() . '">
                    <div class="inner-wrapper">
                        <div class="image-wrapper">
                            <img src="' . $img[0] . '" alt="' . $project->getTitle() . '" />
                        </div>
                        <div class="title-wrapper">
                            <h3>' . $project->getTitle() . '</h3>
                        </div> 
                        <div class="slogan"><p>' . $project->getSlogan() . '</p><span>View our ' . $project->getTitle() . ' projects</span></div>                   
                    </div>
                </a>
            </div>';
            $i++;
        }
    $html .= '
    </div>';

    return $html;
}