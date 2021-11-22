<h1>Make Slider</h1>
<div id="body">
	<form action="" method="post">
		<div class="form-group">
			<label>Group</label>
			<select name="groupid" id="groupid">
				<option value="">Select</option>
				<?php foreach($rows as $row)
				{ ?>
					<option value="<?php echo $row->group_id; ?>"><?php echo $row->group_id . " " . $row->group_name; ?></option>
				<?php }?>
			</select>
		</div>
		<div class="form-group">
			<label>mode</label>
			<select name="mode">
				<option value="fade">Fade</option>
				<option value="horizontal">horizontal</option>
				<option value="vertical">vertical</option>
			</select>
		</div>
		<div class="form-group">
			<label>captions</label>
			<select name="captions">
				<option value="true">True</option>
				<option value="false">False</option>
			</select>
		</div>
		<div class="form-group">
			<label>is Carousel</label>
			<select name="iscarousel" id="iscarousel">
				<option value="false">False</option>
				<option value="true">True</option>
			</select>
		</div>
		<div id='carousel' style="display: none;">
		<div class="form-group">
		    <label>slideWidth:</label>
			<input type="text" name="slidewidth" id="slidewidth"/>
		</div>
		<div class="form-group">
		    <label>minSlides:</label>
			<input type="text" name="minslides" id="minslides"/>
		</div>
		<div class="form-group">
		    <label>maxSlides:</label>
			<input type="text" name="maxslides" id="maxslides"/>
		</div>
		<div class="form-group">
		    <label>moveSlides:</label>
			<input type="text" name="moveslides" id="moveslides"/>
		</div>
		<div class="form-group">
		    <label>slideMargin:</label>
			<input type="text" name="slidemargin" id="slidemargin"/>
		</div>
		</div>
		<div class="button">
			<input type="submit" value="submit" name="submit" />
		</div>
	</form>
</div>
<script language="javascript" type="text/javascript">
	$(document).ready(function(){
	console.log($('#iscarousel').val());
		$('#iscarousel').change(function(){
			if($(this).val() == 'true')
				$('#carousel').show();
			else
				$('#carousel').hide();
		});
	});
</script>