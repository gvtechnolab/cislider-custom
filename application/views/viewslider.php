<h1>Make Slider</h1>
<div id="body">
<div class="body">
	<div class="row">
		<?php 
			foreach($group as $row){ ?>
			<a href="<?php echo $this->config->base_url() . 'index.php/slider/view?grid='. $row->group_id; ?>">
				<?php echo $row->group_id . "  " . $row->group_name;?>
			</a>
			<?php 
			}
		?>
		
		<div class="row thumslider">
			<ul id="bxSlider">
				<?php foreach ($rows as $slide){ ?>
					<li>
						<img src="<?php echo $this->config->base_url(). 'uploads/' . $slide->photo; ?>" title="<?php echo $slide->title; ?>" />
					</li>
				<?php } ?>
			</ul>
		</div>
	</div>
</div>
<script language="javascript" type="text/javascript">
	$(document).ready(function(){
		$('#bxSlider').bxSlider({
			mode: "<?php echo $options->mode; ?>",
			captions: "<?php echo $options->captions;?>"
		});	
	});
</script>