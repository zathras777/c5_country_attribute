<?php

Loader::model('attribute/types/default/controller');

class CountryAttributeTypeController extends DefaultAttributeTypeController 
{
    /* Definition of the field that will be used for the attribute index
     * field (2 characters with default of NULL).
     */
	protected $searchIndexFieldDefinition = 'C 2 NULL';

    public function searchKeywords($keywords)
    {
        /* Search for keywords, but as we only store the country code we
         * scan through the list of countries that may match (using a 
         * case insensitive match) and then use their country codes as a
         * possible match.
         */
        $db = Loader::db();
        $codes = array();
        $cl = Loader::helper('lists/countries');
        foreach($cl->getCountries() as $code => $name) {
            if (stristr($name, $keywords)) { $codes[] = $code; }
            if ($code == $keyword) { $codes[] = $code; }
        }
        $fld_name = "ak_".$this->attributeKey->getAttributeKeyHandle();
        $criteria = $fld_name."=".$db->quote($keywords);
        if (count($codes) > 0) {
            $criteria .= " OR ".$fld_name." IN ('".implode("','", $codes)."')";
        }
        return $criteria;
    }

	public function form() 
	{
		$this->set('fieldPostName', $this->field('value'));
		$val = is_object($this->attributeValue) ? $this->getAttributeValue()->getValue() : '';
		$this->set('fieldValue', $val);
	}
}
?>
