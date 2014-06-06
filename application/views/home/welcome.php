<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('meta_view'); ?>
</head>
<body>
<?php $this->load->view('header_view'); ?>

<div id="main-carousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#main-carousel" data-slide-to="0" class="active"></li>
        <li data-target="#main-carousel" data-slide-to="1"></li>
        <li data-target="#main-carousel" data-slide-to="2"></li>
        <li data-target="#main-carousel" data-slide-to="3"></li>
        <li data-target="#main-carousel" data-slide-to="4"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="<?php echo base_url(); ?>static/img/Pic1.png" alt="Pic1">
        </div>
        <div class="item">
            <img src="<?php echo base_url(); ?>static/img/Pic2.png" alt="Pic2">
        </div>
        <div class="item">
            <img src="<?php echo base_url(); ?>static/img/Pic3.png" alt="Pic3">
        </div>
        <div class="item">
            <img src="<?php echo base_url(); ?>static/img/Pic4.png" alt="Pic3">
        </div>
        <div class="item">
            <img src="<?php echo base_url(); ?>static/img/Pic5.png" alt="Pic3">
        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#main-carousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#main-carousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
</div>

<div class="container text-center">
    <div class="row">
        <!-- <div class="col-lg-6 text-center">
            <h2><?php /*echo lang('who_we_are')*/?></h2>
            <p class="text-info">
                <?php /*echo lang('who_we_are_desc')*/?>
            </p>
            <a class="btn btn-primary" href="<?php /*echo site_url('/home/contact/') */?>" role="button"><?php /*echo lang('who_we_are_details')*/?></a>
         </div>-->
        <div class="col-lg-3  text-center"></div>
        <div class="col-lg-6  text-center">
            <h2><?php echo lang('what_we_offer') ?></h2>

            <p class="text-info">
                <?php echo lang('what_we_offer_desc') ?>
            </p>
            <a class="btn btn-primary" href="<?php echo site_url('/offers/') ?>"
               role="button"><?php echo lang('what_we_offer_details') ?></a>
        </div>
        <div class="col-lg-3  text-center"></div>
    </div>
    <hr/>
</div>
<?php $this->load->view('footer_view'); ?>
</body>

