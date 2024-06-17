  <?php
    global $session;
    if ($session->is_signed_in()) {
        redirect("");
    }

    ?>

  <div class="container">
      <div class="site-sign-up d-flex align-items-center justify-content-center mt-80 mb-80" style="">
          <form action="login_" method="post">
              <div class="border rounded-2" style="padding: 24px; width: fit-content;">
                  <div class="ssu-title display-5 text-center">Sign In</div>
                  <div class="input-group mb-16" style="width: 392px;">
                      <label for="" class="mb-8 h6">Email</label>
                      <input type="email" name="email" id="" class="form-control" placeholder="Please Typing Email!" style="width: 100%;" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : false ?>">
                      <?php if (isset($errors['email'])) : ?>
                          <div class="errorMes h2 mt-2" style="color: var(--red-01);"><?= strtoupper($errors['email']) ?></div>
                      <?php endif; ?>
                  </div>
                  <div class="input-group mb-16" style="width: 392px;">
                      <label for="" class="mb-8 h6">Password</label>
                      <input type="password" name="matkhau" id="" class="form-control" placeholder="Please Typing Password!" style="width: 100%;" value="<?= isset($_POST['matkhau']) ? htmlspecialchars($_POST['matkhau']) : false ?>">
                      <?php if (isset($errors['matkhau'])) : ?>
                          <div class="errorMes h2 mt-2" style="color: var(--red-01);"><?= strtoupper($errors['matkhau']) ?></div>
                      <?php endif; ?>
                  </div>
                  <div class="ssu-button" style="width: 100%;">
                      <button type="submit" class="btn btn-primary mb-16" style="width: 100%;">Sign In</button>
                  </div>
              </div>
          </form>
      </div>
  </div>