<form action="admin.php?page=ip_framework_widget_areas" method="post">
	<input type="hidden" name="action" value="save" />
	<div class="broken-table-header">
		<table class="widefat ipf ipf-options">
			<thead>
				<tr>
					<th class="name">Name</th>
					<th class="id">ID</th>
					<th class="description">Description</th>
				</tr>
			</thead>
		</table>
	</div>
	<div class="broken-table-body" id="table-body">
		<?php if ($this->sidebars) { ?>
			<?php foreach ($this->sidebars as $sidebar) { ?>
			<div class="broken-table-row" id="row-<?php echo $sidebar['id']; ?>">
				<table class="widefat ipf ipf-options">
					<tbody>
						<tr>
							<td class="name">
								<strong><a href="#edit" class="row-title edit-row"><?php echo $sidebar['name']; ?></a></strong>
								<div class="row_options">
									<span><a href="#edit" class="edit-row">Edit</a> |</span>
									<span><a href="#duplicate" class="duplicate-row">Duplicate</a> |</span>
									<span><a href="#delete" class="delete-row">Delete</a></span>
								</div>
							</td>
							<td class="id"><?php echo $sidebar['id']; ?></td>
							<td class="description"><?php echo $sidebar['description']; ?></td>
						</tr>
					</tbody>
				</table>
				<div class="field-options">
					<table class="widefat ipf-input">
						<tbody>
							<tr class="field-name">
								<td class="label">
									<label>Name</label>
									<p>Sidebar name (default is localized 'Sidebar' and numeric ID).</p>
								</td>
								<td class="input">
									<input type="text" value="<?php esc_attr_e($sidebar['name']); ?>" name="options[<?php echo $sidebar['id']; ?>][name]" />
								</td>
							</tr>
							<tr class="field-id">
								<td class="label">
									<label>ID</label>
									<p>Sidebar id - Must be all in lowercase, with no spaces (default is a numeric auto-incremented ID).</p>
								</td>
								<td class="input">
									<input type="text" value="<?php esc_attr_e($sidebar['id']); ?>" name="options[<?php echo $sidebar['id']; ?>][id]" />
								</td>
							</tr>
							<tr class="field-description">
								<td class="label">
									<label>Description</label>
									<p>Text description of what/where the sidebar is.</p>
								</td>
								<td class="input">
									<input type="text" value="<?php esc_attr_e($sidebar['description']); ?>" name="options[<?php echo $sidebar['id']; ?>][description]" />
								</td>
							</tr>
							<tr class="field-class">
								<td class="label">
									<label>Class</label>
									<p>CSS class name to assign to the widget HTML</p>
								</td>
								<td class="input">
									<input type="text" value="<?php esc_attr_e($sidebar['class']); ?>" name="options[<?php echo $sidebar['id']; ?>][class]" />
								</td>
							</tr>
							<tr class="field-before_widget">
								<td class="label">
									<label>Before Widget</label>
									<p>HTML to place before every widget</p>
								</td>
								<td class="input">
									<input type="text" value="<?php esc_attr_e($sidebar['before_widget']); ?>" name="options[<?php echo $sidebar['id']; ?>][before_widget]" />
								</td>
							</tr>
							<tr class="field-after_widget">
								<td class="label">
									<label>After Widget</label>
									<p>HTML to place after every widget</p>
								</td>
								<td class="input">
									<input type="text" value="<?php esc_attr_e($sidebar['after_widget']); ?>" name="options[<?php echo $sidebar['id']; ?>][after_widget]" />
								</td>
							</tr>
							<tr class="field-before_title">
								<td class="label">
									<label>Before Title</label>
									<p>HTML to place before every title</p>
								</td>
								<td class="input">
									<input type="text" value="<?php esc_attr_e($sidebar['before_title']); ?>" name="options[<?php echo $sidebar['id']; ?>][before_title]" />
								</td>
							</tr>
							<tr class="field-after_title">
								<td class="label">
									<label>After Title</label>
									<p>HTML to place after every title</p>
								</td>
								<td class="input">
									<input type="text" value="<?php esc_attr_e($sidebar['after_title']); ?>" name="options[<?php echo $sidebar['id']; ?>][after_title]" />
								</td>
							</tr>
							<tr class="field-submit">
								<td class="label"></td>
								<td class="input"><a href="#close" class="button-secondary close-options-sidebars">Finish Editing &amp; Close Sidebar</a></td>
							</tr>
						</tbody>
					</table>
				</div><!--/field-options-->
			</div><!--/broken-table-row-->
			<?php } ?>
		<?php } else { ?>
		<div class="broken-table-row no-content">
			No sidebars.
		</div>
		<?php } ?>
	</div><!--/broken-table-body-->
	<div class="broken-table-footer">
		<table class="widefat ipf ipf-options">
			<tfoot>
				<tr>
					<th colspan="2" class="submit">
						<button id="add-row" class="button-secondary">+ Add New Sidebar</button>
						<input type="submit" value="Save Changes to Sidebars" class="button-primary">
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
					<td class="id"></td>
					<td class="description"></td>
				</tr>
			</tbody>
		</table>
		<div class="field-options expanded">
			<table class="widefat ipf-input">
				<tbody>
					<tr class="field-name">
						<td class="label">
							<label>Name</label>
							<p>Sidebar name (default is localized 'Sidebar' and numeric ID).</p>
						</td>
						<td class="input">
							<input type="text" />
						</td>
					</tr>
					<tr class="field-id">
						<td class="label">
							<label>ID</label>
							<p>Sidebar id - Must be all in lowercase, with no spaces (default is a numeric auto-incremented ID).</p>
						</td>
						<td class="input">
							<input type="text" />
						</td>
					</tr>
					<tr class="field-description">
						<td class="label">
							<label>Description</label>
							<p>Text description of what/where the sidebar is.</p>
						</td>
						<td class="input">
							<input type="text" />
						</td>
					</tr>
					<tr class="field-class">
						<td class="label">
							<label>Class</label>
							<p>CSS class name to assign to the widget HTML</p>
						</td>
						<td class="input">
							<input type="text" />
						</td>
					</tr>
					<tr class="field-before_widget">
						<td class="label">
							<label>Before Widget</label>
							<p>HTML to place before every widget</p>
						</td>
						<td class="input">
							<input type="text" value="<div id=&quot;%1$s&quot; class=&quot;widget %2$s&quot;>" />
						</td>
					</tr>
					<tr class="field-after_widget">
						<td class="label">
							<label>After Widget</label>
							<p>HTML to place after every widget</p>
						</td>
						<td class="input">
							<input type="text" value="</div>" />
						</td>
					</tr>
					<tr class="field-before_title">
						<td class="label">
							<label>Before Title</label>
							<p>HTML to place before every title</p>
						</td>
						<td class="input">
							<input type="text" value="<h3 class=&quot;widgettitle&quot;>" />
						</td>
					</tr>
					<tr class="field-after_title">
						<td class="label">
							<label>After Title</label>
							<p>HTML to place after every title</p>
						</td>
						<td class="input">
							<input type="text" value="</h3>" />
						</td>
					</tr>
					<tr class="field-submit">
						<td class="label"></td>
						<td class="input"><a href="#close" class="button-secondary close-options-sidebars">Finish Editing &amp; Close Sidebar</a>
						<a href="#cancel" class="button-secondary cancel-new">Cancel</a></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>