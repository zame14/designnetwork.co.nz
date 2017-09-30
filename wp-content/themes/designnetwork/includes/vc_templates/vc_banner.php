<?php
vc_map( array(
    "name" => __("Home Banner"),
    "base" => "dn_home_banner",
    "category" => __('Content'),
    'icon' => 'icon-wpb-single-image',
    'description' => 'Banner for the home page',
    "params" => array(
        array(
            "type" => "attach_images",
            "heading" => __("Banner Images"),
            "param_name" => "images",
        ),
        array(
            "type" => "textfield",
            "heading" => __("Slogan"),
            "param_name" => "slogan",
        ),
    )
));
add_shortcode('dn_home_banner', 'homeBanner');
function homeBanner($atts) {
    $args = shortcode_atts( array(
        'images' => '',
        'slogan' => ''
    ), $atts);
    $slogan = $args['slogan'];
    $images = explode(',',$args['images']);
    shuffle($images);
    $img = wp_get_attachment_image_src($images[0], 'full');
    $bannerImage = $img[0];
    //print_r($images);

    $html = '
    <div class="banner-wrapper">
            <img src="' . $bannerImage . '" alt="Design Network Architecture Limited" />
            <div class="banner-text-wrapper">
                <h1>' . $slogan . '</h1>
                <a href="' . get_page_link(9) . '" class="btn btn-primary">View Our Projects</a>
            </div>
        </div>
    </div>';

    return $html;
}