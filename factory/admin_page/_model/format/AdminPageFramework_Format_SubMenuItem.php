<?php 
/**



*/
class UsersProfileCardWidgetAdminPageFramework_Format_SubMenuItem extends UsersProfileCardWidgetAdminPageFramework_Format_Base {
    static public $aStructure = array();
    public $aSubMenuItem = array();
    public $oFactory;
    public $iParsedIndex = 1;
    public function __construct() {
        $_aParameters = func_get_args() + array($this->aSubMenuItem, $this->oFactory, $this->iParsedIndex,);
        $this->aSubMenuItem = $_aParameters[0];
        $this->oFactory = $_aParameters[1];
        $this->iParsedIndex = $_aParameters[2];
    }
    public function get() {
        $_aSubMenuItem = $this->getAsArray($this->aSubMenuItem);
        if (isset($_aSubMenuItem['page_slug'])) {
            $_oFormatter = new UsersProfileCardWidgetAdminPageFramework_Format_SubMenuPage($_aSubMenuItem, $this->oFactory, $this->iParsedIndex);
            return $_oFormatter->get();
        }
        if (isset($_aSubMenuItem['href'])) {
            $_oFormatter = new UsersProfileCardWidgetAdminPageFramework_Format_SubMenuLink($_aSubMenuItem, $this->oFactory, $this->iParsedIndex);
            return $_oFormatter->get();
        }
        return array();
    }
}
