<form action="admin.php?page=ip_framework_image_sizes" method="post">
	<input type="hidden" name="action" value="save" />
	<div class="broken-table-header">
		<table class="widefat ipf ipf-options">
			<thead>
				<tr>
					<th class="name">Name</th>
					<th class="width">Width</th>
					<th class="height">Height</th>
					<th class="crop">Crop</th>
				</tr>
			</thead>
		</table>
	</div>
	<div class="broken-table-body" id="table-body">
		<?php if ($this->sizes) { ?>
			<?php foreach ($this->sizes as $size) { ?>
			<div class="broken-table-row" id="row-<?php echo $size['id']; ?>">
				<table class="widefat ipf ipf-options">
					<tbody>
						<tr>
							<td class="name">
								<strong><a href="#edit" class="row-title edit-row"><?php echo $size['name']; ?></a></strong>
								<div class="row_options">
									<span><a href="#edit" class="edit-row">Edit</a> |</span>
									<span><a href="#duplicate" class="duplicate-row">Duplicate</a> |</span>
									<span><a href="#delete" class="delete-row">Delete</a></span>
								</div>
							</td>
							<td class="width"><?php echo $size['width']; ?></td>
							<td class="height"><?php echo $size['height']; ?></td>
							<td class="crop"><?php echo ($size['crop'] === true) ? 'true' : 'false'; ?></td>
						</tr>
					</tbody>
				</table>
				<div class="field-options">
					<table class="widefat ipf-input">
						<tbody>
							<tr class="field-name">
								<td class="label">
									<label>Name</label>
									<p>The new image size name.</p>
								</td>
								<td class="input">
									<input type="text" value="<?php esc_attr_e($size['name']); ?>" name="options[<?php echo $size['id']; ?>][name]" />
								</td>
							</tr>
							<tr class="field-width">
								<td class="label">
									<label>Width</label>
								</td>
								<td class="input">
									<input type="text" value="<?php esc_attr_e($size['width']); ?>" name="options[<?php echo $size['id']; ?>][width]" />
								</td>
							</tr>
							<tr class="field-height">
								<td class="label">
									<label>Height</label>
								</td>
								<td class="input">
									<input type="text" value="<?php esc_attr_e($size['height']); ?>" name="options[<?php echo $size['id']; ?>][height]" />
								</td>
							</tr>
							<tr class="field-crop">
								<td class="label">
									<label>Crop</label>
									<p>Hard crop the image.</p>
								</td>
								<td class="input">
									<label><input type="radio" name="options[<?php echo $size['id']; ?>][crop]" value="true" <?php if ($size['crop'] === true) echo 'checked="checked"'; ?>> Yes</label>
									&nbsp;
									<label><input type="radio" name="options[<?php echo $size['id']; ?>][crop]" value="false" <?php if ($size['crop'] === false) echo 'checked="checked"'; ?>> No</label>
								</td>
							</tr>
							<tr class="field-submit">
								<td class="label"></td>
								<td class="input"><a href="#close" class="button-secondary close-options-sizes">Finish Editing &amp; Close Image Size</a></td>
							</tr>
						</tbody>
					</table>
				</div><!--/field-options-->
			</div><!--/broken-table-row-->
			<?php } ?>
		<?php } else { ?>
		<div class="broken-table-row no-content">
			No image sizes.
		</div>
		<?php } ?>
	</div><!--/broken-table-body-->
	<div class="broken-table-footer">
		<table class="widefat ipf ipf-options">
			<tfoot>
				<tr>
					<th colspan="2" class="submit">
						<button id="add-row" class="button">+ Add New Image Size</button>
						<input type="submit" value="Save Changes to Image Sizes" class="button-primary">
					</th>
				</tr>
			</tfoot>
		</table>
	</div><!--/broken-table-footer-->
</form>

<div id="blank-field">
	<div class="broken-table-row">
		<table class="widefat ipf ipf-options">
			<tbody>
				<tr>
					<td class="name">
						<strong><a href="#edit" class="row-title edit-row"></a></strong>
						<div class="row_options">
							<span><a href="#edit" class="edit-row">Edit</a> |</span>
							<span><a href="#duplicate" class="duplicate-row">Duplicate</a> |</span>
							<span><a href="#delete" class="delete-row">Delete</a></span>
						</div>
					</td>
					<td class="width"></td>
					<td class="height"></td>
					<td class="crop"></td>
				</tr>
			</tbody>
		</table>
		<div class="field-options expanded">
			<table class="widefat ipf-input">
				<tbody>
					<tr class="field-name">
						<td class="label">
							<label>Name</label>
							<p>The new image size name.</p>
						</td>
						<td class="input">
							<input type="text" />
						</td>
					</tr>
					<tr class="field-width">
						<td class="label">
							<label>Width</label>
						</td>
						<td class="input">
							<input type="text" />
						</td>
					</tr>
					<tr class="field-height">
						<td class="label">
							<label>Height</label>
						</td>
						<td class="input">
							<input type="text" />
						</td>
					</tr>
					<tr class="field-crop">
						<td class="label">
							<label>Crop</label>
							<p>Hard crop the image.</p>
						</td>
						<td class="input">
							<label><input type="radio" value="true"> Yes</label>
							<label><input type="radio" value="false"> No</label>
						</td>
					</tr>
					<tr class="field-submit">
						<td class="label"></td>
						<td class="input">
							<a href="#close" class="button-secondary close-options-sizes">Finish Editing &amp; Close Image Size</a>
							<a href="#cancel" class="button-secondary cancel-new">Cancel</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>