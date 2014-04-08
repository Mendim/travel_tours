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

    <br />

    <?php foreach($trips as $trip) {?>
        <div class="panel panel-default">
          <div class="panel-heading">
        <div class="media">
            <a href="#" class="pull-left">
                <img class="media-object" data-src="holder.js/300x200" alt="trip-icon">
            </a>
            <div class="media-body">
            <?= $trip->name ?>
            </div>
        </div>
        </div>
        <div class="panel-body">
                <p>
                    <?= $trip->description ?>


                </p>
            </div>
        </div>

    <?php } ?>

</div>

<?php $this->load->view('footer_view'); ?>
</body>
