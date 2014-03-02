<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('meta_view'); ?>
</head>
<body>
<?php $this->load->view('header_view'); ?>

<div class="container">
    <div class="col-md-4">
        <p><img src="<?php echo base_url(); ?>static/img/human.png" alt="<?php echo lang('contact_name') ?>"
                class="img-thumbnail"> <?php echo lang('contact_name') ?></p>

        <p>
            <span class="glyphicon glyphicon-time"></span> <?php echo lang('contact_hrs') ?>
            <br/> <?php echo lang('contact_details') ?>
        </p>

        <p>
            <span class="glyphicon glyphicon-phone"></span> <?php echo lang('contact_mob') ?>
            <br/>
            <span class="glyphicon glyphicon-earphone"></span> <?php echo lang('contact_office') ?>
        </p>
    </div>

    <div class="col-md-8">
        <iframe width="640" height="480" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                src="https://maps.google.ch/?ie=UTF8&amp;t=h&amp;ll=54.001009,-6.402283&amp;spn=0.048431,0.109863&amp;z=13&amp;output=embed"></iframe>
        <br/>
        <small><a
                href="https://maps.google.ch/?ie=UTF8&amp;t=h&amp;ll=54.001009,-6.402283&amp;spn=0.048431,0.109863&amp;z=13&amp;source=embed"
                style="color:#0000FF;text-align:left">View Larger Map</a></small>
    </div>
</div>

<?php $this->load->view('footer_view'); ?>

</body>
