<link href="<?php echo base_url('assets/bootstrap-wysihtml5/css/bootstrap-wysihtml5.css') ?>" rel="stylesheet" media="screen">
<!-- <link href="<?php echo base_url('assets/bootstrap-wysihtml5/css/bootstrap3-wysiwyg5-color.css') ?>" rel="stylesheet" media="screen"> -->
<script src="<?php echo base_url('assets/bootstrap-wysihtml5/js/wysihtml5-0.3.0.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap-wysihtml5/js/bootstrap3-wysihtml5.js') ?>"></script>
<script type="text/javascript" charset="utf-8">
     $(document).ready(function() {
         // Prevent duplicate initialization
         $('.textarea-wysihtml5').not('.wysihtml5-sandbox').each(function() {
             if (!$(this).next('.wysihtml5-toolbar').length) {
                 $(this).wysihtml5({
                     "font-styles": true, 
                     "emphasis": true, 
                     "lists": true,
                     "html": true,
                     "link": true, 
                     "image": false
                 });
             }
         });
     });
</script>