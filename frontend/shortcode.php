<?php 
// Enable Shortcode
function eazy_owl_carousel_shortcode( $atts ) {
    $a = shortcode_atts( array(
        'slug' => '',
    ), $atts );
    extract($a);

    // Init class
    require __DIR__ . '/class.eazy-owl-carousel.php';
    $Slider = new Eazy_OWL_Carousel( $slug );
    $Slider->get();
    $Slider->debug();

    // Display Items
    $html = '<div class="owl-carousel owl-theme">';
    foreach ( $Slider->items as $n => $item ){
        $html .= '<div class="item">';
            $html .= '<img src="'.$item->image.'" class="img-responsive">';

            if ( $item->title || $item->description || $item->cta_label ) {
                $html .= '<div class="overlay">';
                    $html .= '<h4>'.$item->title.'</h4>';
                    $html .= '<p>'.$item->description.'</p>';

                    if ( $item->cta_label ) {
                        $html .= '<div class="cta-wrapper"><a id="cta-eazyowl-'.$Slider->ID.'" href="'.$item->cta_url.'">'.$item->cta_label.'</a></div>';
                    }
                $html .= '</div>';
            }
        $html .= '</div>';
    }
    $html .= '</div>';

    return $html;
}
add_shortcode( 'eazyowl', 'eazy_owl_carousel_shortcode' );