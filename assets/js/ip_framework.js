
jQuery(function($){
	$('#add-row').click(function(e){
		e.preventDefault();
		cloneRow('#blank-field .broken-table-row', '#table-body', '.broken-table-row');
		$('#table-body .no-content').hide();
	});
	$('.duplicate-row').click(function(e) {
		e.preventDefault();
		var dupRow = $(this).parents('.broken-table-row').attr('id');
		var newRow = cloneRow('#'+dupRow, '#table-body', '.broken-table-row');
		var order = newRow.find('.field-order input').val();
		newRow.find('.ipf-options td.order').html(order);
	});
	$('.edit-row').click(function(e){
		e.preventDefault();
		var container = $(this).parents('.broken-table-row');
		container.find('.field-options').show();
	});
	$('.delete-row').click(function(e){
		e.preventDefault();
		var container = $(this).parents('.broken-table-row');
		container.remove();
		if ($('#table-body .broken-table-row').length == 1) {
			$('#table-body .no-content').show();
		}
	});
	$('.close-options').click(function(e){
		e.preventDefault();
		var container = $(this).parents('.broken-table-row');

		var label = container.find('.field-label input').val();
		container.find('.ipf-options td.label .row-title').html(label);

		var name = container.find('.field-name input').val();
		container.find('.ipf-options td.name').html(name);

		var type = container.find('.field-type select').val();
		container.find('.ipf-options td.type').html(type);

		var order = container.find('.field-order input').val();
		container.find('.ipf-options td.order').html(order);

		container.find('.field-options').hide();

	});
	$('.close-options-cpt').click(function(e){
		e.preventDefault();
		var container = $(this).parents('.broken-table-row');

		var name = container.find('.field-post_type input').val();
		container.find('.ipf-options td.label .row-title').html(name);

		var label = container.find('.field-label-name input').val();
		container.find('.ipf-options td.name').html(label);

		var type = container.find('.field-args-capability_type select').val();
		container.find('.ipf-options td.type').html(type);

		var desc = container.find('.field-args-description textarea').val();
		container.find('.ipf-options td.description').html(desc);

		container.find('.field-options').hide();
	});
	$('.close-options-ctax').click(function(e){
		e.preventDefault();
		var container = $(this).parents('.broken-table-row');

		var name = container.find('.field-taxonomy_name input').val();
		container.find('.ipf-options td.name .row-title').html(name);

		var label = container.find('.field-label-name input').val();
		container.find('.ipf-options td.label').html(label);

		var hierarchcial = container.find('.field-args-hierarchcial input').val();
		container.find('.ipf-options td.hierarchcial').html(hierarchcial);

		container.find('.field-options').hide();
	});
	$('.close-options-menus').click(function(e){
		e.preventDefault();
		var container = $(this).parents('.broken-table-row');

		var label = container.find('.field-label input').val();
		container.find('.ipf-options td.label .row-title').html(label);

		var slug = container.find('.field-slug input').val();
		container.find('.ipf-options td.slug').html(slug);

		container.find('.field-options').hide();
	});
	$('.close-options-sizes').click(function(e){
		e.preventDefault();
		var container = $(this).parents('.broken-table-row');

		var name = container.find('.field-name input').val();
		container.find('.ipf-options td.name .row-title').html(name);

		var width = container.find('.field-width input').val();
		container.find('.ipf-options td.width').html(width);

		var height = container.find('.field-height input').val();
		container.find('.ipf-options td.height').html(height);

		var crop = container.find('.field-crop input:checked').val();
		container.find('.ipf-options td.crop').html(crop);

		container.find('.field-options').hide();
	});
	$('.close-options-sidebars').click(function(e){
		e.preventDefault();
		var container = $(this).parents('.broken-table-row');

		var name = container.find('.field-name input').val();
		container.find('.ipf-options td.name .row-title').html(name);

		var id = container.find('.field-id input').val();
		container.find('.ipf-options td.id').html(id);

		var description = container.find('.field-description input').val();
		container.find('.ipf-options td.description').html(description);

		container.find('.field-options').hide();
	});

	$('.field-type select').change(function(){
		if ($(this).val() == 'Select' || $(this).val() == 'Radio' || $(this).val() == 'Checkbox') {
			$(this).parents('tbody').find('.field-options').show();
		} else if ($(this).val() == 'Text' || $(this).val() == 'Textarea') {
			$(this).parents('tbody').find('.field-options').hide();
		} else if ($(this).val() == 'Heading') {
			$(this).parents('tbody').find('.field-options').hide();
			$(this).parents('tbody').find('.field-default').hide();
		}
	});
	$('.cancel-new').click(function(e){
		e.preventDefault();
		var container = $(this).parents('.broken-table-row');
		container.remove();
		if ($('#table-body .broken-table-row').length == 1) {
			$('#table-body .no-content').show();
		}
	});
	$('.tab-link').click(function(e){
		e.preventDefault();
		$(this).parent().toggleClass('expanded');
	});
});
function cloneRow(origRow, appendContainer, rowClass) {
	var newrow = jQuery(origRow).clone(true).appendTo(appendContainer);
	var newid = Math.round((new Date()).getTime() / 1000);
	newrow.attr('id', 'row-'+newid);
	newrow.find('.ipf-input tr').each(function(){
		var name = jQuery(this).attr('class');
		name = name.replace('field-', '');
		if (jQuery(this).find('input').length > 0) {
			if (jQuery(this).find('input').attr('type') == 'checkbox') {
				jQuery(this).find('input').attr('name', 'options['+newid+']['+name+'][]');
			} else {
				jQuery(this).find('input').attr('name', 'options['+newid+']['+name+']');
			}
		} else if (jQuery(this).find('textarea').length > 0) {
			jQuery(this).find('textarea').attr('name', 'options['+newid+']['+name+']');
		} else if (jQuery(this).find('select').length > 0) {
			if (jQuery(this).find('select').attr('multiple') == 'multiple') {
				jQuery(this).find('select').attr('name', 'options['+newid+']['+name+'][]');
			} else {
				jQuery(this).find('select').attr('name', 'options['+newid+']['+name+']');
			}
		}
	});
	var max = jQuery(appendContainer+' '+rowClass).length;
	newrow.find('.field-order input').val(max);
	return newrow;
}