<form action="admin.php?page=ip_framework_custom_post_types" method="post">
	<input type="hidden" name="action" value="save" />
	<div class="broken-table-header">
		<table class="widefat ipf ipf-options">
			<thead>
				<tr>
					<th class="label">Name</th>
					<th class="name">Label</th>
					<th class="description">Description</th>
					<th class="type">Capability Type</th>
				</tr>
			</thead>
		</table>
	</div>
	<div class="broken-table-body" id="table-body">
		<?php if ($this->post_types) { ?>
			<?php foreach ($this->post_types as $post_type) { ?>
			<div class="broken-table-row" id="row-<?php echo $post_type['id']; ?>">
				<table class="widefat ipf ipf-options">
					<tbody>
						<tr>
							<td class="label">
								<strong><a href="#edit" class="row-title edit-row"><?php echo $post_type['post_type']; ?></a></strong>
								<div class="row_options">
									<span><a href="#edit" class="edit-row">Edit</a> |</span>
									<span><a href="#duplicate" class="duplicate-row">Duplicate</a> |</span>
									<span><a href="#delete" class="delete-row">Delete</a></span>
								</div>
							</td>
							<td class="name"><?php echo $post_type['args']['labels']['name']; ?></td>
							<td class="description"><?php echo $post_type['args']['description']; ?></td>
							<td class="type"><?php echo $post_type['args']['capability_type']; ?></td>
						</tr>
					</tbody>
				</table>
				<div class="field-options collapsed">
					<table class="widefat ipf-input">
						<tbody>
							<tr class="field-post_type">
								<td class="label">
									<label>Post Type Name</label>
									<p>Max. 16 characters, can not contain capital letters or spaces. Automatically prefixed with &ldquo;ipf_&rdquo;.</p>
								</td>
								<td class="input">
									<input type="text" value="<?php esc_attr_e($post_type['post_type']); ?>" name="options[<?php echo $post_type['id']; ?>][post_type]" />
								</td>
							</tr>
							<tr class="field-label-name">
								<td class="label">
									<label>Plural Label</label>
									<p>General name for the post type.</p>
								</td>
								<td class="input">
									<input type="text" value="<?php esc_attr_e($post_type['args']['labels']['name']); ?>" name="options[<?php echo $post_type['id']; ?>][label-name]" />
								</td>
							</tr>
							<tr class="field-label-singular_name">
								<td class="label">
									<label>Singular Label</label>
								</td>
								<td class="input">
									<input type="text" value="<?php esc_attr_e($post_type['args']['labels']['singular_name']); ?>" name="options[<?php echo $post_type['id']; ?>][label-singular_name]" />
								</td>
							</tr>
							<tr class="field-args-description">
								<td class="label">
									<label>Description</label>
									<p>A short descriptive summary of what the post type is.</p>
								</td>
								<td class="input">
									<textarea name="options[<?php echo $post_type['id']; ?>][args-description]"><?php echo esc_textarea($post_type['args']['description']); ?></textarea>
								</td>
							</tr>
							<tr class="field-args-capability_type">
								<td class="label">
									<label>Capability Type</label>
								</td>
								<td class="input">
									<select name="options[<?php echo $post_type['id']; ?>][args-capability_type]">
										<option value="post" <?php if ($post_type['args']['capability_type'] == 'post') echo 'selected="selected"'; ?>>Post</option>
										<option value="page" <?php if ($post_type['args']['capability_type'] == 'page') echo 'selected="selected"'; ?>>Page</option>
									</select>
								</td>
							</tr>
							<tr class="field-args-hierarchical">
								<td class="label">
									<label>Hierarchical</label>
									<p>Whether a parent can be specified. The 'supports' parameter should contain 'page-attributes' to show the parent select box on the editor page.</p>
								</td>
								<td class="input">
									<label><input type="radio" name="options[<?php echo $post_type['id']; ?>][args-hierarchical]" value="true" <?php if ($post_type['args']['hierarchical'] === true) echo 'checked="checked"'; ?> /> True</label><br />
									<label><input type="radio" value="false" name="options[<?php echo $post_type['id']; ?>][args-hierarchical]" <?php if ($post_type['args']['hierarchical'] === false) echo 'checked="checked"'; ?> /> False</label>
								</td>
							</tr>
							<tr class="field-args-public">
								<td class="label">
									<label>Public</label>
									<p>Whether a post type is intended to be used publicly either via the admin interface or by front-end users.</p>
								</td>
								<td class="input">
									<label><input type="radio" value="true" name="options[<?php echo $post_type['id']; ?>][args-public]" <?php if ($post_type['args']['public'] === true) echo 'checked="checked"'; ?> /> True</label><br />
									<label><input type="radio" value="false" name="options[<?php echo $post_type['id']; ?>][args-public]" <?php if ($post_type['args']['public'] === false) echo 'checked="checked"'; ?> /> False</label>
								</td>
							</tr>
							<tr class="field-args-rewrite">
								<td class="label">
									<label>Rewrite</label>
									<p>Enable rewrites for this post type.</p>
								</td>
								<td class="input">
									<label><input type="radio" value="true" name="options[<?php echo $post_type['id']; ?>][args-rewrite]" <?php if ($post_type['args']['rewrite'] !== false) echo 'checked="checked"'; ?> /> True</label><br />
									<label><input type="radio" value="false" name="options[<?php echo $post_type['id']; ?>][args-rewrite]" <?php if ($post_type['args']['rewrite'] === false) echo 'checked="checked"'; ?> /> False</label>
								</td>
							</tr>
							<tr class="field-args-rewrite_slug">
								<td class="label">
									<label>Rewrite Slug</label>
								</td>
								<td class="input">
									<input type="text" name="options[<?php echo $post_type['id']; ?>][args-rewrite_slug]" value="<?php echo esc_attr_e($post_type['args']['rewrite']['slug']); ?>" />
								</td>
							</tr>
							<tr class="field-args-supports">
								<td class="label">
									<label>Supports</label>
									<p><a href="http://codex.wordpress.org/Function_Reference/add_post_type_support" target="_blank">Features</a> supported by this post type.</p>
								</td>
								<td class="input">
									<label><input type="checkbox" name="options[<?php echo $post_type['id']; ?>][args-supports][]" value="title" <?php if (in_array('title', $post_type['args']['supports'])) echo 'checked="checked"'; ?> /> Title</label><br />
									<label><input type="checkbox" name="options[<?php echo $post_type['id']; ?>][args-supports][]" value="editor" <?php if (in_array('editor', $post_type['args']['supports'])) echo 'checked="checked"'; ?> /> Editor</label><br />
									<label><input type="checkbox" name="options[<?php echo $post_type['id']; ?>][args-supports][]" value="author" <?php if (in_array('author', $post_type['args']['supports'])) echo 'checked="checked"'; ?> /> Author</label><br />
									<label><input type="checkbox" name="options[<?php echo $post_type['id']; ?>][args-supports][]" value="thumbnail" <?php if (in_array('thumbnail', $post_type['args']['supports'])) echo 'checked="checked"'; ?> /> Thumbnail</label><br />
									<label><input type="checkbox" name="options[<?php echo $post_type['id']; ?>][args-supports][]" value="excerpt" <?php if (in_array('excerpt', $post_type['args']['supports'])) echo 'checked="checked"'; ?> /> Excerpt</label><br />
									<label><input type="checkbox" name="options[<?php echo $post_type['id']; ?>][args-supports][]" value="trackbacks" <?php if (in_array('trackbacks', $post_type['args']['supports'])) echo 'checked="checked"'; ?> /> Trackbacks</label><br />
									<label><input type="checkbox" name="options[<?php echo $post_type['id']; ?>][args-supports][]" value="custom-fields" <?php if (in_array('custom-fields', $post_type['args']['supports'])) echo 'checked="checked"'; ?> /> Custom Fields</label><br />
									<label><input type="checkbox" name="options[<?php echo $post_type['id']; ?>][args-supports][]" value="comments" <?php if (in_array('comments', $post_type['args']['supports'])) echo 'checked="checked"'; ?> /> Comments</label><br />
									<label><input type="checkbox" name="options[<?php echo $post_type['id']; ?>][args-supports][]" value="revisions" <?php if (in_array('revisions', $post_type['args']['supports'])) echo 'checked="checked"'; ?> /> Revisions</label><br />
									<label><input type="checkbox" name="options[<?php echo $post_type['id']; ?>][args-supports][]" value="page-attributes" <?php if (in_array('page-attributes', $post_type['args']['supports'])) echo 'checked="checked"'; ?> /> Page Attributes</label><br />
									<label><input type="checkbox" name="options[<?php echo $post_type['id']; ?>][args-supports][]" value="post-formats" <?php if (in_array('post-formats', $post_type['args']['supports'])) echo 'checked="checked"'; ?> /> Post Formats</label>
								</td>
							</tr>
							<tr class="field-args-taxonomies">
								<td class="label">
									<label>Taxonomies</label>
								</td>
								<td class="input">
									<select multiple="multiple" name="options[<?php echo $post_type['id']; ?>][args-taxonomies][]">
									<?php foreach ($this->taxonomies as $tax_name => $tax_label) { ?>
										<option value="<?php echo $tax_name; ?>" <?php if (in_array($tax_name, $post_type['args']['taxonomies'])) echo 'selected="selected"'; ?>><?php echo $tax_label; ?></option>
									<?php } ?>
									</select>
								</td>
							</tr>
							<tr class="field-submit">
								<td class="label"></td>
								<td class="input">
									<a href="#close" class="button-secondary close-options-cpt">Finish Editing &amp; Close</a>
								</td>
							</tr>
						</tbody>
					</table>
					<div class="tab advanced-labels">
						<a href="#advanced-labels" class="tab-link">Advanced Labels</a>
						<table class="widefat ipf-input">
							<tbody>
								<tr class="field-label-add_new">
									<td class="label">
										<label>Add New</label>
										<p>Default: &ldquo;Add New&rsquo;</p>
									</td>
									<td class="input">
										<input type="text" name="options[<?php echo $post_type['id']; ?>][label-add_new]" value="<?php esc_attr_e($post_type['args']['labels']['add_new']); ?>" />
									</td>
								</tr>
								<tr class="field-label-all_items">
									<td class="label">
										<label>All Items</label>
										<p>Default: plural name label</p>
									</td>
									<td class="input">
										<input type="text" name="options[<?php echo $post_type['id']; ?>][label-all_items]" value="<?php esc_attr_e($post_type['args']['labels']['all_items']); ?>" />
									</td>
								</tr>
								<tr class="field-label-add_new_item">
									<td class="label">
										<label>Add New Item</label>
										<p>Default: &ldquo;Add New Post&rsquo; / &ldquo;Add New Page&rsquo;</p>
									</td>
									<td class="input">
										<input type="text" name="options[<?php echo $post_type['id']; ?>][label-add_new_item]" value="<?php esc_attr_e($post_type['args']['labels']['add_new_item']); ?>" />
									</td>
								</tr>
								<tr class="field-label-edit_item">
									<td class="label">
										<label>Edit Item</label>
										<p>Default: &ldquo;Edit Post&rsquo; / &ldquo;Edit Page&rsquo;</p>
									</td>
									<td class="input">
										<input type="text" name="options[<?php echo $post_type['id']; ?>][label-edit_item]" value="<?php esc_attr_e($post_type['args']['labels']['edit_item']); ?>" />
									</td>
								</tr>
								<tr class="field-label-new_item">
									<td class="label">
										<label>New Item</label>
										<p>Default: &ldquo;New Post&rsquo; / &ldquo;New Page&rsquo;</p>
									</td>
									<td class="input">
										<input type="text" name="options[<?php echo $post_type['id']; ?>][label-new_item]" value="<?php esc_attr_e($post_type['args']['labels']['new_item']); ?>" />
									</td>
								</tr>
								<tr class="field-label-view_item">
									<td class="label">
										<label>View Item</label>
										<p>Default: &ldquo;View Post&rsquo; / &ldquo;View Page&rsquo;</p>
									</td>
									<td class="input">
										<input type="text" name="options[<?php echo $post_type['id']; ?>][label-view_item]" value="<?php esc_attr_e($post_type['args']['labels']['view_item']); ?>" />
									</td>
								</tr>
								<tr class="field-label-search_items">
									<td class="label">
										<label>Search Items</label>
										<p>Default: &ldquo;Search Posts&rsquo; / &ldquo;Search Pages&rsquo;</p>
									</td>
									<td class="input">
										<input type="text" name="options[<?php echo $post_type['id']; ?>][label-search_items]" value="<?php esc_attr_e($post_type['args']['labels']['search_items']); ?>" />
									</td>
								</tr>
								<tr class="field-label-not_found">
									<td class="label">
										<label>Not Found</label>
										<p>Default: &ldquo;No posts found&rsquo; / &ldquo;No pages found&rsquo;</p>
									</td>
									<td class="input">
										<input type="text" name="options[<?php echo $post_type['id']; ?>][label-not_found]" value="<?php esc_attr_e($post_type['args']['labels']['not_found']); ?>" />
									</td>
								</tr>
								<tr class="field-label-not_found_in_trash">
									<td class="label">
										<label>Not Found in Trash</label>
										<p>Default: &ldquo;No posts found in Trash&rsquo; / &ldquo;No pages found in Trash&rsquo;</p>
									</td>
									<td class="input">
										<input type="text" name="options[<?php echo $post_type['id']; ?>][label-not_found_in_trash]" value="<?php esc_attr_e($post_type['args']['labels']['not_found_in_trash']); ?>" />
									</td>
								</tr>
								<tr class="field-label-parent_item_colon">
									<td class="label">
										<label>Parent Item Colon</label>
										<p>Default: &ldquo;Parent Page&rsquo;</p>
									</td>
									<td class="input">
										<input type="text" name="options[<?php echo $post_type['id']; ?>][label-parent_item_colon]" value="<?php esc_attr_e($post_type['args']['labels']['parent_item_colon']); ?>" />
									</td>
								</tr>
								<tr class="field-label-menu_name">
									<td class="label">
										<label>Menu Name</label>
										<p>Default: plural name label</p>
									</td>
									<td class="input">
										<input type="text" name="options[<?php echo $post_type['id']; ?>][label-menu_name]" value="<?php esc_attr_e($post_type['args']['labels']['menu_name']); ?>" />
									</td>
								</tr>
								<tr class="field-submit">
									<td class="label"></td>
									<td class="input">
										<a href="#close" class="button-secondary close-options-cpt">Finish Editing &amp; Close</a>
									</td>
								</tr>
							</tbody>
						</table>
					</div><!--/advanced-labels-->
					<div class="tab advanced-capabilities">
						<a href="#advanced-labels" class="tab-link">Advanced Options</a>
						<table class="widefat ipf-input">
							<tbody>
								<tr class="field-args-exclude_from_search">
									<td class="label">
										<label>Exclude From Search</label>
										<p>Default: value of the opposite of the public argument</p>
									</td>
									<td class="input">
										<label><input type="radio" value="true" name="options[<?php echo $post_type['id']; ?>][args-exclude_from_search]" <?php if ($post_type['args']['exclude_from_search'] === true) echo 'checked="checked"'; ?> /> True</label><br />
										<label><input type="radio" value="false" name="options[<?php echo $post_type['id']; ?>][args-exclude_from_search]" <?php if ($post_type['args']['exclude_from_search'] === false) echo 'checked="checked"'; ?> /> False</label>
									</td>
								</tr>
								<tr class="field-args-publicly_queryable">
									<td class="label">
										<label>Publicly Queryable</label>
										<p>Default: value of the public argument</p>
									</td>
									<td class="input">
										<label><input type="radio" value="true" name="options[<?php echo $post_type['id']; ?>][args-publicly_queryable]" <?php if ($post_type['args']['publicly_queryable'] === true) echo 'checked="checked"'; ?> /> True</label><br />
										<label><input type="radio" value="false" name="options[<?php echo $post_type['id']; ?>][args-publicly_queryable]" <?php if ($post_type['args']['publicly_queryable'] === false) echo 'checked="checked"'; ?> /> False</label>
									</td>
								</tr>
								<tr class="field-args-show_ui">
									<td class="label">
										<label>Show UI</label>
										<p>Default: value of the public argument</p>
									</td>
									<td class="input">
										<label><input type="radio" value="true" name="options[<?php echo $post_type['id']; ?>][args-show_ui]" <?php if ($post_type['args']['show_ui'] === true) echo 'checked="checked"'; ?> /> True</label><br />
										<label><input type="radio" value="false" name="options[<?php echo $post_type['id']; ?>][args-show_ui]" <?php if ($post_type['args']['show_ui'] === false) echo 'checked="checked"'; ?> /> False</label>
									</td>
								</tr>
								<tr class="field-args-show_in_nav_menus">
									<td class="label">
										<label>Show in Nav Menus</label>
										<p>Default: value of the public argument</p>
									</td>
									<td class="input">
										<label><input type="radio" value="true" name="options[<?php echo $post_type['id']; ?>][args-show_in_nav_menus]" <?php if ($post_type['args']['show_in_nav_menus'] === true) echo 'checked="checked"'; ?> /> True</label><br />
										<label><input type="radio" value="false" name="options[<?php echo $post_type['id']; ?>][args-show_in_nav_menus]" <?php if ($post_type['args']['show_in_nav_menus'] === false) echo 'checked="checked"'; ?> /> False</label>
									</td>
								</tr>
								<tr class="field-args-show_in_menu">
									<td class="label">
										<label>Show in Menu</label>
										<p>Default: value of the show_ui argument</p>
									</td>
									<td class="input">
										<label><input type="radio" value="true" name="options[<?php echo $post_type['id']; ?>][args-show_in_menu]" <?php if ($post_type['args']['show_in_menu'] === true) echo 'checked="checked"'; ?> /> True</label><br />
										<label><input type="radio" value="false" name="options[<?php echo $post_type['id']; ?>][args-show_in_menu]" <?php if ($post_type['args']['show_in_menu'] === false) echo 'checked="checked"'; ?> /> False</label>
									</td>
								</tr>
								<tr class="field-args-show_in_admin_bar">
									<td class="label">
										<label>Show in Admin Bar</label>
										<p>Default: value of the show_in_menu argument</p>
									</td>
									<td class="input">
										<label><input type="radio" value="true" name="options[<?php echo $post_type['id']; ?>][args-show_in_admin_bar]" <?php if ($post_type['args']['show_in_admin_bar'] === true) echo 'checked="checked"'; ?> /> True</label><br />
										<label><input type="radio" value="false" name="options[<?php echo $post_type['id']; ?>][args-show_in_admin_bar]" <?php if ($post_type['args']['show_in_admin_bar'] === false) echo 'checked="checked"'; ?> /> False</label>
									</td>
								</tr>
								<tr class="field-args-menu_position">
									<td class="label">
										<label>Menu Position</label>
										<p>Default: below comments<br />
										5 - below Posts<br />
										10 - below Media<br />
										15 - below Links<br />
										20 - below Pages<br />
										25 - below comments<br />
										60 - below first separator<br />
										65 - below Plugins<br />
										70 - below Users<br />
										75 - below Tools<br />
										80 - below Settings<br />
										100 - below second separator
										</p>
									</td>
									<td class="input">
										<input type="text" name="options[<?php echo $post_type['id']; ?>][args-menu_position]" value="<?php esc_attr_e($post_type['args']['menu_position']); ?>" />
									</td>
								</tr>
								<tr class="field-args-menu_icon">
									<td class="label">
										<label>Menu Icon</label>
										<p>Default: posts icon</p>
									</td>
									<td class="input">
										<input type="text" name="options[<?php echo $post_type['id']; ?>][args-menu_icon]" value="<?php esc_attr_e($post_type['args']['menu_icon']); ?>" />
									</td>
								</tr>
								<tr class="field-args-capabilities">
									<td class="label">
										<label>Capabilities</label>
										<p>Default: capability_type is used to construct</p>
									</td>
									<td class="input">
										<textarea name="options[<?php echo $post_type['id']; ?>][args-capabilities]"><?php echo esc_textarea($post_type['args']['capabilities']); ?></textarea>
									</td>
								</tr>
								<tr class="field-args-has_archive">
									<td class="label">
										<label>Enable Archives</label>
									</td>
									<td class="input">
										<label><input type="radio" value="true" name="options[<?php echo $post_type['id']; ?>][args-enable_archives]" <?php if ($post_type['args']['enable_archives'] === true) echo 'checked="checked"'; ?> /> True</label><br />
										<label><input type="radio" value="false" name="options[<?php echo $post_type['id']; ?>][args-enable_archives]" <?php if ($post_type['args']['enable_archives'] === false) echo 'checked="checked"'; ?> /> False</label>
									</td>
								</tr>
								<tr class="field-args-query_var">
									<td class="label">
										<label>Query Var</label>
									</td>
									<td class="input">
										<label><input type="radio" value="true" name="options[<?php echo $post_type['id']; ?>][args-query_var]" <?php if ($post_type['args']['query_var'] == 'true') echo 'checked="checked"'; ?> /> True</label><br />
										<label><input type="radio" value="false" <?php if ($post_type['args']['query_var'] == 'false') echo 'checked="checked"'; ?> /> False</label><br />
										<label><input type="radio" value="string" <?php if ($post_type['args']['query_var'] == 'string') echo 'checked="checked"'; ?> /> String</label>
									</td>
								</tr>
								<tr class="field-submit">
									<td class="label"></td>
									<td class="input">
										<a href="#close" class="button-secondary close-options-cpt">Finish Editing &amp; Close</a>
									</td>
								</tr>
							</tbody>
						</table>
					</div><!--/advanced-labels-->
				</div>
			</div><!--/broken-table-row-->
			<?php } ?>
		<?php } else { ?>
		<div class="broken-table-row no-content">
			No custom post types.
		</div>
		<?php } ?>
	</div><!--/broken-table-body-->
	<div class="broken-table-footer">
		<table class="widefat ipf ipf-options">
			<tfoot>
				<tr>
					<th colspan="4" class="submit">
						<button id="add-row" class="button-primary">Add New Custom Post Type</button>
						<input type="submit" value="Save Changes to Custom Post Types" class="button-primary">
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
					<td class="name"></td>
					<td class="type"></td>
				</tr>
			</tbody>
		</table>
		<div class="field-options expanded">
			<table class="widefat ipf-input">
				<tbody>
					<tr class="field-post_type">
						<td class="label">
							<label>Post Type Name</label>
							<p>Max. 16 characters, can not contain capital letters or spaces. Automatically prefixed with &ldquo;ipf_&rdquo;.</p>
						</td>
						<td class="input">
							<input type="text" />
						</td>
					</tr>
					<tr class="field-label-name">
						<td class="label">
							<label>Plural Label</label>
							<p>General name for the post type.</p>
						</td>
						<td class="input">
							<input type="text" />
						</td>
					</tr>
					<tr class="field-label-singular_name">
						<td class="label">
							<label>Singular Label</label>
						</td>
						<td class="input">
							<input type="text" />
						</td>
					</tr>
					<tr class="field-args-description">
						<td class="label">
							<label>Description</label>
							<p>A short descriptive summary of what the post type is.</p>
						</td>
						<td class="input">
							<textarea></textarea>
						</td>
					</tr>
					<tr class="field-args-capability_type">
						<td class="label">
							<label>Capability Type</label>
						</td>
						<td class="input">
							<select>
								<option value="post" selected="selected">Post</option>
								<option value="page">Page</option>
							</select>
						</td>
					</tr>
					<tr class="field-args-hierarchical">
						<td class="label">
							<label>Hierarchical</label>
							<p>Whether a parent can be specified. The 'supports' parameter should contain 'page-attributes' to show the parent select box on the editor page.</p>
						</td>
						<td class="input">
							<label><input type="radio" value="true" /> True</label><br />
							<label><input type="radio" value="false" checked="checked" /> False</label>
						</td>
					</tr>
					<tr class="field-args-public">
						<td class="label">
							<label>Public</label>
							<p>Whether a post type is intended to be used publicly either via the admin interface or by front-end users.</p>
						</td>
						<td class="input">
							<label><input type="radio" value="true" /> True</label><br />
							<label><input type="radio" value="false" checked="checked" /> False</label>
						</td>
					</tr>
					<tr class="field-args-rewrite">
						<td class="label">
							<label>Rewrite</label>
							<p>Enable rewrites for this post type.</p>
						</td>
						<td class="input">
							<label><input type="radio" value="true" checked="checked" /> True</label><br />
							<label><input type="radio" value="false" /> False</label>
						</td>
					</tr>
					<tr class="field-args-rewrite_slug">
						<td class="label">
							<label>Rewrite Slug</label>
						</td>
						<td class="input">
							<input type="text" />
						</td>
					</tr>
					<tr class="field-args-supports">
						<td class="label">
							<label>Supports</label>
							<p><a href="http://codex.wordpress.org/Function_Reference/add_post_type_support" target="_blank">Features</a> supported by this post type.</p>
						</td>
						<td class="input">
							<label><input type="checkbox" value="title" checked="checked" /> Title</label><br />
							<label><input type="checkbox" value="editor" checked="checked" /> Editor</label><br />
							<label><input type="checkbox" value="author" /> Author</label><br />
							<label><input type="checkbox" value="thumbnail" /> Thumbnail</label><br />
							<label><input type="checkbox" value="excerpt" /> Excerpt</label><br />
							<label><input type="checkbox" value="trackbacks" /> Trackbacks</label><br />
							<label><input type="checkbox" value="custom-fields" /> Custom Fields</label><br />
							<label><input type="checkbox" value="comments" /> Comments</label><br />
							<label><input type="checkbox" value="revisions" /> Revisions</label><br />
							<label><input type="checkbox" value="page-attributes" /> Page Attributes</label><br />
							<label><input type="checkbox" value="post-formats" /> Post Formats</label>
						</td>
					</tr>
					<tr class="field-args-taxonomies">
						<td class="label">
							<label>Taxonomies</label>
						</td>
						<td class="input">
							<select multiple="multiple">
								<?php foreach ($this->taxonomies as $tax_name => $tax_label) { ?>
									<option value="<?php echo $tax_name; ?>"><?php echo $tax_label; ?></option>
								<?php } ?>
							</select>
						</td>
					</tr>
					<tr class="field-submit">
						<td class="label"></td>
						<td class="input">
							<a href="#close" class="button-secondary close-options-cpt">Finish Editing &amp; Close</a>
							<a href="#cancel" class="button-secondary cancel-new">Cancel</a>
						</td>
					</tr>
				</tbody>
			</table>
			<div class="tab advanced-labels">
				<a href="#advanced-labels" class="tab-link">Advanced Labels</a>
				<table class="widefat ipf-input">
					<tbody>
						<tr class="field-label-add_new">
							<td class="label">
								<label>Add New</label>
								<p>Default: &ldquo;Add New&rsquo;</p>
							</td>
							<td class="input">
								<input type="text" />
							</td>
						</tr>
						<tr class="field-label-all_items">
							<td class="label">
								<label>All Items</label>
								<p>Default: plural name label</p>
							</td>
							<td class="input">
								<input type="text" />
							</td>
						</tr>
						<tr class="field-label-add_new_item">
							<td class="label">
								<label>Add New Item</label>
								<p>Default: &ldquo;Add New Post&rsquo; / &ldquo;Add New Page&rsquo;</p>
							</td>
							<td class="input">
								<input type="text" />
							</td>
						</tr>
						<tr class="field-label-edit_item">
							<td class="label">
								<label>Edit Item</label>
								<p>Default: &ldquo;Edit Post&rsquo; / &ldquo;Edit Page&rsquo;</p>
							</td>
							<td class="input">
								<input type="text" />
							</td>
						</tr>
						<tr class="field-label-new_item">
							<td class="label">
								<label>New Item</label>
								<p>Default: &ldquo;New Post&rsquo; / &ldquo;New Page&rsquo;</p>
							</td>
							<td class="input">
								<input type="text" />
							</td>
						</tr>
						<tr class="field-label-view_item">
							<td class="label">
								<label>View Item</label>
								<p>Default: &ldquo;View Post&rsquo; / &ldquo;View Page&rsquo;</p>
							</td>
							<td class="input">
								<input type="text" />
							</td>
						</tr>
						<tr class="field-label-search_items">
							<td class="label">
								<label>Search Items</label>
								<p>Default: &ldquo;Search Posts&rsquo; / &ldquo;Search Pages&rsquo;</p>
							</td>
							<td class="input">
								<input type="text" />
							</td>
						</tr>
						<tr class="field-label-not_found">
							<td class="label">
								<label>Not Found</label>
								<p>Default: &ldquo;No posts found&rsquo; / &ldquo;No pages found&rsquo;</p>
							</td>
							<td class="input">
								<input type="text" />
							</td>
						</tr>
						<tr class="field-label-not_found_in_trash">
							<td class="label">
								<label>Not Found in Trash</label>
								<p>Default: &ldquo;No posts found in Trash&rsquo; / &ldquo;No pages found in Trash&rsquo;</p>
							</td>
							<td class="input">
								<input type="text" />
							</td>
						</tr>
						<tr class="field-label-parent_item_colon">
							<td class="label">
								<label>Parent Item Colon</label>
								<p>Default: &ldquo;Parent Page&rsquo;</p>
							</td>
							<td class="input">
								<input type="text" />
							</td>
						</tr>
						<tr class="field-label-menu_name">
							<td class="label">
								<label>Menu Name</label>
								<p>Default: plural name label</p>
							</td>
							<td class="input">
								<input type="text" />
							</td>
						</tr>
						<tr class="field-submit">
							<td class="label"></td>
							<td class="input">
								<a href="#close" class="button-secondary close-options-cpt">Finish Editing &amp; Close</a>
								<a href="#cancel" class="button-secondary cancel-new">Cancel</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div><!--/advanced-labels-->
			<div class="tab advanced-capabilities">
				<a href="#advanced-labels" class="tab-link">Advanced Options</a>
				<table class="widefat ipf-input">
					<tbody>
						<tr class="field-args-exclude_from_search">
							<td class="label">
								<label>Exclude From Search</label>
								<p>Default: value of the opposite of the public argument</p>
							</td>
							<td class="input">
								<label><input type="radio" value="true" /> True</label><br />
								<label><input type="radio" value="false" /> False</label>
							</td>
						</tr>
						<tr class="field-args-publicly_queryable">
							<td class="label">
								<label>Publicly Queryable</label>
								<p>Default: value of the public argument</p>
							</td>
							<td class="input">
								<label><input type="radio" value="true" /> True</label><br />
								<label><input type="radio" value="false" /> False</label>
							</td>
						</tr>
						<tr class="field-args-show_ui">
							<td class="label">
								<label>Show UI</label>
								<p>Default: value of the public argument</p>
							</td>
							<td class="input">
								<label><input type="radio" value="true" /> True</label><br />
								<label><input type="radio" value="false" /> False</label>
							</td>
						</tr>
						<tr class="field-args-show_in_nav_menus">
							<td class="label">
								<label>Show in Nav Menus</label>
								<p>Default: value of the public argument</p>
							</td>
							<td class="input">
								<label><input type="radio" value="true" /> True</label><br />
								<label><input type="radio" value="false" /> False</label>
							</td>
						</tr>
						<tr class="field-args-show_in_menu">
							<td class="label">
								<label>Show in Menu</label>
								<p>Default: value of the show_ui argument</p>
							</td>
							<td class="input">
								<label><input type="radio" value="true" /> True</label><br />
								<label><input type="radio" value="false" /> False</label>
							</td>
						</tr>
						<tr class="field-args-show_in_admin_bar">
							<td class="label">
								<label>Show in Admin Bar</label>
								<p>Default: value of the show_in_menu argument</p>
							</td>
							<td class="input">
								<label><input type="radio" value="true" /> True</label><br />
								<label><input type="radio" value="false" /> False</label>
							</td>
						</tr>
						<tr class="field-args-menu_position">
							<td class="label">
								<label>Menu Position</label>
								<p>Default: below comments<br />
								5 - below Posts<br />
								10 - below Media<br />
								15 - below Links<br />
								20 - below Pages<br />
								25 - below comments<br />
								60 - below first separator<br />
								65 - below Plugins<br />
								70 - below Users<br />
								75 - below Tools<br />
								80 - below Settings<br />
								100 - below second separator
								</p>
							</td>
							<td class="input">
								<input type="text" />
							</td>
						</tr>
						<tr class="field-args-menu_icon">
							<td class="label">
								<label>Menu Icon</label>
								<p>Default: posts icon</p>
							</td>
							<td class="input">
								<input type="text" />
							</td>
						</tr>
						<tr class="field-args-capabilities">
							<td class="label">
								<label>Capabilities</label>
								<p>Default: capability_type is used to construct</p>
							</td>
							<td class="input">
								<textarea></textarea>
							</td>
						</tr>
						<tr class="field-args-has_archive">
							<td class="label">
								<label>Enable Archives</label>
							</td>
							<td class="input">
								<label><input type="radio" value="true" /> True</label><br />
								<label><input type="radio" value="false" /> False</label>
							</td>
						</tr>
						<tr class="field-args-query_var">
							<td class="label">
								<label>Query Var</label>
							</td>
							<td class="input">
								<label><input type="radio" value="true" /> True</label><br />
								<label><input type="radio" value="false" /> False</label><br />
								<label><input type="radio" value="string" /> String</label>
							</td>
						</tr>
						<tr class="field-submit">
							<td class="label"></td>
							<td class="input">
								<a href="#close" class="button-secondary close-options-cpt">Finish Editing &amp; Close</a>
								<a href="#cancel" class="button-secondary cancel-new">Cancel</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div><!--/advanced-labels-->
		</div>
	</div><!--/broken-table-row-->
</div>