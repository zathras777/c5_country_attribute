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
    }

    public function upgrade() {
        $pkg = parent::install();
    }
}
?>
