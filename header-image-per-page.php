<?php
/**
 * header_image_per_page() ermöglicht es, das
 * Header Image pro Seite zu ändern.
 * Dazu klinken wir uns in den Filter "theme_mod_header_image"
 * ein.
 * Verfügt nun ein Beitrag/eine Seite über eine URL zu einem
 * Bild im benutzerdefinierten Feld 'current-background',
 * so wird dieses angezeigt.
 **/
add_filter( 'theme_mod_header_image', 'header_image_per_page' );
function header_image_per_page( $image ){
	//Gebe das normale Bild aus, wenn wir uns nicht auf einer Beitragsseite befinden
	if( ! is_singular() )
		return $image;
	
	//Hole Bild aus dem benutzerdefinierten Feld 'current-background'
	$background = get_post_meta( get_the_ID(), 'current-background', true );
	
	//Gebe das normale Bild aus, wenn kein Bild angegeben, oder dieses keine URL ist
	if( empty( $background ) || ! filter_var( $background, FILTER_VALIDATE_URL ) )
		return $image;
	
	//Gebe das Seitenbild aus
	return $background;
}
?>
