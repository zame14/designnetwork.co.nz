<?php
vc_map( array(
    "name"                    => __( "Project Gallery" ),
    "base"                    => "dn_gallery",
    'icon'                    => 'icon-wpb-images-stack',
    "category"                => __( 'Content' ),
    'show_settings_on_create' => false
) );

add_shortcode( 'dn_gallery', 'projectGallery' );
function projectGallery( $atts ) {
    global $post;
    $project = new Project($post->ID);
    $i = 1;
   // print_r($project->getProjectImages());
   //$featureSrc = rk_get_custom_field($post->ID, 'feature-image');
   // $images = rk_get_custom_field($post->ID, 'project-images');
    $html = '
    <div class="gallery">';
    //$html .= '<div class="grid-item"><img src="' . $featureSrc[0] . '" alt="" /></div>';
    foreach($project->getProjectImages() as $images) {
        $html .= '
            <figure class="gallery-item">
                <div class="gallery-icon"><img src="' . wp_make_link_relative($images) . '" alt="" onclick="openModal();currentSlide(' . $i . ')" /><span class="fa fa-search"></span></div>
            </figure>';
        $i++;
    }
    $html .= '
    </div>';

    //Lightbox
    $slides = count($project->getProjectImages());
    $n = 1;
    $m = 1;
    $html .= '
    <div id="projectModal" class="modal">
        <span class="fa fa-times" onclick="closeModal()"></span>
        <input type="hidden" name="viewed" class="viewed" value="" />
        <div class="modal-content">';
            foreach($project->getProjectImages() as $images) {
                $html .= '
                <div class="slides slide' . $m . '">
                    <div class="navtext">' . $project->getTitle() . ' - ' . $m . ' / ' . $slides . '</div>
                    <img src="' . wp_make_link_relative($images) . '" alt="" />
                </div>';
                $m++;
            }
            $html .= '   
            <a class="prev fa fa-angle-left" onclick="plusSlides(-1)"></a>
            <a class="next fa fa-angle-right" onclick="plusSlides(1)"></a>
            <div class="modal-thumbnail-wrapper">';
                foreach($project->getProjectImages() as $images) {
                    $html .= '
                    <div class="modal-thumbnail">
                        <img src="' . wp_make_link_relative($images) . '" alt="" onclick="currentSlide(' . $n . ')" class="preview' . $n . '" />
                    </div>';
                    $n++;
                }
                $html .= '        
            </div>
        </div>
    </div>';

    return $html;
}