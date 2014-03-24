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
            <h2><?php echo lang('register_now')?></h2>
            <?php if($register_has_error == 1) { ?>
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><?php echo lang('warning')?></strong> <?php echo validation_errors(); ?>
                </div>
            <?php } ?>
            <?php if(isset($register_success)) { ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><?php echo lang('congrats')?></strong> <?php echo $register_success; ?>
                </div>
            <?php } ?>
            <form class="form-horizontal" action="<?php echo site_url('user/auth');?>" method="post">
                <div class="control-group">
                    <label class="control-label" for="email"><?php echo lang('email')?></label>

                    <div class="controls">
                        <input type="text" name="email" id="email" placeholder="<?php echo lang('email')?>">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="firstname"><?php echo lang('firstname')?></label>

                    <div class="controls">
                        <input type="text" name="firstname" id="firstname" placeholder="<?php echo lang('firstname')?>">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="lastname"><?php echo lang('lastname')?></label>

                    <div class="controls">
                        <input type="text" name="lastname" id="lastname" placeholder="<?php echo lang('lastname')?>">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="phone"><?php echo lang('phone')?></label>

                    <div class="controls">
                        <input type="text" name="phone" id="phone" placeholder="<?php echo lang('phone')?>">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="password"><?php echo lang('pwd')?></label>

                    <div class="controls">
                        <input type="password" name="password" id="password" placeholder="<?php echo lang('pwd')?>">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="passconf"><?php echo lang('repeat_pwd')?></label>

                    <div class="controls">
                        <input type="password" name="passconf" id="passconf" placeholder="<?php echo lang('pwd')?>">
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <input type="hidden" id="scenario" name="scenario" value="register"/>
                        <button type="submit" class="btn"><?php echo lang('signup')?></button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-xs-12 col-sm-6">
            <h2>Login</h2>
            <?php if($login_has_error == 1) { ?>
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong><?php echo lang('warning')?></strong> <?php echo $auth_error; ?>
            </div>
            <?php } ?>

            <form class="form-horizontal" action="<?php echo site_url('user/auth');?>" method="post">
                <div class="control-group">
                    <label class="control-label" for="auth_mail"><?php echo lang('email')?></label>

                    <div class="controls">
                        <input type="text" name="auth_mail" id="auth_mail" placeholder="<?php echo lang('email')?>">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="auth_password"><?php echo lang('pwd')?></label>

                    <div class="controls">
                        <input type="password" name="auth_password" id="auth_password" placeholder="<?php echo lang('pwd')?>">
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <input type="hidden" id="scenario" name="scenario" value="auth"/>
                        <button type="submit" class="btn"><?php echo lang('login')?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <hr/>
</div>
<?php $this->load->view('footer_view'); ?>
</body>
