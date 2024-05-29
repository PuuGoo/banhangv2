  <?php
  global $session;
  if ($session->is_signed_in()) {
    redirect("");
  }

  ?>

  <div class="container">
    <div class="site-sign-up d-flex align-items-center justify-content-center mt-80 mb-80" style="">
      <form action="signin_" method="post">
        <div class="border rounded-2" style="padding: 24px; width: fit-content;">
          <div class="ssu-title display-5 text-center">Sign In</div>
          <div class="input-group mb-16" style="width: 392px;">
            <label for="" class="mb-8 h6">Email</label>
            <input type="email" name="email" id="" class="form-control" placeholder="Please Typing Email!" style="width: 100%;">
          </div>
          <div class="input-group mb-16" style="width: 392px;">
            <label for="" class="mb-8 h6">Password</label>
            <input type="password" name="password" id="" class="form-control" placeholder="Please Typing Password!" style="width: 100%;">
          </div>
          <a href="changepass">
            <div class="ssu-sign-up h6 text-end mb-8" style="color: var(--darkGreen-01)">Change Pass?</div>
          </a>
          <div class="ssu-button" style="width: 100%;">
            <button type="submit" class="btn btn-primary mb-16" style="width: 100%;">Sign In</button>
            <a href="signup">
              <button type="button" class="btn btn-outline-primary" style="width: 100%;">Sign Up</button>
            </a>
          </div>
        </div>
      </form>
    </div>
  </div>