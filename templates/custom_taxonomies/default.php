
<form action="admin.php?page=ip_framework_custom_taxonomies" method="post">
	<input type="hidden" name="action" value="save" />
	<div class="broken-table-header">
		<table class="widefat ipf ipf-options">
			<thead>
				<tr>
					<th class="name">Name</th>
					<th class="label">Label</th>
					<th class="hierarchical">Hierarchical?</th>
				</tr>
			</thead>
		</table>
	</div>
	<div class="broken-table-body" id="table-body">
		<?php if ($this->taxonomies) { ?>
			<?php foreach ($this->taxonomies as $taxonomy) { ?>
			<div class="broken-table-row" id="row-<?php echo $taxonomy['id']; ?>">
				<table class="widefat ipf ipf-options">
					<tbody>
						<tr>
							<td class="name">
								<strong><a href="#edit" class="row-title edit-row"><?php echo $taxonomy['taxonomy']; ?></a></strong>
								<div class="row_options">
									<span><a href="#edit" class="edit-row">Edit</a> |</span>
									<span><a href="#duplicate" class="duplicate-row">Duplicate</a> |</span>
									<span><a href="#delete" class="delete-row">Delete</a></span>
								</div>
							</td>
							<td class="label"><?php echo $taxonomy['args']['labels']['name']; ?></td>
							<td class="hierarchical"><?php echo ($taxonomy['args']['hierarchical']) ? 'true' : 'false'; ?></td>
						</tr>
					</tbody>
				</table>
				<div class="field-options collapsed">
					<table class="widefat ipf-input">
						<tbody>
							<tr class="field-taxonomy_name">
								<td class="label">
									<label>Taxonomy Name</label>
									<p>Max. 28 characters, can not contain capital letters or spaces. Automatically prefixed with &ldquo;ipf_&rdquo;.</p>
								</td>
								<td class="input">
									<input type="text" value="<?php esc_attr_e($taxonomy['taxonomy']); ?>" name="options[<?php echo $taxonomy['id']; ?>][taxonomy_name]" />
								</td>
							</tr>
							<tr class="field-label-name">
								<td class="label">
									<label>Plural Label</label>
									<p>General name for the taxonomy.</p>
								</td>
								<td class="input">
									<input type="text" value="<?php esc_attr_e($taxonomy['args']['labels']['name']); ?>" name="options[<?php echo $taxonomy['id']; ?>][label-name]" />
								</td>
							</tr>
							<tr class="field-label-singular_name">
								<td class="label">
									<label>Singular Label</label>
									<p>Name for one object of this taxonomy.</p>
								</td>
								<td class="input">
									<input type="text" value="<?php esc_attr_e($taxonomy['args']['labels']['singular_name']); ?>" name="options[<?php echo $taxonomy['id']; ?>][label-singular_name]" />
								</td>
							</tr>
							<tr class="field-args-hierarchical">
								<td class="label">
									<label>Hierarchical</label>
									<p>Hierarchical = categories; not hierarchical = tags.</p>
								</td>
								<td class="input">
									<label><input type="radio" name="options[<?php echo $taxonomy['id']; ?>][args-hierarchical]" value="true" <?php if ($taxonomy['args']['hierarchical'] === true) echo 'checked="checked"'; ?> /> True</label><br />
									<label><input type="radio" value="false" name="options[<?php echo $taxonomy['id']; ?>][args-hierarchical]" <?php if ($taxonomy['args']['hierarchical'] === false) echo 'checked="checked"'; ?> /> False</label>
								</td>
							</tr>
							<tr class="field-args-public">
								<td class="label">
									<label>Public</label>
									<p>Whether a taxonomy is intended to be used publicly either via the admin interface or by front-end users.</p>
								</td>
								<td class="input">
									<label><input type="radio" value="true" name="options[<?php echo $taxonomy['id']; ?>][args-public]" <?php if ($taxonomy['args']['public'] === true) echo 'checked="checked"'; ?> /> True</label><br />
									<label><input type="radio" value="false" name="options[<?php echo $taxonomy['id']; ?>][args-public]" <?php if ($taxonomy['args']['public'] === false) echo 'checked="checked"'; ?> /> False</label>
								</td>
							</tr>
							<tr class="field-args-rewrite">
								<td class="label">
									<label>Rewrite</label>
									<p>Enable rewrites for this taxonomy.</p>
								</td>
								<td class="input">
									<label><input type="radio" value="true" name="options[<?php echo $taxonomy['id']; ?>][args-rewrite]" <?php if ($taxonomy['args']['rewrite'] !== false) echo 'checked="checked"'; ?> /> True</label><br />
									<label><input type="radio" value="false" name="options[<?php echo $taxonomy['id']; ?>][args-rewrite]" <?php if ($taxonomy['args']['rewrite'] === false) echo 'checked="checked"'; ?> /> False</label>
								</td>
							</tr>
							<tr class="field-args-rewrite_slug">
								<td class="label">
									<label>Rewrite Slug</label>
								</td>
								<td class="input">
									<input type="text" name="options[<?php echo $taxonomy['id']; ?>][args-rewrite_slug]" value="<?php echo esc_attr_e($taxonomy['args']['rewrite']['slug']); ?>" />
								</td>
							</tr>
							<tr class="field-args-sort">
								<td class="label">
									<label>Sort</label>
									<p>Whether this taxonomy should remember the order in which terms are added to objects.</p>
								</td>
								<td class="input">
									<label><input type="radio" name="options[<?php echo $taxonomy['id']; ?>][args-sort]" value="true" <?php if ($taxonomy['args']['sort'] === true) echo 'checked="checked"'; ?> /> True</label><br />
									<label><input type="radio" value="false" name="options[<?php echo $taxonomy['id']; ?>][args-sort]" <?php if ($taxonomy['args']['sort'] === false) echo 'checked="checked"'; ?> /> False</label>
								</td>
							</tr>
							<tr class="field-args-show_admin_column">
								<td class="label">
									<label>Show Admin Column</label>
									<p>Whether to allow automatic creation of taxonomy columns on associated post-types.</p>
								</td>
								<td class="input">
									<label><input type="radio" name="options[<?php echo $taxonomy['id']; ?>][args-show_admin_column]" value="true" <?php if ($taxonomy['args']['show_admin_column'] === true) echo 'checked="checked"'; ?> /> True</label><br />
									<label><input type="radio" name="options[<?php echo $taxonomy['id']; ?>][args-show_admin_column]" value="false" <?php if ($taxonomy['args']['show_admin_column'] === false) echo 'checked="checked"'; ?> /> False</label>
								</td>
							</tr>
							<tr class="field-args-post_types">
								<td class="label">
									<label>Post Types</label>
									<p>Post Types that can use this taxonomy.</p>
								</td>
								<td class="input">
									<select multiple="multiple" name="options[<?php echo $taxonomy['id']; ?>][args-post_types][]">
									<?php foreach ($this->post_types as $pt_name => $pt_label) { ?>
										<option value="<?php echo $pt_name; ?>" <?php if (in_array($pt_name, $taxonomy['object_type'])) echo 'selected="selected"'; ?>><?php echo $pt_label; ?></option>
									<?php } ?>
									</select>
								</td>
							</tr>
							<tr class="field-submit">
								<td class="label"></td>
								<td class="input">
									<a href="#close" class="button-secondary close-options-ctax">Finish Editing &amp; Close</a>
								</td>
							</tr>
						</tbody>
					</table>
					<div class="tab advanced-labels">
						<a href="#advanced-labels" class="tab-link">Advanced Labels</a>
						<table class="widefat ipf-input">
							<tbody>
								<tr class="field-label-search_items">
									<td class="label">
										<label>Search Items</label>
										<p>Default: &ldquo;Search Tags&rsquo; / &ldquo;Search Categories&rsquo;</p>
									</td>
									<td class="input">
										<input type="text" name="options[<?php echo $taxonomy['id']; ?>][label-search_items]" value="<?php esc_attr_e($taxonomy['args']['labels']['search_items']); ?>" />
									</td>
								</tr>
								<tr class="field-label-popular_items">
									<td class="label">
										<label>Popular Items</label>
										<p>Default: &ldquo;Popular Tags&rsquo; / null</p>
									</td>
									<td class="input">
										<input type="text" name="options[<?php echo $taxonomy['id']; ?>][label-popular_items]" value="<?php esc_attr_e($taxonomy['args']['labels']['popular_items']); ?>" />
									</td>
								</tr>
								<tr class="field-label-all_items">
									<td class="label">
										<label>All Items</label>
										<p>Default: &ldquo;All Tags&rsquo; / &ldquo;All Categories&rsquo;</p>
									</td>
									<td class="input">
										<input type="text" name="options[<?php echo $taxonomy['id']; ?>][label-all_items]" value="<?php esc_attr_e($taxonomy['args']['labels']['all_items']); ?>" />
									</td>
								</tr>
								<tr class="field-label-parent_item">
									<td class="label">
										<label>Parent Item</label>
										<p>Default: null / &ldquo;Parent Category&rsquo;</p>
									</td>
									<td class="input">
										<input type="text" name="options[<?php echo $taxonomy['id']; ?>][label-parent_item]" value="<?php esc_attr_e($taxonomy['args']['labels']['parent_item']); ?>" />
									</td>
								</tr>
								<tr class="field-label-parent_item_colon">
									<td class="label">
										<label>Parent Item Colon</label>
										<p>Default: null / &ldquo;Parent Category:&rsquo;</p>
									</td>
									<td class="input">
										<input type="text" name="options[<?php echo $taxonomy['id']; ?>][label-parent_item_colon]" value="<?php esc_attr_e($taxonomy['args']['labels']['parent_item_colon']); ?>" />
									</td>
								</tr>
								<tr class="field-label-edit_item">
									<td class="label">
										<label>Edit Item</label>
										<p>Default: &ldquo;Edit Tag&rsquo; / &ldquo;Edit Category&rsquo;</p>
									</td>
									<td class="input">
										<input type="text" name="options[<?php echo $taxonomy['id']; ?>][label-edit_item]" value="<?php esc_attr_e($taxonomy['args']['labels']['edit_item']); ?>" />
									</td>
								</tr>
								<tr class="field-label-update_item">
									<td class="label">
										<label>Update Item</label>
										<p>Default: &ldquo;Update Tag&rsquo; / &ldquo;Update Category&rsquo;</p>
									</td>
									<td class="input">
										<input type="text" name="options[<?php echo $taxonomy['id']; ?>][label-update_item]" value="<?php esc_attr_e($taxonomy['args']['labels']['update_item']); ?>" />
									</td>
								</tr>
								<tr class="field-label-add_new_item">
									<td class="label">
										<label>Add New Item</label>
										<p>Default: &ldquo;Add New Tag&rsquo; / &ldquo;Add New Category&rsquo;</p>
									</td>
									<td class="input">
										<input type="text" name="options[<?php echo $taxonomy['id']; ?>][label-add_new_item]" value="<?php esc_attr_e($taxonomy['args']['labels']['add_new_item']); ?>" />
									</td>
								</tr>
								<tr class="field-label-new_item_name">
									<td class="label">
										<label>New Item Name</label>
										<p>Default: &ldquo;New Tag Name&rsquo; / &ldquo;New Category Name&rsquo;</p>
									</td>
									<td class="input">
										<input type="text" name="options[<?php echo $taxonomy['id']; ?>][label-new_item_name]" value="<?php esc_attr_e($taxonomy['args']['labels']['new_item_name']); ?>" />
									</td>
								</tr>
								<tr class="field-label-separate_items_with_commas">
									<td class="label">
										<label>Separate items with commas</label>
										<p>Default: &ldquo;Separate tags with commas&rsquo; / null</p>
									</td>
									<td class="input">
										<input type="text" name="options[<?php echo $taxonomy['id']; ?>][label-separate_items_with_commas]" value="<?php esc_attr_e($taxonomy['args']['labels']['separate_items_with_commas']); ?>" />
									</td>
								</tr>
								<tr class="field-label-add_or_remove_items">
									<td class="label">
										<label>Add or remove items</label>
										<p>Default: &ldquo;Add or remove tags&rsquo; / null</p>
									</td>
									<td class="input">
										<input type="text" name="options[<?php echo $taxonomy['id']; ?>][label-add_or_remove_items]" value="<?php esc_attr_e($taxonomy['args']['labels']['add_or_remove_items']); ?>" />
									</td>
								</tr>
								<tr class="field-label-choose_from_most_used">
									<td class="label">
										<label>Choose from most used</label>
										<p>Default: &ldquo;Choose from the most used tags&rsquo; / null</p>
									</td>
									<td class="input">
										<input type="text" name="options[<?php echo $taxonomy['id']; ?>][label-choose_from_most_used]" value="<?php esc_attr_e($taxonomy['args']['labels']['choose_from_most_used']); ?>" />
									</td>
								</tr>
								<tr class="field-label-menu_name">
									<td class="label">
										<label>Menu Name</label>
										<p>Default: plural name label</p>
									</td>
									<td class="input">
										<input type="text" name="options[<?php echo $taxonomy['id']; ?>][label-menu_name]" value="<?php esc_attr_e($taxonomy['args']['labels']['menu_name']); ?>" />
									</td>
								</tr>
								<tr class="field-submit">
									<td class="label"></td>
									<td class="input">
										<a href="#close" class="button-secondary close-options-ctax">Finish Editing &amp; Close</a>
									</td>
								</tr>
							</tbody>
						</table>
					</div><!--/advanced-labels-->
					<div class="tab advanced-capabilities">
						<a href="#advanced-labels" class="tab-link">Advanced Options</a>
						<table class="widefat ipf-input">
							<tbody>
								<tr class="field-args-show_ui">
									<td class="label">
										<label>Show UI</label>
										<p>Whether to generate a default UI for managing this taxonomy.</p>
									</td>
									<td class="input">
										<label><input type="radio" value="true" name="options[<?php echo $taxonomy['id']; ?>][args-show_ui]" <?php if ($taxonomy['args']['show_ui'] === true) echo 'checked="checked"'; ?> /> True</label><br />
										<label><input type="radio" value="false" name="options[<?php echo $taxonomy['id']; ?>][args-show_ui]" <?php if ($taxonomy['args']['show_ui'] === false) echo 'checked="checked"'; ?> /> False</label>
									</td>
								</tr>
								<tr class="field-args-show_in_nav_menus">
									<td class="label">
										<label>Show in Nav Menus</label>
										<p>Make this taxonomy available for selection in navigation menus.</p>
									</td>
									<td class="input">
										<label><input type="radio" value="true" name="options[<?php echo $taxonomy['id']; ?>][args-show_in_nav_menus]" <?php if ($taxonomy['args']['show_in_nav_menus'] === true) echo 'checked="checked"'; ?> /> True</label><br />
										<label><input type="radio" value="false" name="options[<?php echo $taxonomy['id']; ?>][args-show_in_nav_menus]" <?php if ($taxonomy['args']['show_in_nav_menus'] === false) echo 'checked="checked"'; ?> /> False</label>
									</td>
								</tr>
								<tr class="field-args-show_tagcloud">
									<td class="label">
										<label>Show Tag Cloud</label>
										<p>Whether to allow the Tag Cloud widget to use this taxonomy.</p>
									</td>
									<td class="input">
										<label><input type="radio" value="true" name="options[<?php echo $taxonomy['id']; ?>][args-show_tagcloud]" <?php if ($taxonomy['args']['show_tagcloud'] === true) echo 'checked="checked"'; ?> /> True</label><br />
										<label><input type="radio" value="false" name="options[<?php echo $taxonomy['id']; ?>][args-show_tagcloud]" <?php if ($taxonomy['args']['show_tagcloud'] === false) echo 'checked="checked"'; ?> /> False</label>
									</td>
								</tr>
								<tr class="field-args-capabilities">
									<td class="label">
										<label>Capabilities</label>
										<p>Default: capability_type is used to construct</p>
									</td>
									<td class="input">
										<textarea name="options[<?php echo $taxonomy['id']; ?>][args-capabilities]"><?php echo esc_textarea($taxonomy['args']['capabilities']); ?></textarea>
									</td>
								</tr>
								<tr class="field-args-query_var">
									<td class="label">
										<label>Query Var</label>
										<p>The query_var is used for direct queries through WP_Query. Setting to false will disable these methods.</p>
									</td>
									<td class="input">
										<label><input type="radio" value="taxonomy" name="options[<?php echo $taxonomy['id']; ?>][args-query_var]" <?php if ($taxonomy['args']['query_var'] == $taxonomy['taxonomy']) echo 'checked="checked"'; ?> /> Taxonomy Name</label><br />
										<label><input type="radio" value="false" name="options[<?php echo $taxonomy['id']; ?>][args-query_var]" <?php if ($taxonomy['args']['query_var'] === false) echo 'checked="checked"'; ?> /> False</label><br />
										<label><input type="radio" value="string" name="options[<?php echo $taxonomy['id']; ?>][args-query_var]" <?php if ($taxonomy['args']['query_var'] !== false && $taxonomy['args']['query_var'] != $taxonomy['taxonomy']) echo 'checked="checked"'; ?> /> Custom String</label>
									</td>
								</tr>
								<tr class="field-args-query_var_string">
									<td class="label">
										<label>Query Var String</label>
									</td>
									<td class="input">
										<input type="text" name="options[<?php echo $taxonomy['id']; ?>][args-query_var_string]" value="<?php if ($taxonomy['args']['query_var'] != $taxonomy['taxonomy']) esc_attr_e($taxonomy['args']['query_var']); ?>" />
									</td>
								</tr>
								<tr class="field-args-update_count_callback">
									<td class="label">
										<label>Update Count Callback</label>
										<p>A function name that will be called to update the count of an associated $object_type, such as post, is updated. Use "_update_generic_term_count" for taxonomies on attachments.</p>
									</td>
									<td class="input">
										<input type="text" name="options[<?php echo $taxonomy['id']; ?>][args-update_count_callback]" value="<?php esc_attr_e($taxonomy['args']['update_count_callback']); ?>">
									</td>
								</tr>
								<tr class="field-submit">
									<td class="label"></td>
									<td class="input">
										<a href="#close" class="button-secondary close-options-ctax">Finish Editing &amp; Close</a>
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
			No custom taxonomies.
		</div>
		<?php } ?>
	</div><!--/broken-table-body-->
	<div class="broken-table-footer">
		<table class="widefat ipf ipf-options">
			<tfoot>
				<tr>
					<th colspan="3" class="submit">
						<button id="add-row" class="button-secondary">+ Add New Custom Taxonomy</button>
						<input type="submit" value="Save Changes to Custom Taxonomies" class="button-primary">
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
					<td class="label"></td>
					<td class="hierarchical"></td>
				</tr>
			</tbody>
		</table>
		<div class="field-options expanded">
			<table class="widefat ipf-input">
				<tbody>
					<tr class="field-taxonomy_name">
						<td class="label">
							<label>Taxonomy Name</label>
							<p>Max. 28 characters, can not contain capital letters or spaces. Automatically prefixed with &ldquo;ipf_&rdquo;.</p>
						</td>
						<td class="input">
							<input type="text" />
						</td>
					</tr>
					<tr class="field-label-name">
						<td class="label">
							<label>Plural Label</label>
							<p>General name for the taxonomy.</p>
						</td>
						<td class="input">
							<input type="text" />
						</td>
					</tr>
					<tr class="field-label-singular_name">
						<td class="label">
							<label>Singular Label</label>
							<p>Name for one object of this taxonomy.</p>
						</td>
						<td class="input">
							<input type="text" />
						</td>
					</tr>
					<tr class="field-args-hierarchical">
						<td class="label">
							<label>Hierarchical</label>
							<p>Hierarchical = categories; not hierarchical = tags.</p>
						</td>
						<td class="input">
							<label><input type="radio" value="true" /> True</label><br />
							<label><input type="radio" value="false" checked="checked" /> False</label>
						</td>
					</tr>
					<tr class="field-args-public">
						<td class="label">
							<label>Public</label>
							<p>Whether a taxonomy is intended to be used publicly either via the admin interface or by front-end users.</p>
						</td>
						<td class="input">
							<label><input type="radio" value="true" checked="checked" /> True</label><br />
							<label><input type="radio" value="false" /> False</label>
						</td>
					</tr>
					<tr class="field-args-rewrite">
						<td class="label">
							<label>Rewrite</label>
							<p>Enable rewrites for this taxonomy.</p>
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
					<tr class="field-args-sort">
						<td class="label">
							<label>Sort</label>
							<p>Whether this taxonomy should remember the order in which terms are added to objects.</p>
						</td>
						<td class="input">
							<label><input type="radio" value="true" /> True</label><br />
							<label><input type="radio" value="false" checked="checked" /> False</label>
						</td>
					</tr>
					<tr class="field-args-show_admin_column">
						<td class="label">
							<label>Show Admin Column</label>
							<p>Whether to allow automatic creation of taxonomy columns on associated post-types.</p>
						</td>
						<td class="input">
							<label><input type="radio" value="true" checked="checked" /> True</label><br />
							<label><input type="radio" value="false" /> False</label>
						</td>
					</tr>
					<tr class="field-args-post_types">
						<td class="label">
							<label>Post Types</label>
							<p>Post Types that can use this taxonomy.</p>
						</td>
						<td class="input">
							<select multiple="multiple">
							<?php foreach ($this->post_types as $pt_name => $pt_label) { ?>
								<option value="<?php echo $pt_name; ?>"><?php echo $pt_label; ?></option>
							<?php } ?>
							</select>
						</td>
					</tr>
					<tr class="field-submit">
						<td class="label"></td>
						<td class="input">
							<a href="#close" class="button-secondary close-options-ctax">Finish Editing &amp; Close</a>
							<a href="#cancel" class="button-secondary cancel-new">Cancel</a>
						</td>
					</tr>
				</tbody>
			</table>
			<div class="tab advanced-labels">
				<a href="#advanced-labels" class="tab-link">Advanced Labels</a>
				<table class="widefat ipf-input">
					<tbody>
						<tr class="field-label-search_items">
							<td class="label">
								<label>Search Items</label>
								<p>Default: &ldquo;Search Tags&rsquo; / &ldquo;Search Categories&rsquo;</p>
							</td>
							<td class="input">
								<input type="text" />
							</td>
						</tr>
						<tr class="field-label-popular_items">
							<td class="label">
								<label>Popular Items</label>
								<p>Default: &ldquo;Popular Tags&rsquo; / null</p>
							</td>
							<td class="input">
								<input type="text" />
							</td>
						</tr>
						<tr class="field-label-all_items">
							<td class="label">
								<label>All Items</label>
								<p>Default: &ldquo;All Tags&rsquo; / &ldquo;All Categories&rsquo;</p>
							</td>
							<td class="input">
								<input type="text" />
							</td>
						</tr>
						<tr class="field-label-parent_item">
							<td class="label">
								<label>Parent Item</label>
								<p>Default: null / &ldquo;Parent Category&rsquo;</p>
							</td>
							<td class="input">
								<input type="text" />
							</td>
						</tr>
						<tr class="field-label-parent_item_colon">
							<td class="label">
								<label>Parent Item Colon</label>
								<p>Default: null / &ldquo;Parent Category:&rsquo;</p>
							</td>
							<td class="input">
								<input type="text" />
							</td>
						</tr>
						<tr class="field-label-edit_item">
							<td class="label">
								<label>Edit Item</label>
								<p>Default: &ldquo;Edit Tag&rsquo; / &ldquo;Edit Category&rsquo;</p>
							</td>
							<td class="input">
								<input type="text" />
							</td>
						</tr>
						<tr class="field-label-update_item">
							<td class="label">
								<label>Update Item</label>
								<p>Default: &ldquo;Update Tag&rsquo; / &ldquo;Update Category&rsquo;</p>
							</td>
							<td class="input">
								<input type="text" />
							</td>
						</tr>
						<tr class="field-label-add_new_item">
							<td class="label">
								<label>Add New Item</label>
								<p>Default: &ldquo;Add New Tag&rsquo; / &ldquo;Add New Category&rsquo;</p>
							</td>
							<td class="input">
								<input type="text" />
							</td>
						</tr>
						<tr class="field-label-new_item_name">
							<td class="label">
								<label>New Item Name</label>
								<p>Default: &ldquo;New Tag Name&rsquo; / &ldquo;New Category Name&rsquo;</p>
							</td>
							<td class="input">
								<input type="text" />
							</td>
						</tr>
						<tr class="field-label-separate_items_with_commas">
							<td class="label">
								<label>Separate items with commas</label>
								<p>Default: &ldquo;Separate tags with commas&rsquo; / null</p>
							</td>
							<td class="input">
								<input type="text" />
							</td>
						</tr>
						<tr class="field-label-add_or_remove_items">
							<td class="label">
								<label>Add or remove items</label>
								<p>Default: &ldquo;Add or remove tags&rsquo; / null</p>
							</td>
							<td class="input">
								<input type="text" />
							</td>
						</tr>
						<tr class="field-label-choose_from_most_used">
							<td class="label">
								<label>Choose from most used</label>
								<p>Default: &ldquo;Choose from the most used tags&rsquo; / null</p>
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
								<a href="#close" class="button-secondary close-options-ctax">Finish Editing &amp; Close</a>
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
						<tr class="field-args-show_ui">
							<td class="label">
								<label>Show UI</label>
								<p>Whether to generate a default UI for managing this taxonomy.</p>
							</td>
							<td class="input">
								<label><input type="radio" value="true" checked="checked" /> True</label><br />
								<label><input type="radio" value="false" /> False</label>
							</td>
						</tr>
						<tr class="field-args-show_in_nav_menus">
							<td class="label">
								<label>Show in Nav Menus</label>
								<p>Make this taxonomy available for selection in navigation menus.</p>
							</td>
							<td class="input">
								<label><input type="radio" value="true" checked="checked" /> True</label><br />
								<label><input type="radio" value="false" /> False</label>
							</td>
						</tr>
						<tr class="field-args-show_tagcloud">
							<td class="label">
								<label>Show Tag Cloud</label>
								<p>Whether to allow the Tag Cloud widget to use this taxonomy.</p>
							</td>
							<td class="input">
								<label><input type="radio" value="true" checked="checked" /> True</label><br />
								<label><input type="radio" value="false" /> False</label>
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
						<tr class="field-args-query_var">
							<td class="label">
								<label>Query Var</label>
							</td>
							<td class="input">
								<label><input type="radio" value="taxonomy" checked="checked" /> Taxonomy Name</label><br />
								<label><input type="radio" value="false" /> False</label><br />
								<label><input type="radio" value="string" /> Custom String</label>
							</td>
						</tr>
						<tr class="field-args-query_var_string">
							<td class="label">
								<label>Query Var String</label>
							</td>
							<td class="input">
								<input type="text" />
							</td>
						</tr>
						<tr class="field-args-update_count_callback">
							<td class="label">
								<label>Update Count Callback</label>
								<p>A function name that will be called to update the count of an associated $object_type, such as post, is updated. Use "_update_generic_term_count" for taxonomies on attachments.</p>
							</td>
							<td class="input">
								<input type="text">
							</td>
						</tr>
						<tr class="field-submit">
							<td class="label"></td>
							<td class="input">
								<a href="#close" class="button-secondary close-options-ctax">Finish Editing &amp; Close</a>
								<a href="#cancel" class="button-secondary cancel-new">Cancel</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div><!--/advanced-labels-->
		</div>
	</div><!--/broken-table-row-->
</div>