<?php
vc_map( array(
    "name"                    => __( "Main CTA" ),
    "base"                    => "dn_main_cta",
    "category"                => __( 'Content' ),
    'show_settings_on_create' => false
) );

add_shortcode( 'dn_main_cta', 'dnMainCTA' );

function dnMainCTA() {
    $html = '
    <div class="row no-gutters">
        <div class="col-xs-12 col-md-5 cta-col-1">
            <div class="image-wrapper">
                <img src="' . get_stylesheet_directory_uri() . '/images/double-story.jpg" alt="" />
            </div>
            <div class="details-wrapper">
                <div class="title">Are you thinking about building a new home?</div>
                <a href="' . get_page_link(12) . '" class="btn btn-default">Start your journey</a>
            </div>
        </div>
        <div class="hidden-xs col-md-7 cta-col-2">
            <div class="row no-gutters">
                <div class="col-md-4 img-wrapper">
                    <img src="' . get_stylesheet_directory_uri() . '/images/cta-1.jpg" alt="" />
                </div>
                <div class="col-md-4 img-wrapper">
                    <img src="' . get_stylesheet_directory_uri() . '/images/cta-2.jpg" alt="" />
                </div>   
                <div class="col-md-4 img-wrapper">
                    <img src="' . get_stylesheet_directory_uri() . '/images/cta-3.jpg" alt="" />
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-md-12 bottom-img-wrapper">
                    <img src="' . get_stylesheet_directory_uri() . '/images/cta-4.jpg" alt="" />
                </div>
                <div class="col-md-12 bottom-slogan-wrapper">
                    <div class="slogan-1">&lsquo;Your Partner in Successful Development&rsquo;</div>
                    <div class="slogan-2">NEW-development - NEW-design - NEW-trends - NEW-concepts</div>
                </div>
            </div>
        </div>
    </div>';

    return $html;
}