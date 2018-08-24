<?php
// Add shortcodes to menu description
function shortcode_menu_description( $item_output, $item ) {
    if ( !empty($item->description)) {
         $output = do_shortcode($item->description);  
         if ( $output != $item->description )
               $item_output = $output;   
        }
    return $item_output;
}
add_filter("walker_nav_menu_start_el", "shortcode_menu_description" , 10 , 2);


// Function to add search icon & form to a menu item description
function menu_search_shortcode() {
	$action = esc_url( home_url( '/' ) );
	$title = esc_attr_x( 'Type and press Enter to search.', 'Search form mouse hover title.', 'fl-automator' );
	$placeholder = esc_attr_x( 'Search', 'Search form field placeholder text.', 'fl-automator' );
	$query = get_search_query();
    $search_html =<<<EOF
<div class="fl-page-nav-search">
	<a class="fa fa-search" style="font-size:0px !important;" href="javascript:void(0);">search<i class="fa fa-search" style="font-size:15px !important"></i></a>
	<form method="get" role="search" action="{$action}" title="{$title}">
		<input type="search" aria-label="Search" class="fl-search-input form-control" name="s" placeholder="{$placeholder}" value="{$query}" />
	</form>
</div>
EOF;
	return $search_html;
}
add_shortcode('menu_search', 'menu_search_shortcode');