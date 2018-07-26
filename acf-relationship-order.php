<?php
function order_by_post__in( $args ) {
	$settings = $args['settings'];
	if ( ! isset( $settings->data_source ) || 'acf_relationship' != $settings->data_source ) {
		return $args;
	}
	$args['orderby'] = 'post__in';
	return $args;
}

add_filter( 'fl_builder_loop_query_args', 'order_by_post__in', 10, 2 );

?>