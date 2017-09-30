<?php
vc_map( array(
    "name"                    => __( "Projects" ),
    "base"                    => "dn_projects",
    "category"                => __( 'Content' ),
    'show_settings_on_create' => false
) );

add_shortcode( 'dn_projects', 'dnProjects' );

function dnProjects() {
    $html = '
    <div class="row vc_row-o-equal-height vc_row-flex project-list">';
        foreach(getProjects() as $project) {

            $html .= '
            <div class="col-xs-12 col-sm-6 project">
                <a href="' . $project->link() . '">
                    <div class="inner-wrapper">
                        <div class="image-wrapper">
                            <img src="' . $project->getFeatureImage() . '" alt="' . $project->getTitle() . '" />
                        </div>
                        <div class="title-wrapper">
                            <h3>' . $project->getTitle() . '</h3>
                        </div> 
                        <div class="slogan"><p>' . $project->getSlogan() . '</p><span>View our ' . $project->getTitle() . ' projects</span></div>                   
                    </div>
                </a>
            </div>';
        }
    $html .= '
    </div>';

    return $html;
}