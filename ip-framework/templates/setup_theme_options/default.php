<form action="admin.php?page=ip_framework_setup_theme_options" method="post">
	<input type="hidden" name="action" value="save" />
	<div class="broken-table-header">
		<table class="widefat ipf ipf-options">
			<thead>
				<tr>
					<th class="order">Order</th>
					<th class="label">Label</th>
					<th class="name">Name</th>
					<th class="type">Type</th>
				</tr>
			</thead>
		</table>
	</div>
	<div class="broken-table-body" id="table-body">
		<?php if ($this->options) { ?>
			<?php foreach ($this->options as $option) { ?>
			<div class="broken-table-row" id="row-<?php echo $option['id']; ?>">
				<table class="widefat ipf ipf-options">
					<tbody>
						<tr>
							<td class="order"><?php echo $option['order']; ?></td>
							<td class="label">
								<strong><a href="#edit" class="row-title edit-row"><?php echo $option['label']; ?></a></strong>
								<div class="row_options">
									<span><a href="#edit" class="edit-row">Edit</a> |</span>
									<span><a href="#duplicate" class="duplicate-row">Duplicate</a> |</span>
									<span><a href="#delete" class="delete-row">Delete</a></span>
								</div>
							</td>
							<td class="name"><?php echo $option['name']; ?></td>
							<td class="type"><?php echo $option['type']; ?></td>
						</tr>
					</tbody>
				</table>
				<div class="field-options">
					<table class="widefat ipf-input">
						<tbody>
							<tr class="field-label">
								<td class="label">
									<label>Field Label</label>
									<p>Appears on the theme options page</p>
								</td>
								<td class="input">
									<input type="text" value="<?php esc_attr_e($option['label']); ?>" name="options[<?php echo $option['id']; ?>][label]" />
								</td>
							</tr>
							<tr class="field-name">
								<td class="label">
									<label>Field Name</label>
									<p>Used for internal reference. No spaces. Automatically prefixed with &ldquo;ipf_&rdquo;.</p>
								</td>
								<td class="input">
									<input type="text" value="<?php esc_attr_e($option['name']); ?>" name="options[<?php echo $option['id']; ?>][name]" />
								</td>
							</tr>
							<tr class="field-type">
								<td class="label">
									<label>Field Type</label>
								</td>
								<td class="input">
									<select name="options[<?php echo $option['id']; ?>][type]">
										<option value="Text" <?php if ($option['type'] == 'Text') echo 'selected="selected"'; ?>>Text</option>
										<option value="Textarea" <?php if ($option['type'] == 'Textarea') echo 'selected="selected"'; ?>>Textarea</option>
										<option value="Select" <?php if ($option['type'] == 'Select') echo 'selected="selected"'; ?>>Select</option>
										<option value="Radio" <?php if ($option['type'] == 'Radio') echo 'selected="selected"'; ?>>Radio Buttons</option>
										<option value="Checkbox" <?php if ($option['type'] == 'Checkbox') echo 'selected="selected"'; ?>>Checkboxes</option>
										<option value="Heading" <?php if ($option['type'] == 'Heading') echo 'selected="selected"'; ?>>Heading</option>
									</select>
								</td>
							</tr>
							<tr class="field-options">
								<td class="label">
									<label>Field Options</label>
									<p>One per line</p>
								</td>
								<td class="input">
									<textarea name="options[<?php echo $option['id']; ?>][options]"><?php echo esc_textarea($option['options']); ?></textarea>
								</td>
							</tr>
							<tr class="field-instructions">
								<td class="label">
									<label>Field Instructions</label>
									<p>Appears on the theme options page underneath the input field</p>
								</td>
								<td class="input">
									<textarea name="options[<?php echo $option['id']; ?>][instructions]"><?php echo esc_textarea($option['instructions']); ?></textarea>
								</td>
							</tr>
							<tr class="field-default">
								<td class="label">
									<label>Default Value</label>
								</td>
								<td class="input">
									<input type="text" value="<?php esc_attr_e($option['default']); ?>" name="options[<?php echo $option['id']; ?>][default]" />
								</td>
							</tr>
							<tr class="field-order">
								<td class="label">
									<label>Order</label>
								</td>
								<td class="input">
									<input type="text" value="<?php esc_attr_e($option['order']); ?>" name="options[<?php echo $option['id']; ?>][order]" />
								</td>
							</tr>
							<tr class="field-submit">
								<td class="label"></td>
								<td class="input"><a href="#close" class="button-secondary close-options">Finish Editing &amp; Close Field</a></td>
							</tr>
						</tbody>
					</table>
				</div><!--/field-options-->
			</div><!--/broken-table-row-->
			<?php } ?>
		<?php } else { ?>
		<div class="broken-table-row no-content">
			No theme options.
		</div>
		<?php } ?>
	</div><!--/broken-table-body-->
	<div class="broken-table-footer">
		<table class="widefat ipf ipf-options">
			<tfoot>
				<tr>
					<th colspan="4" class="submit">
						<button id="add-row" class="button-primary">Add New Field</button>
						<input type="submit" value="Save Fields" class="button-primary">
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
					<td class="order"></td>
					<td class="label">
						<strong><a href="#edit" class="row-title edit-row"></a></strong>
						<div class="row_options">
							<span><a href="#edit" class="edit-row">Edit</a> |</span>
							<span><a href="#duplicate" class="duplicate-row">Duplicate</a> |</span>
							<span><a href="#delete" class="delete-row">Delete</a></span>
						</div>
					</td>
					<td class="name"></td>
					<td class="type"></td>
				</tr>
			</tbody>
		</table>
		<div class="field-options expanded">
			<table class="widefat ipf-input">
				<tbody>
					<tr class="field-label">
						<td class="label">
							<label>Field Label</label>
							<p>Appears on the theme options page</p>
						</td>
						<td class="input">
							<input type="text" />
						</td>
					</tr>
					<tr class="field-name">
						<td class="label">
							<label>Field Name</label>
							<p>Used for internal reference. No spaces. Automatically prefixed with &ldquo;ipf_&rdquo;.</p>
						</td>
						<td class="input">
							<input type="text" />
						</td>
					</tr>
					<tr class="field-type">
						<td class="label">
							<label>Field Type</label>
						</td>
						<td class="input">
							<select>
								<option value="Text">Text</option>
								<option value="Textarea">Textarea</option>
								<option value="Select">Select</option>
								<option value="Radio">Radio Buttons</option>
								<option value="Checkbox">Checkboxes</option>
								<option value="Heading">Heading</option>
							</select>
						</td>
					</tr>
					<tr class="field-options">
						<td class="label">
							<label>Field Options</label>
							<p>One per line</p>
						</td>
						<td class="input">
							<textarea></textarea>
						</td>
					</tr>
					<tr class="field-instructions">
						<td class="label">
							<label>Field Instructions</label>
							<p>Appears on the theme options page underneath the input field</p>
						</td>
						<td class="input">
							<textarea></textarea>
						</td>
					</tr>
					<tr class="field-default">
						<td class="label">
							<label>Default Value</label>
						</td>
						<td class="input">
							<input type="text" />
						</td>
					</tr>
					<tr class="field-order">
						<td class="label">
							<label>Order</label>
						</td>
						<td class="input">
							<input type="text" />
						</td>
					</tr>
					<tr class="field-submit">
						<td class="label"></td>
						<td class="input">
							<a href="#" class="button-secondary close-options">Finish Editing &amp; Close Field</a>
							<a href="#cancel" class="button-secondary cancel-new">Cancel</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>