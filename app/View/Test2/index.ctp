<?php 
//echo "ready!";

//echo $token . "<br>";


//get_object_vars(object $cats)
//$roy = unserialize($cats);
//$field_names = array_values($cats[0]['Category']);
//$a = $cats[0]['Category']['cat_name'];
//echo $a . " is the greatest thang<br>";
///pr($field_names); <label for="category"><?php echo $r; </label>

//pr($cats);
//echo $cats[0]->Category->id;

echo $this->Form->create('Knowhow'); 
$options  = $categories;
$b = "<br>";
debug($list);
debug($options);
debug($art);
//var_dump($cats);

$catts = (array) $catts;
$k = array_keys($catts);

foreach ($catts as $k){
//		echo "$k $value\n";
//		print_r($value);
		//echo $value->Category->type;
//debug($k);

}

/*
print_r($k['type']);

*/
foreach($list as $item){
 //echo "listing --- " . $y .  $g . "<br>\n";
 //echo $g->id;
	echo $item['KnowhowTransaction']['cid'];
}

//debug($catts);

echo "<p></p>";
//foreach ($options as $r){
//}
//$options = array('1'=>'one','2'=>'two', '3'=>'three', '4'=> 'four', '5'=>'five');
//$selected = array(2,5);
//echo $this->Form->select('category', array('options' => $options, 'selected' => $selected ));

//echo $kk;
//echo "<p></p>";
//$keys = (array_keys[$options]);

//$keys = array_keys($cats);
?>



<ul id="selects">
<?php
$i = 0;
foreach ($categories as $key=>$value) { 
//print_r($r);
if( $i == 0) {
echo "<li><label for='". $value . "'>" . $value . $this->Form->checkbox('Category', array( 'multiple' => 'checkbox', 'hiddenField' => false )) . "</label></li>\n";
} else {

echo "<li><label for='". $value . "'>" . $value . $this->Form->checkbox('Category', array( 'multiple' => 'checkbox', 'hiddenField' => false )) . "</label></li>\n";

}
$i++;
}
?>

<ul>
<?php
//debug($catts);
/*
echo $this->Form->input('type', array('type' => 'select', 'multiple' => 'checkbox','options' => array(
                'client' => 'Client',
                'vendor' => 'Vendor',
                'employee' => 'Employee'
            )
         ));

*/
?>
<ul id="2selects">
<?php
$ls="<li>";
$le="</li>";
echo $this->Form->input('type', array('type' => 'select', 'class'=> 'selects', 'multiple' => 'checkbox','options' => $categories));
echo $this->Form->end(__('Submit'));
?>
</ul>
<!--
<fieldset>
<legend>Check some boxes</legend>
<input type="checkbox" name="test[]" value="foo" id="foo_field"><label for="foo_field">Foo</label>
<input type="checkbox" name="test[]" value="bar" id="bar_field"><label for="bar_field">Bar</label>
<input type="checkbox" name="test[]" value="baz" id="baz_field"><label for="baz_field">Baz</label>
<input type="submit" value="Submit" name="subm">
</fieldset>
-->


