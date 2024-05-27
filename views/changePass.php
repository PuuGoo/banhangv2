      <div class="container">
        <div class="site-sign-up d-flex align-items-center justify-content-center mt-80 mb-80" style="">
          <form action="changepass_" method="post">
            <div class="border rounded-2" style="padding: 24px; width: fit-content;">
              <div class="ssu-title display-5 text-center">Change Pass</div>
              <div class="input-group mb-16" style="width: 392px;">
                <label for="" class="mb-8 h6">Email</label>
                <input type="email" name="email" disabled value="<?= $_SESSION['email'] ?>" id="" class="form-control" placeholder="Please Typing Email!" style="width: 100%;">
              </div>
              <div class="input-group mb-16" style="width: 392px;">
                <label for="" class="mb-8 h6">Old Password</label>
                <input type="password" name="oldPassword" id="" class="form-control" placeholder="Please Typing Old Password!" style="width: 100%;">
              </div>
              <div class="input-group mb-16" style="width: 392px;">
                <label for="" class="mb-8 h6">New Password</label>
                <input type="password" name="newPassword" id="" class="form-control" placeholder="Please Typing New Password!" style="width: 100%;">
              </div>
              <div class="input-group mb-16" style="width: 392px;">
                <label for="" class="mb-8 h6">Confirm New Password</label>
                <input type="password" name="confirmNewPassword" id="" class="form-control" placeholder="Please Typing Confirm New Password!" style="width: 100%;">
              </div>
              <div class="ssu-button" style="width: 100%;">
                <button type="submit" class="btn btn-primary" style="width: 100%;">Change Pass</button>
              </div>
            </div>
          </form>
        </div>
      </div>