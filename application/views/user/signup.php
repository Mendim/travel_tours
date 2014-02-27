<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('meta_view'); ?>
</head>
<body>
<?php $this->load->view('header_view'); ?>

<div class="container">
    <div class="row-fluid">
        <div class="span6">
            <h2>Register Now!</h2>
            <?php if($has_error === 0) { ?>
                <div class="alert">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Warning!</strong> <?php echo validation_errors(); ?>
                </div>
            <?php } ?>
            <form class="form-horizontal" action="<?php echo site_url('user/auth');?>" method="post">
                <div class="control-group">
                    <label class="control-label" for="inputEmail">Email</label>

                    <div class="controls">
                        <input type="text" id="inputEmail" placeholder="Email">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputPassword">Password</label>

                    <div class="controls">
                        <input type="password" id="inputPassword" placeholder="Password">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputPassword">Repeat Password</label>

                    <div class="controls">
                        <input type="password" id="inputPasswordRepeat" placeholder="Password">
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn">Sign up</button>
                    </div>
                </div>
            </form>
        </div>
        <hr/>
        <div class="span6">
            <h2>Login</h2>
            <?php if($has_error === 0) { ?>
            <div class="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Warning!</strong> <?php echo validation_errors(); ?>
            </div>
            <?php } ?>
            <form class="form-horizontal" action="<?php echo site_url('user/auth');?>" method="post">
                <div class="control-group">
                    <label class="control-label" for="inputEmail">Email</label>

                    <div class="controls">
                        <input type="text" id="inputEmail" placeholder="Email">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputPassword">Password</label>

                    <div class="controls">
                        <input type="password" id="inputPassword" placeholder="Password">
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <label class="checkbox">
                            <input type="checkbox"> Remember me
                        </label>
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
