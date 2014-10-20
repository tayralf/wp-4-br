<?php

/**
 * An alternate to using do_shortcode()
 * @since 1.7.5
 */
function facetwp_display() {
    $args = func_get_args();
    $atts = isset( $args[1] ) ?
        array( $args[0] => $args[1] ) :
        array( $args[0] => true );

    return FWP()->display->shortcode( $atts );
}

add_filter ('widget_text', 'do_shortcode', 90);

// widgets de html podem rodar script PHP
function permitir_php($html){
    if(strpos($html,"<"."?php")!==false){
        ob_start();
        eval("?".">".$html);
        $html=ob_get_contents();
        ob_end_clean();
    }
    return $html;
}
add_filter('widget_text','permitir_php',100);
