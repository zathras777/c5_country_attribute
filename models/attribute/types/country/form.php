<?php
defined('C5_EXECUTE') or die(_("Access Denied."));
$f = Loader::helper('form');
$co = Loader::helper('lists/countries');
$countries = array_merge(array('' => t('Choose Country')), $co->getCountries());
?>
<div class="ccm-attribute-address-line ccm-attribute-address-country">
<?php echo $f->select($fieldPostName, $countries, $fieldValue); ?>
</div>

