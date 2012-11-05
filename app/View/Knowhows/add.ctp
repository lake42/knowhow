<?php
//print_R($cats);
print_R($vard);
?>

<div class="knowhows form">
<?php echo $this->Form->create('Knowhow'); ?>
	<fieldset>
		<legend><?php echo __('Add Knowhow'); ?></legend>
	<?php
		echo $this->Form->input('content');
		echo $this->Form->input('slug');
		echo $this->Form->input('timestamp');
		echo $this->Form->input('description');
		?>
		
		<ul id="selects">

		<?php
foreach ($cats as $key=>$value) { 
echo "<li><label for='". $value . "'>" . $value . $this->Form->checkbox('Category', array('value' => $key, 'multiple'=> 'true' )) . "</label></li>\n";
}
	?>
	</ul>
	</fieldset>
	

	
	<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Knowhows'), array('action' => 'index')); ?></li>
	</ul>
</div>
