<?php
defined('C5_EXECUTE') or die(_("Access Denied."));

class CountryAttributePackage extends Package {

     protected $pkgHandle = 'country_attribute';
     protected $appVersionRequired = '5.5.1';
     protected $pkgVersion = '0.1';

     public function getPackageDescription() {
          return t("Concrete5 attribute type for a country.");
     }

     public function getPackageName() {
          return t("Country Attribute");
     }
     
    public function install() {
        $pkg = parent::install();
        /* We install the attribute... */
        Loader::model('attribute/type');
        $at = AttributeType::add('country', 'Country', $pkg);
        /* then we associate with collections and users. */
        Loader::model('attribute/category');
        foreach (array('collection', 'user') as $c) {
            $cat = AttributeKeyCategory::getByHandle($c);
            $cat->associateAttributeKeyType($at);
        }
    }

    public function upgrade() {
        $pkg = parent::install();
    }
}
?>
