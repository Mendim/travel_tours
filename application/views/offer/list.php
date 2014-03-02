<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('meta_view'); ?>
</head>
<body>
<?php $this->load->view('header_view'); ?>

<div class="container">
    <div class="btn-group">
        <button class="btn"><?php echo lang('create'); ?></button>
    </div>

    <?php foreach($trips as $trip) {?>
        <div class="media">
            <a href="#" class="pull-left">
                <img class="media-object" data-src="holder.js/300x200" alt="trip-icon">
            </a>
            <div class="media-body">
                <p>



                </p>
            </div>
        </div>

    <?php } ?>

</div>

<?php $this->load->view('footer_view'); ?>
</body>
