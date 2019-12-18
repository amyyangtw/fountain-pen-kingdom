<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="row m-5">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
        <h2>建立帳戶</h2>
        <p>請填寫表單完成註冊</p>
        <form action="<?php echo URLROOT; ?>/users/register" method="post">
          <div class="form-group">
            <label for="name">姓名: <sup>*</sup></label>
            <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>" placeholder="請輸入使用者名稱">
            <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="email">信箱: <sup>*</sup></label>
            <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>" placeholder="1234@gmail.com">
            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="password">密碼: <sup>*</sup></label>
            <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>" placeholder="請輸入六個字元以上英文或數字">
            <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="confirm_password">確認密碼: <sup>*</sup></label>
            <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>" placeholder="請再次輸入密碼">
            <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
          </div>

          <div class="row mx-2">
            <div class="mr-auto">
              <a href="<?php echo URLROOT; ?>/users/login" class="text-dark text-decoration-none">已經是會員?&nbsp;&nbsp;&nbsp;<span class="btn btn-outline-success">登入<span></a>
            </div>
            <div class="">
              <input type="submit" value="註冊" class="btn btn-success btn-block">
              <input type="submit" value="Register" class="d-none">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>