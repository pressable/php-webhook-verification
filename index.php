<?php

// Send test post to `/`
if ( isset( getallheaders()['header-key-provided-in-documentation'] ) ) {
  // Get signature from request header.
  $signature = getallheaders()['header-key-provided-in-documentation'];

  // Shared key from Pressable.
  $sharedKey = 'shared-key-provided-on-profile-page';

  // Raw body as a string.
  $req_raw_body = file_get_contents('php://input');

  // Verifying signature.
  $isVerified = hash_hmac('sha256', $req_raw_body, $sharedKey) === $signature;

  // Output the result.
  error_log('Is signature verified: ' . ($isVerified == 1 ? 'true' : 'false'));

  http_response_code(200);
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pressable Webhook Signature Verification PHP</title>
    <meta name="description" content="A sample PHP file for verifying Pressable Webhook Signatures with PHP">
    <meta name="author" content="Pressable">
  </head>
  <body>
    <h1>Pressable Webhook Signature Verification PHP</h1>
    <p>A sample PHP file for verifying Pressable Webhook Signatures with PHP</p>
  </body>
</html>
