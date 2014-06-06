<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <?php $this->load->view('meta_view'); ?>
</head>
<body>
<?php $this->load->view('header_view'); ?>

<h2><?= $trip->name ?></h2>

<div class="container">
     <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo site_url('booking/send');?>">
        <div class="btn-group">
            <a class="btn btn-primary" href="<?php echo site_url('/offers/details/' . $trip->id) ?>"><?php echo lang('cancel') ?></a>
        </div>

        <div class="control-group">&nbsp;</div>

        <?php if (validation_errors() ){ ?>
         <div class="alert alert-warning">
             <button type="button" class="close" data-dismiss="alert">&times;</button>
             <strong><?php echo lang('warning')?></strong> <?php echo validation_errors(); ?>
         </div>
        <?php } ?>



        <div class="control-group">
            <label class="control-label" for="start_date"><?php echo lang('start_date'); ?></label> (<i><?= lang('duration')?>: <?=$trip->duration ?></i>)
            <div class="input-group date form_datetime col-md-5" data-date="<?= $tomorrow?>" data-date-format="yyyy-MM-dd HH:ii:ss" data-link-field="start_date">
                <input class="form-control" size="16" type="text" value="<?php echo set_value('start_date', $booking->start_date); ?>" readonly>
                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
            </div>
            <input type="hidden" id="start_date" name="start_date" value="<?php echo set_value('start_date', $booking->start_date); ?>">
         </div>


         <div class="control-group">
             <label class="control-label" for="meeting_point"><?php echo lang('meeting_point'); ?></label>
             <div class="controls">
                 <input type="hidden" id="trip_id" name="trip_id" value="<?= $trip->id ?>">
                 <input class="form-control" type="text" id="meeting_point" name="meeting_point" placeholder="<?php echo lang('meeting_point'); ?>" value="<?php echo set_value('meeting_point', $booking->meeting_point); ?>">
             </div>
         </div>


         <div class="control-group">
             <label class="control-label" for="number_of_persons"><?php echo lang('number_of_persons'); ?></label>
             <div class="controls">
                 <input class="form-control" type="text" id="number_of_persons" name="number_of_persons" placeholder="<?php echo lang('number_of_persons'); ?>" value="<?php echo set_value('number_of_persons', $booking->number_of_persons); ?>">
             </div>
         </div>

         <div class="control-group">
             <label class="control-label" for="comment"><?php echo lang('comment'); ?></label>
             <div class="controls">
                 <textarea class="form-control" name="comment" id="comment" rows="10"><?php echo set_value('comment', $booking->comment); ?></textarea>
             </div>
         </div>

         <div class="btn-group">
             <button type="submit" class="btn"><?php echo lang('save') ?></button>
         </div>
    </form>

</div>


<?php $this->load->view('footer_view'); ?>
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });
</script>
</body>
