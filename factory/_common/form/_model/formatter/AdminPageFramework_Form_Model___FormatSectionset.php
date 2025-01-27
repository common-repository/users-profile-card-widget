<?php 
/**



*/
class UsersProfileCardWidgetAdminPageFramework_Form_Model___FormatSectionset extends UsersProfileCardWidgetAdminPageFramework_Form_Utility {
    static public $aStructure = array('section_id' => '_default', 'page_slug' => null, 'tab_slug' => null, 'section_tab_slug' => null, 'title' => null, 'description' => null, 'capability' => null, 'if' => true, 'order' => null, 'help' => null, 'help_aside' => null, 'repeatable' => false, 'sortable' => false, 'attributes' => array('class' => null, 'style' => null, 'tab' => array(),), 'class' => array('tab' => array(),), 'hidden' => false, 'collapsible' => false, 'save' => true, 'content' => null, 'tip' => null, '_fields_type' => null, '_structure_type' => null, '_is_first_index' => false, '_is_last_index' => false, '_section_path' => '', '_section_path_array' => '', '_nested_depth' => 0, '_caller_object' => null,);
    public $aSectionset = array();
    public $sSectionPath = '';
    public $sStructureType = '';
    public $sCapability = 'manage_options';
    public $iCountOfElements = 0;
    public $oCaller = null;
    public function __construct() {
        $_aParameters = func_get_args() + array($this->aSectionset, $this->sSectionPath, $this->sStructureType, $this->sCapability, $this->iCountOfElements, $this->oCaller,);
        $this->aSectionset = $_aParameters[0];
        $this->sSectionPath = $_aParameters[1];
        $this->sStructureType = $_aParameters[2];
        $this->sCapability = $_aParameters[3];
        $this->iCountOfElements = $_aParameters[4];
        $this->oCaller = $_aParameters[5];
    }
    public function get() {
        $_aSectionPath = explode('|', $this->sSectionPath);
        $_aSectionset = $this->uniteArrays(array('_fields_type' => $this->sStructureType, '_structure_type' => $this->sStructureType, '_section_path' => $this->sSectionPath, '_section_path_array' => $_aSectionPath, '_nested_depth' => count($_aSectionPath) - 1,) + $this->aSectionset + array('capability' => $this->sCapability,), self::$aStructure);
        $_aSectionset['order'] = $this->getAOrB(is_numeric($_aSectionset['order']), $_aSectionset['order'], $this->iCountOfElements + 10);
        $_oCollapsibleArgumentFormatter = new UsersProfileCardWidgetAdminPageFramework_Form_Model___Format_CollapsibleSection($_aSectionset['collapsible'], $_aSectionset['title']);
        $_aSectionset['collapsible'] = $_oCollapsibleArgumentFormatter->get();
        $_aSectionset['class'] = $this->getAsArray($_aSectionset['class']);
        $_aSectionset['_caller_object'] = $this->oCaller;
        return $_aSectionset;
    }
}
