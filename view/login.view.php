<?php
  include "./view/template/header.view.php";

  session_start();
  if (isset($_SESSION['user']['id'])) {
      redirect('/user/admin');
  } elseif (isset($_COOKIE['token'])) {
      $user = Authentication::check();
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
            <h5>Admin Panel Login</h5>
          </div>
          <div class="px-3 py-2">
            <form action="" method="POST" class="user-form">
              <div class="col-auto mb-3">
                <?php if (isset($_GET['error'])): ?>
                    <div class="alert alert-danger" role="alert">
                      <?= $_GET['error'] ?>
                    </div>
                <?php elseif (isset($_GET['success'])): ?>
                    <div class="alert alert-success" role="alert">
                        <?= $_GET['success'] ?>
                      </div>
                <?php endif ?>
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
                    type="text"
                    class="form-control"
                    id="email" name="email"
                    placeholder="email" required
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
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    id="cookie-login" name="cookie-login" 
                  />
                  <label class="form-check-label" for="cookie-login">
                    Remember me
                  </label>
                </div>
              </div>
              <div
                class="d-flex align-items-center justify-content-between col-auto mb-4"
              >
                <a href="<?= BASE_URL ?>/user/register">Author Registeration</a>
                <input type="submit" class="btn btn-success px-4 text-light" value="Login">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include "./view/template/footer.view.php"; ?>