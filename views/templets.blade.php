<?php

function template( $names, $args ){
  // allow for single file names
  if ( !is_array( $names ) ) { 
    $names = array( $names ); 
  }
  // try to find the templates
  $template_found = false;
  foreach ( $names as $name ) {
    $file = __DIR__ . '/templates/' . $name . '.php';
    if ( file_exists( $file ) ) {
      $template_found = $file;
      // stop after the first template is found
      break;
    }
  }
  // fail if no template file is found
  if ( ! $template_found ) {
    return '';
  }
  // Make values in the associative array easier to access by extracting them
  if ( is_array( $args ) ){
    extract( $args );
  }
  // buffer the output (including the file is "output")
  ob_start();
    include $template_found;
  return ob_get_clean();
}