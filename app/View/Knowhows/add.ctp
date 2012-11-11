<?php
debug($cats);
var_dump($knowhows);
?>


<div class="knowhows form">
<?php 
	echo $this->Form->create('Knowhow'); 
//	echo $this->Form->create();

?>
	<fieldset>
		<legend><?php echo __('Add Knowhow'); ?></legend>
	<?php
		echo $this->Form->input('content');
		echo $this->Form->input('slug');
		echo $this->Form->input('timestamp');
		echo $this->Form->input('description');
		echo $this->Form->input('code');
		?>
		
		<ul id="selects">

		<?php
//foreach ($cats as $key=>$value) { 
//echo "<li><label for='". $value . "'>" . $value . $this->Form->checkbox('Category', array('value' => $key, 'multiple'=> true )) . "</label></li>\n";
//}

echo $this->Form->input('type', array('type' => 'select', 'multiple' => 'checkbox','options' => $cats));

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


<?php
echo $this->Form->create(null, array(
    'url' => 'http://www.google.com/search',
    'type' => 'get'
));