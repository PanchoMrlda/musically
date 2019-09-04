<?php
// router.php
if (preg_match('/\.(?:css|json)$/', $_SERVER["REQUEST_URI"])) {
  /* 
    Up to you which header to send, some prefer 404 even if 
    the files does exist for security
  */
  header('HTTP/1.0 403 Forbidden', TRUE, 403);

  // /* choose the appropriate page to redirect users */
  // die(header('location: /views/error.php'));
} else {
  return false;
}
