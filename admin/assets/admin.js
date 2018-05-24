jQuery(document).ready(function(){
    // Add shortcode after title in backend
    if ( jQuery('body.post-type-eazy_owl_carousel #titlediv').length ) {
        var slug = jQuery('body.post-type-eazy_owl_carousel #editable-post-name').html();
        jQuery('body.post-type-eazy_owl_carousel #titlediv').append('<div class="shortcode-wrapper"><input id="shortcode" value="[eazyowl slug=\'' +  slug + '\'][/eazyowl]" readonly /></div>');
    }
    // On Click Select
    jQuery('body.post-type-eazy_owl_carousel #titlediv #shortcode').bind('click', function(){
        jQuery(this).select();
    });
});