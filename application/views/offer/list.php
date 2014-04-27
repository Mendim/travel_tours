<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('meta_view'); ?>
</head>
<body>
<?php $this->load->view('header_view'); ?>

<div class="container">


    <?php foreach ($trips as $trip) { ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="media">
<!--                    <a href="#" class="pull-left">-->
<!--                        <img class="media-object" data-src="holder.js/300x200" alt="trip-icon">-->
<!--                    </a>-->

                    <div class="media-body">
                        <a href="<?php echo site_url('/offers/details/' . $trip->id) ?>"><?= $trip->name ?></a>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <p>
                    <?= preg_replace('/<[^>]*>/', '',substr($trip->description, 0,100));?>
                    <!--<?= preg_replace('/<[^>]*>/', '',substr($trip->description, 0,100)) ?>-->
                </p>
            </div>
        </div>

    <?php } ?>

    <br/>

    <?php if ($is_admin){ ?>
        <div class="btn-group">
            <a class="btn btn-primary" href="<?php echo site_url('/offers/create/') ?>"><?php echo lang('create_offer') ?></a>
        </div>
    <?php }?>



</div>

<?php $this->load->view('footer_view'); ?>
</body>
