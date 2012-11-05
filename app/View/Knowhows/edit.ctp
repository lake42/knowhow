<div class="knowhows form">
<?php echo $this->Form->create('Knowhow'); ?>
	<fieldset>
		<legend><?php echo __('Edit Knowhow'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('content');
		echo $this->Form->input('slug');
		echo $this->Form->input('timestamp');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Knowhow.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Knowhow.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Knowhows'), array('action' => 'index')); ?></li>
	</ul>
</div>
