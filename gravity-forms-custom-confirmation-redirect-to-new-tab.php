<?php
/*

	GRAVITY FORMS CUSTOM CONFIRMATION WITH NEW TAB REDIRECT

	ADD A DROPDOWN FIELD 
		Check show values
		add the website for the value

	form_tag adds targe='_blank' to the form to open in a new tab

	custom_confirmation is the redirect for the dropdown entry

	change $form['id']	to match your forms id

*/
add_filter( 'gform_form_tag', 'form_tag', 10, 2 );
function form_tag( $form_tag, $form ) {
    if ( $form['id'] == 9 ) {
    	$form_tag = preg_replace( "|action='|", "target='_blank' action='", $form_tag );
    }
    return $form_tag;
}

add_filter( 'gform_confirmation', 'custom_confirmation', 10, 4 );
function custom_confirmation( $confirmation, $form, $entry, $ajax ) {
    if( $form['id'] == '9' ) {
        $confirmation = array( 'redirect' => rgar($entry, '1'));
    } 
    return $confirmation;
}