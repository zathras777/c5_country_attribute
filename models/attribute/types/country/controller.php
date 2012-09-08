<?php

Loader::model('attribute/types/default/controller');

class CountryAttributeTypeController extends DefaultAttributeTypeController 
{
	public function form() 
	{
		$this->set('fieldPostName', $this->field('value'));
		$val = is_object($this->attributeValue) ? $this->getAttributeValue()->getValue() : '';
		$this->set('fieldValue', $val);
	}
}
?>
