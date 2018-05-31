<?php $this->load->view('header'); ?>
<div class="container">

<h1>Articles</h1>
<hr>

<p>

<?php
/*
	$query = $this->db->query("SELECT * FROM articles");
	if ($query->num_rows() > 0) 
		{ 
			echo "Total articles: <span class='badge'>" . $query->num_rows() . "</span>"; 

			foreach ($query->result() as $row)
			{ ?>

					<ul class="list-unstyled">
						<li><a href="<?php echo $row->permalink; ?>/"><?php echo $row->name; ?></a></li>
					</ul>	


			<?php }
   	   }
		
    else { ?>
	<div class="alert alert-info">No records</div>
    <?php }
*/
?>


<?php
if(!isset($articles)) { ?> <div class="alert alert-info">No records</div> <?php } else 
   { 

   	//echo "Total articles: <span class='badge'>" . $articles['num'] . "</span>"; 

        ?>

          <ul class="list-unstyled">
	          <?php 
			  foreach($articles as $row) 
			  { ?>

					<li>
						<h4><?php echo $row['id']; ?> - <a href="<?php echo base_url(); ?>articles/<?php echo $row['id']; ?>/<?php echo $row['permalink']; ?>/">
							<?php echo $row['name']; ?>
						</a></h4>
						<p><?php echo substr(strip_tags($row['detail']),0,100).".."; ?>
						<br>
						<a href="<?php echo base_url(); ?>articles/<?php echo $row['id']; ?>/<?php echo $row['permalink']; ?>/">Read more</a>
						</p>
						<br>
					</li>
	
			  <?php } ?>
		  </ul>

		  <?php
	}
?>


</p>

	<div>
		<?php 
		// echo $this->pagination->create_links(); 
		// echo $this->pagination->create_links();
		// echo $pagination;
		echo $pages;
		?>
	</div>

<p>
	
	


</p>

</div>
<?php $this->load->view('footer'); ?>