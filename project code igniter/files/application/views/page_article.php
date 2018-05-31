<?php $this->load->view('header'); ?>
<div class="container">

<?php if($article == '') { ?> <div class="alert alert-info">No record</div> <?php } else { ?>

	<h1><?php echo $article->name; ?></h1>

	<hr>
	<?php echo $article->detail; ?>
	<hr>

	<a href="<?php echo base_url(); ?>articles/">Back To Articles</a>

<?php  } ?>

</div>
<?php $this->load->view('footer'); ?>