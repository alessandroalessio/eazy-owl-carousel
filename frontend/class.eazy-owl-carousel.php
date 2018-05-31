<?php 
// Class to obtain data
class Eazy_OWL_Carousel{

    private $wpdb;

    public $ID;
    private $slug;
    public $options;
    public $items = [];

    function __construct($slug){
        global $wpdb;
        $this->slug = $slug;
        $this->wpdb = $wpdb;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function get(){
        // Head
        $head = $this->wpdb->get_row("SELECT ID FROM ".$this->wpdb->posts." WHERE post_name = '".$this->slug."'");
        $this->ID = $head ->ID;

        // Options
        $this->get_options();

        // Slide
        $this->get_items();
    }

    /**
     * get_options()
     * Retrieve all Options data and put into property $options
     *
     * @return void
     */
    public function get_options(){
        $this->options = [
            'items' => get_post_meta( $this->ID, 'opt_items' ),
            'margin' => get_post_meta( $this->ID, 'opt_margin' ),
            'loop' => get_post_meta( $this->ID, 'opt_loop' ),
            'nav' => get_post_meta( $this->ID, 'opt_nav' ),
            'dots' => get_post_meta( $this->ID, 'opt_dots' ),
            'autoplay' => get_post_meta( $this->ID, 'opt_autoplay' ),
            'autoplaySpeed' => get_post_meta( $this->ID, 'opt_autoplaySpeed' ),
        ];
    }

    /**
     * get_items()
     * Retrieve all Items data and put into property $items
     *
     * @return void
     */
    public function get_items(){
        $list = get_post_meta( $this->ID, 'eazy_owl_carousel_repeat_group' );

        foreach ( $list[0] AS $i => $item ){
            array_push($this->items, (object) $item);
        }
    }

    /**
     * debug
     * Output data of Class
     *
     * @return void
     */
    public function debug(){
        $debug = [
            'ID' => $this->ID,
            'slug' => $this->slug,
            'options' => $this->options,
            'items' => $this->items,
        ];
        "<pre>".var_dump($debug)."</pre>";
    }

}