<?php
/*
* This file is part of Gravatar Signup Encouragement plugin for WorPress
* and it is used for AJAX work
*/

/* Load e-mail address sent via POST */
$gravatar_email = $_POST['gravmail'];

/* If there is no POST, return 403 error */
if ( ! $gravatar_email ) exit;

/*
 * Check if gravatar exists:
 * 	1) load gravatar
 *	2) get it's headers
 *	3) chech if status is 200
 *	4) if isn't, return "no"
 * Based on work from florinel2k at yahoo dot com (  http://php.net/file_exists#75720 )
 * and worldclimb at gmail dot com (  http://php.net/file_exists#76545 )
 */
$fileUrl = 'http://www.gravatar.com/avatar/' . md5( strtolower( $gravatar_email ) ) . '?s=2&d=404';

$rating = $_GET['r'];
if ( ! empty( $rating ) )
	$fileUrl .= '&r=' . $rating;

$AgetHeaders = @get_headers( $fileUrl );
if ( ! preg_match( "|200|", $AgetHeaders[0] ) ) {
	echo 'no';
}
?>