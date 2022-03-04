<?php

  $header_files[] = BASE_URL.'/assets/css/user-form.css';
  $footer_files[] = BASE_URL.'/assets/js/validation.js';
  include "./view/template/header.view.php";

  session_start();
  if (isset($_SESSION['user']['id'])) {
      redirect('/user/admin');
  } elseif (isset($_COOKIE['token'])) {
      $user = Authentication::check();
      redirect('/user/login');
  }
?>
<section id="form-container" class="min-vh-100">
  <div class="container">
    <div
      class="row justify-content-center align-items-center min-vh-100"
    >
      <div class="col-12 col-md-8 col-xl-5 p-4">
        <div class="card form-card rounded shadow-lg">
          <div
            class="d-flex justify-content-center align-items-center flex-column"
          >
            <img
              src="<?= BASE_URL ?>/assets/img/kawi-logo.svg"
              alt="Kawi Logo"
              class="logo"
            />
            <h5>Author Registeration</h5>
          </div>
          <div class="px-3 py-2">
            <form action="<?= BASE_URL ?>/user/register" method="POST" class="user-form">
              <div class="col-auto mb-3">
                <?php printAlert() ?>
              </div>
              <div class="col-auto mb-3">
                <label for="username">Username</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <img
                        src="<?= BASE_URL ?>/assets/icons/icons8-user-male.svg"
                        alt="user-icon"
                      />
                    </div>
                  </div>
                  <input
                    type="text"
                    class="form-control"
                    id="username" name="username"
                    placeholder="Username" required
                  />
                </div>
              </div>
              <div class="col-auto mb-3">
                <label for="email">Email</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <img
                        src="<?= BASE_URL ?>/assets/icons/icons8-email-sign-32.png"
                        alt="email-icon"
                      />
                    </div>
                  </div>
                  <input
                    type="email"
                    class="form-control"
                    id="email" name="email"
                    placeholder="Email" required
                  />
                  
                </div>
              </div>
              <div class="col-auto my-3">
                <label for="password">Password</label>
                <div class="input-group mb-4 password-input">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <img
                        src="<?= BASE_URL ?>/assets/icons/icons8-password-64.png"
                        alt="password-icon"
                      />
                    </div>
                  </div>
                  <input
                    type="password"
                    class="form-control"
                    id="password" name="password"
                    placeholder="Password" required
                  />
                  <img
                    src="<?= BASE_URL ?>/assets/icons/icons8-show-password-30.png"
                    alt="show-password-icon"
                    class="show-password"
                  />
                </div>
              </div>
              <div class="col-auto my-3">
                <label for="confirm-password">Confirm Password</label>
                <div class="input-group mb-4 password-input">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <img
                        src="<?= BASE_URL ?>/assets/icons/icons8-password-64.png"
                        alt="password-icon"
                      />
                    </div>
                  </div>
                  <input
                    type="password"
                    class="form-control"
                    id="confirm-password" name="confirm-password"
                    placeholder="Confirm Password" required
                  />
                  <img
                    src="<?= BASE_URL ?>/assets/icons/icons8-show-password-30.png"
                    alt="show-password-icon"
                    class="show-password"
                  />
                </div>
              </div>

              <div
                class="d-flex align-items-center justify-content-between col-auto mb-4"
              >
                <a href="<?= BASE_URL ?>/user/login">Login Panel</a>
                <input type="submit" class="btn btn-success px-4 text-light" value="Register">
                  
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include "./view/template/footer.view.php"; ?>
