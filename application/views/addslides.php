<h1>Make Slider</h1>
<div id="body">
	<form action="" method="post" enctype="multipart/form-data">
		<div class="input-group">
			<label>Group</label>
			<select name="groupid" id="groupid">
				<option value="">Select</option>
				<?php foreach($rows as $row)
				{ ?>
					<option value="<?php echo $row->group_id; ?>"><?php echo $row->group_id . " " . $row->group_name; ?></option>
				<?php }?>
			</select>
		</div>
		<div class="input-group">
			<label>title</label>
			<input type="text" name="title" id="title"/>
		</div>
		<div class="input-group">
			<label>upload photos : </label>
			<input type="file" name="userfile" id="userfile"/>
		</div>
		<div class="button">
			<input type="submit" name="submit" value="Add"/>
		</div>
	</form>
</div>