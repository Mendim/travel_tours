<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <?php $this->load->view('meta_view'); ?>
</head>
<body>
<?php $this->load->view('header_view'); ?>

<div class="container">


    <div class="page-header">
    <h1><?= $trip->name ?> <small>by <?= $trip->author?></small></h1>
    </div>

    <dl>
        <dd>duration</dd>
        <dt><?= $trip->duration?></dt>
    </dl>

    <dl>
        <dd>price</dd>
        <dt><?= $trip->price?></dt>
    </dl>


    <p>
    <?= $trip->description ?>
    </p>

    <?php if(!empty($email_user)) { ?>
        <div class="btn-group">
            <a class="btn btn-primary" href="<?php echo site_url('/offers/book/'. $trip->id) ?>"><?php echo lang('book_offer') ?></a>
        </div>
    <?php } else {    ?>
        <div class="btn-group">
            <a class="btn btn-primary" href="<?php echo site_url('/user/auth/'. $trip->id) ?>"><?php echo lang('signin_book') ?></a>
        </div>
    <?php }?>

    <?php if ($is_admin){ ?>
        <div class="btn-group">
            <a class="btn btn-primary" href="<?php echo site_url('/offers/create/'. $trip->id) ?>"><?php echo lang('update_offer') ?></a>
            <a class="btn btn-primary" href="<?php echo site_url('/offers/delete/'. $trip->id) ?>"><?php echo lang('delete_offer') ?></a>
        </div>
    <?php }?>

</div>

<?php $this->load->view('footer_view'); ?>
</body>
