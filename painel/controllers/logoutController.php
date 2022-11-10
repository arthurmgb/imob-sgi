<?php
class logoutController {
  public function index() {
     session_destroy();
     echo '<script>window.location.href="'.BASE_URL.'login";</script>';
     exit;
  }
}
