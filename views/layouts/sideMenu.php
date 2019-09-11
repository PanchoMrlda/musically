<form action="/" method="post" class="side-menu">
  <span name="" class="settings">Settings</span>
  <span name="contact" class="contact-us">Contact Us</span>
  <span name="" class="contact-us">About</span>
  <?php if (isset($_SESSION['userId'])) {
    echo '<span class="friends">Friends</span>';
    echo '<span class="logout">Log Out</span>';
  } ?>
  <input type="hidden" class="side-menu-input-hidden" name="goTo">
  <input type="submit" class="side-menu-input-submit">
</form>