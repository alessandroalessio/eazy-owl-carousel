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

    // Display Items
    $html = '<div id="eazy-owl-'.$slug.'" class="owl-carousel owl-theme eazy-owl-carousel" 
                data-items="'.$Slider->options['items'][0].'" 
                data-margin="'.$Slider->options['margin'][0].'"                
                data-loop="'.$Slider->options['loop'][0].'"
                data-nav="'.$Slider->options['nav'][0].'"
                data-dots="'.$Slider->options['dots'][0].'"
                data-autoplay="'.$Slider->options['autoplay'][0].'" 
                data-autoplaySpeed="'.$Slider->options['autoplaySpeed'][0].'" 
            >';
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