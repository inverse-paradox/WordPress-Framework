<form action="admin.php?page=ip_framework_nav_menus" method="post">
	<input type="hidden" name="action" value="save" />
	<div class="broken-table-header">
		<table class="widefat ipf ipf-options">
			<thead>
				<tr>
					<th class="label">Theme Location Label</th>
					<th class="slug">Theme Location Slug</th>
				</tr>
			</thead>
		</table>
	</div>
	<div class="broken-table-body" id="table-body">
		<?php if ($this->menus) { ?>
			<?php foreach ($this->menus as $menu) { ?>
			<div class="broken-table-row" id="row-<?php echo $menu['id']; ?>">
				<table class="widefat ipf ipf-options">
					<tbody>
						<tr>
							<td class="label">
								<strong><a href="#edit" class="row-title edit-row"><?php echo $menu['label']; ?></a></strong>
								<div class="row_options">
									<span><a href="#edit" class="edit-row">Edit</a> |</span>
									<span><a href="#duplicate" class="duplicate-row">Duplicate</a> |</span>
									<span><a href="#delete" class="delete-row">Delete</a></span>
								</div>
							</td>
							<td class="slug"><?php echo $menu['slug']; ?></td>
						</tr>
					</tbody>
				</table>
				<div class="field-options">
					<table class="widefat ipf-input">
						<tbody>
							<tr class="field-label">
								<td class="label">
									<label>Theme Location Label</label>
									<p>Theme location label for the menu admin screen.</p>
								</td>
								<td class="input">
									<input type="text" value="<?php esc_attr_e($menu['label']); ?>" name="options[<?php echo $menu['id']; ?>][label]" />
								</td>
							</tr>
							<tr class="field-slug">
								<td class="label">
									<label>Theme Location Slug</label>
									<p>Location slug for use in wp_nav_menu().</p>
								</td>
								<td class="input">
									<input type="text" value="<?php esc_attr_e($menu['slug']); ?>" name="options[<?php echo $menu['id']; ?>][slug]" />
								</td>
							</tr>
							<tr class="field-submit">
								<td class="label"></td>
								<td class="input"><a href="#close" class="button-secondary close-options-menus">Finish Editing &amp; Close Menu</a></td>
							</tr>
						</tbody>
					</table>
				</div><!--/field-options-->
			</div><!--/broken-table-row-->
			<?php } ?>
		<?php } else { ?>
		<div class="broken-table-row no-content">
			No nav menus.
		</div>
		<?php } ?>
	</div><!--/broken-table-body-->
	<div class="broken-table-footer">
		<table class="widefat ipf ipf-options">
			<tfoot>
				<tr>
					<th colspan="2" class="submit">
						<button id="add-row" class="button-primary">Add New Menu</button>
						<input type="submit" value="Save Changes to Menus" class="button-primary">
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
					<td class="label">
						<strong><a href="#edit" class="row-title edit-row"></a></strong>
						<div class="row_options">
							<span><a href="#edit" class="edit-row">Edit</a> |</span>
							<span><a href="#duplicate" class="duplicate-row">Duplicate</a> |</span>
							<span><a href="#delete" class="delete-row">Delete</a></span>
						</div>
					</td>
					<td class="slug"></td>
				</tr>
			</tbody>
		</table>
		<div class="field-options expanded">
			<table class="widefat ipf-input">
				<tbody>
					<tr class="field-label">
						<td class="label">
							<label>Theme Location Label</label>
							<p>Theme location label for the menu admin screen.</p>
						</td>
						<td class="input">
							<input type="text" />
						</td>
					</tr>
					<tr class="field-slug">
						<td class="label">
							<label>Theme Location Slug</label>
							<p>Location slug for use in wp_nav_menu().</p>
						</td>
						<td class="input">
							<input type="text" />
						</td>
					</tr>
					<tr class="field-submit">
						<td class="label"></td>
						<td class="input">
							<a href="#close" class="button-secondary close-options-menus">Finish Editing &amp; Close Menu</a>
							<a href="#cancel" class="button-secondary cancel-new">Cancel</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>