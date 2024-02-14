<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,400,300,600,700' rel='stylesheet' type='text/css'>
<!-- Bootstrap core CSS -->
<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.css') ?>" rel="stylesheet" media="screen">

<!-- Font Awesome -->
<link href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" media="screen">

<!-- Custom CSS  -->
<link href="<?php echo base_url('assets/css/front.css') ?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url('assets/css/responsivenew.css') ?>" rel="stylesheet" media="screen">

<?php if (isset($mock)) {

	$Description =  "Quiz Master : " . $mock->created_byy . ', Total Questions : ' . $mock->random_ques_no;

?>


	<meta property="og:title" content="<?= $mock->title_name; ?>">
	<meta property="og:site_name" content="Digital Shiksha Darpan">
	<meta property="og:url" content="<?php echo base_url('exam_control/view_exam_summery') . '/' . $mock->title_id; ?>">
	<meta property="og:description" content="<?= $Description; ?>">
	<meta property="og:image:secure_url" content="<?php echo base_url('logo.png') ?>">
<?php } ?>


<?php if (isset($post)) { ?>

	<meta property="og:title" content="<?= $post->blog_title; ?>">
	<meta property="og:site_name" content="Digital Shiksha Darpan">
	<meta property="og:url" content="<?php echo base_url('blog/post') . '/' . $post->blog_id; ?>">
	<meta property="og:description" content="<?= $post->blog_short_body; ?>">
	<meta property="og:image:secure_url" content="<?php echo base_url('logo.png') ?>">
<?php } ?>


<style>
	span {
		word-break: normal !important;
	}
</style>

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="<?php echo base_url('assets/js/jquery-2.0.3.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/loadingoverlay.js') ?>"></script>
<!-- <script src="<?php echo base_url('assets/js/video.js') ?>"></script> -->