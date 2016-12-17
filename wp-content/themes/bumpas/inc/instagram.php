<?php

/**
 * Instagram PHP API
 * Example for using the getUserMedia() method
 * 
 * @link https://github.com/cosenary/Instagram-PHP-API
 * @author Christian Metz
 * @since 31.01.2012
 */

require 'instagram.class.php';

// Initialize class
$instagram = new Instagram(array(
  'apiKey'      => 'c532751031b345c5b17b022c512a8503',
  'apiSecret'   => '231985b7d90440c9a73b40c2df4b7ce2',
  'apiCallback' => 'http://andrewbumpas.com'
));

// Receive OAuth code parameter
$code = $_GET['code'];

// Check whether the user has granted access
if (true === isset($code)) {

  // Receive OAuth token object
  $data = $instagram->getOAuthToken($code);

  // Store user access token
  $instagram->setAccessToken($data);

  // Now you can call all authenticated user methods
  // Get the most recent media published by a user
  $media = $instagram->getUserMedia();

  foreach ($media->data as $entry) {
    echo "<img src=\"{$entry->images->thumbnail->url}\">";
  }

}

?>