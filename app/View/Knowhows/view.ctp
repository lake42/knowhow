<div class="knowhows view">
<h2><?php  echo __('Knowhow'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($knowhow['Knowhow']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo h($knowhow['Knowhow']['content']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($knowhow['Knowhow']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Timestamp'); ?></dt>
		<dd>
			<?php echo h($knowhow['Knowhow']['timestamp']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($knowhow['Knowhow']['description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Knowhow'), array('action' => 'edit', $knowhow['Knowhow']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Knowhow'), array('action' => 'delete', $knowhow['Knowhow']['id']), null, __('Are you sure you want to delete # %s?', $knowhow['Knowhow']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Knowhows'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Knowhow'), array('action' => 'add')); ?> </li>
	</ul>
</div>
