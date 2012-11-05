<div class="knowhows index">
	<h2><?php echo __('Knowhows'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('content'); ?></th>
			<th><?php echo $this->Paginator->sort('slug'); ?></th>
			<th><?php echo $this->Paginator->sort('timestamp'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($knowhows as $knowhow): ?>
	<tr>
		<td><?php echo h($knowhow['Knowhow']['id']); ?>&nbsp;</td>
		<td><?php echo h($knowhow['Knowhow']['content']); ?>&nbsp;</td>
		<td><?php echo h($knowhow['Knowhow']['slug']); ?>&nbsp;</td>
		<td><?php echo h($knowhow['Knowhow']['timestamp']); ?>&nbsp;</td>
		<td><?php echo h($knowhow['Knowhow']['description']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $knowhow['Knowhow']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $knowhow['Knowhow']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $knowhow['Knowhow']['id']), null, __('Are you sure you want to delete # %s?', $knowhow['Knowhow']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Knowhow'), array('action' => 'add')); ?></li>
	</ul>
</div>

