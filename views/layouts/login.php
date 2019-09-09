<section id="login-form" class="login-form">
  <input type="text" id="login-username" name="username" class="login-form-username" placeholder="USER NAME">
  <input type="password" id="login-password" name="password" class="login-form-password" placeholder="PASSWORD">
  <input type="submit" id="login-btn" name="loginButton" class="login-form-submit btn btn-secondary align-items-center" value="Log In">
  <span id="login-not-registered" class="login-not-registered">Not registered?</span>
  <span id="login-forgot-password" class="login-forgot-password">Forgot passwd?</span>
</section>

<section id="register-form" class="register-form">
  <input type="text" id="register-username" name="username" class="register-form-username" placeholder="USER NAME">
  <input type="password" id="register-password" name="password" class="register-form-password" placeholder="PASSWORD*" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
  <input type="password" id="register-repeat-password" name="repeat-password" class="register-form-password" placeholder="REPEAT PASSWORD">
  <span class="register-password-desc"><sup>* Must contain at least one number, one uppercase and lowercase letter and at least 8 or more characters</sup></span>
  <input type="submit" id="register-btn" name="registerButton" class="register-form-submit btn btn-secondary align-items-center" value="Register">
  <span id="register-back-to" class="login-not-registered">Back to Log In</span>
</section>

<!-- The Modal -->
<section class="modal" id="login-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h5 id="modal-title" class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div id="login-modal-body" class="modal-body">
      </div>
    </div>
  </div>
</section>
