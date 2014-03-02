<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('meta_view'); ?>
</head>
<body>
<?php $this->load->view('header_view'); ?>

<div class="container">
    <div class="btn-group">
        <button class="btn"><?php echo lang('save') ?></button>
        <button class="btn"><?php echo lang('cancel') ?></button>
    </div>

    <form class="form-horizontal">
        <div class="control-group">
            <label class="control-label" for="title"><?php echo lang('title'); ?></label>
            <div class="controls">
                <input type="text" id="title" name="title" placeholder="<?php echo lang('title'); ?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="duration"><?php echo lang('duration'); ?></label>
            <div class="controls">
                <input type="range" id="duration" name="duration" placeholder="<?php echo lang('duration'); ?>">
            </div>
        </div>
        <div>
            <textarea id="desc-editor" rows="3"></textarea>
        </div>
        <div class="control-group">
            <div class="controls">
                <button type="submit" class="btn"><?php echo lang('signin')?></button>
            </div>
        </div>
    </form>

</div>

<?php $this->load->view('footer_view'); ?>
<script type="text/javascript">
    $('#desc-editor').wysihtml5();
</script>
</body>
