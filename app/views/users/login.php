<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="row m-5">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
        <?php flash('register_success')?>
        <h2>登入</h2>
        <form action="<?php echo URLROOT; ?>/users/login" method="post">
          <div class="form-group">
            <label for="email">信箱：<sup>*</sup></label>
            <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="password">密碼：<sup>*</sup></label>
            <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
            <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
          </div>

          <div class="row mx-2">
            <div class="mr-auto">
              <a href="<?php echo URLROOT; ?>/users/register" class="text-dark text-decoration-none">非會員?&nbsp;&nbsp;&nbsp;<span class="btn btn-outline-success">註冊<span></a>
            </div>
            <div class="">
              <input type="submit" value="登入" class="btn btn-success btn-block">
              <input type="submit" value="login" class="d-none">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>