<?php


class RM_HTMLController extends RM_BaseController {
    
    
    /**
     * Prepare the HTML for display on the front end
     *
     * @return null
     * @added 1.0
     */
    
    static function prepare() {
        
        
        if( !ResponsiveMenu::getOption( 'RMShortcode' ) )
            add_action( 'wp_footer', array( 'RM_HTMLController', 'display' ) );
        
        
    }
    
    
    /**
     * Creates the view for the menu and echos it out
     *
     * @return string
     * @added 1.0
     */
    
    static function display( $args = null ) {
        
        /* Unfortunately this messy section is due to shortcodes converting all args to lowercase */
        if( $args ) { 
            $args['RM']          = ( isset($args['rm']) )          ? $args['rm']         : '';            
            $args['RM']          = ( isset($args['menu']) )        ? $args['menu']       : $args['RM'];
            $args['RMTitle']     = ( isset($args['title']) )       ? $args['title']      :'';
            $args['RMTitleLink'] = ( isset($args['title_link']) )  ? $args['title_link'] : '';
            $args['RMTitleLoc']  = ( isset($args['title_open']) )  ? $args['title_open'] : '';
            $args['RMHtml']      = ( isset($args['html']) )        ? $args['html']       : '';
            $args['RMHtmlLoc']   = ( isset($args['html_loc']) )    ? $args['html_loc']   : '';
            $args['RMImage']     = ( isset($args['title_img']) )   ? $args['title_img']  : '';
            $args['RMSearchPos'] = ( isset($args['search_loc']) )  ? $args['search_loc'] : '';
            $args['RMClickImg']  = ( isset($args['btn_img']) )     ? $args['btn_img']    : '';
            $args['RMClickImgClicked'] = ( isset($args['btn_img_clicked']) ) ? $args['btn_img_clicked'] : '';
            $args['RMClickTitle']      = ( isset( $args['btn_title']) )      ? $args['btn_title']       :'';
        }
        
        $options = ResponsiveMenu::getOptions();
        
        RM_View::make( 'menu', $args ? array_merge( $options, $args ) : $options );
        RM_View::make( 'click-button', $args ? array_merge( $options, $args ) : $options );
     
        
    }
    
    
}
