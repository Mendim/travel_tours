<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('meta_view'); ?>
</head>
<body>
<?php $this->load->view('header_view'); ?>

<div class="container">
     <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo site_url('offers/create');?>">
        <div class="btn-group">
            <button type="submit" class="btn"><?php echo lang('save') ?></button>
            <button class="btn"><?php echo lang('cancel') ?></button>
        </div>

        <div class="control-group">&nbsp;</div>

        <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong><?php echo lang('warning')?></strong> <?php echo validation_errors(); ?>
        </div>


        <div class="control-group">
            <label class="control-label" for="name"><?php echo lang('title'); ?></label>
            <div class="controls">
            <input class="form-control" type="text" id="name" name="name" placeholder="<?php echo lang('title'); ?>" value="<?php echo set_value('title'); ?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="duration"><?php echo lang('duration'); ?></label>
            <div class="controls input-group">
                <input type="range" id="duration" name="duration" min="4" max="16" placeholder="<?php echo lang('duration'); ?>" onchange="updateTextInput(this.value)" value="<?php echo set_value('duration'); ?>">
                <span class="input-group-addon">H</span><input class="form-control" type="text" id="textInput" value="<?php echo set_value('duration'); ?>" readonly>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="image"><?php echo lang('image'); ?></label>
            <div class="controls">
                <input type="file" id="image" name="image" placeholder="<?php echo lang('image'); ?>" value="<?php echo set_value('image'); ?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="price"><?php echo lang('price'); ?></label>
            <div class="controls input-group">
                <span class="input-group-addon">€</span>
                <input class="form-control" type="number" id="price" name="price" placeholder="<?php echo lang('price'); ?>" value="<?php echo set_value('price'); ?>">
            </div>
        </div>
        <div>
            <label class="control-label" for="desc-editor"><?php echo lang('description'); ?></label>
            <div class="controls">
                <textarea class="form-control" name="description" id="desc-editor" rows="10" value="<?php echo set_value('description'); ?>"></textarea>
            </div>
        </div>
    </form>

</div>

<?php $this->load->view('footer_view'); ?>
<script type="text/javascript">
//$('#desc-editor').wysihtml5(
//    {
//    "font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
//    "emphasis": true, //Italics, bold, etc. Default true
//    "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
//    "html": false, //Button which allows you to edit the generated HTML. Default false
//    "link": true, //Button to insert a link. Default true
//    "image": true, //Button to insert an image. Default true,
//    "color": false //Button to change color of font  
//    }
//);
    function updateTextInput(val) {
        document.getElementById('textInput').value=val; 
    }

$(function(){
    $('#desc-editor').editable({inlineMode: false, imageUploadURL: '<?php echo site_url('offers/upload');?>'})
});

//var editor = $('#desc-editor').wysihtml5().data("wysihtml5").editor;
//editor.setValue("<?php echo set_value('description');?>");

</script>
</body>
