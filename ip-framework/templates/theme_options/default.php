<form method="post" action="">
	<input type="hidden" name="action" value="save" />
<table class="widefat ipf ipf-input ipf-user-theme-options">
<?php
foreach ($this->fields as $field) {
	switch ($field['type']) {
		case 'Text':
?>
		<tr>
			<td class="label">
				<label for="<?php esc_attr_e($field['name']); ?>"><?php echo $field['label']; ?></label>
				<?php if ($field['instructions']) { ?>
				<p><?php echo $field['instructions']; ?></p>
				<?php } ?>
			</td>
			<td class="input">
				<input name="<?php esc_attr_e($field['name']); ?>" id="<?php esc_attr_e($field['name']); ?>" value="<?php esc_attr_e($this->options[$field['name']]); ?>" type="text" />
			</td>
		</tr>
<?php
		break;
	case 'Textarea':
?>
		<tr>
			<td class="label">
				<label for="<?php esc_attr_e($field['name']); ?>"><?php echo $field['label']; ?></label>
				<?php if ($field['instructions']) { ?>
				<p><?php echo $field['instructions']; ?></p>
				<?php } ?>
			</td>
			<td class="input">
				<textarea name="<?php esc_attr_e($field['name']); ?>" id="<?php esc_attr_e($field['name']); ?>"><?php echo esc_textarea($this->options[$field['name']]) ?></textarea>
			</td>
		</tr>
<?php
		break;
	case 'Radio':
?>
		<tr>
			<td class="label">
				<label><?php echo $field['label']; ?></label>
				<?php if ($field['instructions']) { ?>
				<p><?php echo $field['instructions']; ?></p>
				<?php } ?>
			</td>
			<td class="input">
				<?php foreach ($field['options'] as $option) {
					if ($option == $this->options[$field['name']]) {
						$checked = 'checked="checked"';
					} else {
						$checked = '';
					}
					?>
					<label>
						<input type="radio" name="<?php esc_attr_e($field['name']); ?>" value="<?php esc_attr_e($option); ?>" <?php echo $checked; ?>>
						<?php esc_attr_e($option); ?>
					</label><br />
				<?php } ?>
			</td>
		</tr>
<?php
		break;
	case 'Checkbox':
?>	
		<tr>
			<td class="label">
				<label><?php echo $field['label']; ?></label>
				<?php if ($field['instructions']) { ?>
				<p><?php echo $field['instructions']; ?></p>
				<?php } ?>
			</td>
			<td class="input">
				<?php foreach ($field['options'] as $option) {
					if (in_array($option, $this->options[$field['name']])) {
						$checked = 'checked="checked"';
					} else {
						$checked = '';
					}
					?>
					<label>
						<input type="checkbox" name="<?php esc_attr_e($field['name']); ?>[]" value="<?php esc_attr_e($option); ?>" <?php echo $checked; ?>>
						<?php esc_attr_e($option); ?>
					</label><br />
				<?php } ?>
			</td>
		</tr>
<?php
		break;
	case 'Select':
?>
		<tr>
			<td class="label">
				<label for="<?php esc_attr_e($field['name']); ?>"><?php echo $field['label']; ?></label>
				<?php if ($field['instructions']) { ?>
				<p><?php echo $field['instructions']; ?></p>
				<?php } ?>
			</td>
			<td class="input">
				<select name="<?php esc_attr_e($field['name']); ?>" id="<?php esc_attr_e($field['name']); ?>">
				<?php foreach ($field['options'] as $option) {
					if ($option == $this->options[$field['name']]) {
						$checked = 'selected="selected"';
					} else {
						$checked = '';
					}
					?>
					<option value="<?php esc_attr_e($option); ?>"><?php echo $option; ?></option>
				<?php } ?>
				</select>
			</td>
		</tr>		
<?php
		break;
	case 'Heading':
?>
	</table>
	<div class="ipf-user-options-heading">
		<h3><?php echo $field['label']; ?></h3>
		<?php if ($field['instructions']) { ?>
		<p><?php echo $field['instructions']; ?></p>
	</div>
	<?php } ?>
	<table class="widefat ipf ipf-input ipf-user-theme-options">
<?php
		break;
	}
}
?>

	</table>

	<p class="submit">
		<input name="save" type="submit" value="Save Changes" class="button-primary" />
		<input type="hidden" name="action" value="save" />
	</p>
</form>