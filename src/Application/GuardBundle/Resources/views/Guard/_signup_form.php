<form method="post" action="<?php echo $view->router->generate('guard_signup'); ?>">
  <div class="form-field">
    <label for="username">Username</label>
    <input type="text" name="username" id="username" />
  </div>
  <div class="form-field">
    <label for="password">Password</label>
    <input type="text" name="password" id="password" />
  </div>
  <button>Sign me up, Scotty!</button>
</form>
