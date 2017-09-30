<?php
vc_map( array(
    "name"                    => __( "Project Breadcrumb" ),
    "base"                    => "dn_project_breadcrumb",
    "category"                => __( 'Content' ),
    'show_settings_on_create' => false
) );

add_shortcode( 'dn_project_breadcrumb', 'dnProjectBreadcrumb' );

function dnProjectBreadcrumb()
{
    $id = get_the_ID();
    $project = new Project($id);
    $html = '
    <div class="breadcrumb">
        <ul>
            <li><a href="' . get_page_link(4) . '">Home</a></li>
            <li><a href="' . get_page_link(9) . '">Projects</a></li>
            <li>' . $project->getTitle() . '</li>
        </ul>
    </div>';

    return $html;
}