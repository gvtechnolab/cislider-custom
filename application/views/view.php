<h1>Make Slider</h1>
<div id="body">
<div class="body">
	<div class="row">
		<h3><?php print_r("Group  " . $rows[0]->group_id); ?></h3>
	</div>
	<div class="row">
		<ul class="bxslider">
			<?php 
			if($rows > 0)
			{
			foreach ($rows as $row){ ?>
			<li>
				<img src="<?php echo $this->config->base_url(). 'uploads/' . $row->photo; ?>" title="<?php echo $row->title; ?>" />
			</li>
			<?php } 
			}else { echo "no slides in group"; }?>
		</ul>	
		<div class="clear"></div>
	</div>
	<div class="row">
		<pre>
			<?php print_r($options);?>
		</pre>
	</div>
</div>
<script language="javascript" type="text/javascript">
	$(document).ready(function(){
		$('.bxslider').bxSlider({
			mode: "<?php echo $options->mode; ?>",
			captions: <?php echo $options->captions;?>,
			slideWidth: <?php echo $options->slideWidth;?>,
			minSlides: <?php echo $options->minSlides;?>,
			maxSlides: <?php echo $options->maxSlides;?>,
			moveSlides: <?php echo $options->moveSlides;?>,
			slideMargin: <?php echo $options->slideMargin;?>
		});
	});
</script>