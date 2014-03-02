<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('meta_view'); ?>
</head>
<body>
<?php $this->load->view('header_view'); ?>

<div class="container">
    <div class="row-fluid">
        <div class="col-xs-12 col-sm-6">
            <h2>Register Now!</h2>
            <?php if($register_has_error == 1) { ?>
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Warning!</strong> <?php echo validation_errors(); ?>
                </div>
            <?php } ?>
            <?php if(isset($register_success)) { ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Congragulation!</strong> <?php echo $register_success; ?>
                </div>
            <?php } ?>
            <form class="form-horizontal" action="<?php echo site_url('user/auth');?>" method="post">
                <div class="control-group">
                    <label class="control-label" for="email">Email</label>

                    <div class="controls">
                        <input type="text" name="email" id="email" placeholder="Email">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="password">Password</label>

                    <div class="controls">
                        <input type="password" name="password" id="password" placeholder="Password">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="passconf">Repeat Password</label>

                    <div class="controls">
                        <input type="password" name="passconf" id="passconf" placeholder="Password">
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <input type="hidden" id="scenario" name="scenario" value="register"/>
                        <button type="submit" class="btn">Sign up</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-xs-12 col-sm-6">
            <h2>Login</h2>
            <?php if($login_has_error == 1) { ?>
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Warning!</strong> <?php echo $auth_error; ?>
            </div>
            <?php } ?>

            <form class="form-horizontal" action="<?php echo site_url('user/auth');?>" method="post">
                <div class="control-group">
                    <label class="control-label" for="auth_mail">Email</label>

                    <div class="controls">
                        <input type="text" name="auth_mail" id="auth_mail" placeholder="Email">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="auth_password">Password</label>

                    <div class="controls">
                        <input type="password" name="auth_password" id="auth_password" placeholder="Password">
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <label class="checkbox">
                            <input type="checkbox"> Remember me
                        </label>
                        <input type="hidden" id="scenario" name="scenario" value="auth"/>
                        <button type="submit" class="btn">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <hr/>
</div>
<?php $this->load->view('footer_view'); ?>
</body>
