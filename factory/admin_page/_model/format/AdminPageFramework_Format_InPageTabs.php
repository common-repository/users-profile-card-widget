<?php 
/**



*/
class UsersProfileCardWidgetAdminPageFramework_Format_InPageTabs extends UsersProfileCardWidgetAdminPageFramework_Format_Base {
    static public $aStructure = array();
    public $aInPageTabs = array();
    public $sPageSlug = '';
    public $oFactory;
    public function __construct() {
        $_aParameters = func_get_args() + array($this->aInPageTabs, $this->sPageSlug, $this->oFactory,);
        $this->aInPageTabs = $_aParameters[0];
        $this->sPageSlug = $_aParameters[1];
        $this->oFactory = $_aParameters[2];
    }
    public function get() {
        $_aInPageTabs = $this->addAndApplyFilter($this->oFactory, "tabs_{$this->oFactory->oProp->sClassName}_{$this->sPageSlug}", $this->aInPageTabs);
        foreach (( array )$_aInPageTabs as $_sTabSlug => $_aInPageTab) {
            if (!is_array($_aInPageTab)) {
                continue;
            }
            $_oFormatter = new UsersProfileCardWidgetAdminPageFramework_Format_InPageTab($_aInPageTab, $this->sPageSlug, $this->oFactory);
            $_aInPageTabs[$_sTabSlug] = $_oFormatter->get();
        }
        uasort($_aInPageTabs, array($this, 'sortArrayByKey'));
        return $_aInPageTabs;
    }
}
