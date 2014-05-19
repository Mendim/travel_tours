<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <?php $this->load->view('meta_view'); ?>
</head>
<body>
<?php $this->load->view('header_view'); ?>

Thank you! Our team will contact you shortly.

<?php $this->load->view('footer_view'); ?>
<script type="text/javascript">
    function updateTextInput(val) {
        document.getElementById('textInput').value=val; 
    }

$(function(){
    $('#desc-editor').editable({inlineMode: false, imageUploadURL: '<?php echo site_url('offers/upload');?>'})
});


</script>
</body>
