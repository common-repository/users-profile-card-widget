<?php 
/**



*/
class UsersProfileCardWidgetAdminPageFramework_Form_View___FieldsetRows extends UsersProfileCardWidgetAdminPageFramework_FrameworkUtility {
    public $aFieldsetsPerSection = array();
    public $iSectionIndex = null;
    public $aSavedData = array();
    public $aFieldErrors = array();
    public $aFieldTypeDefinitions = array();
    public $aCallbacks = array();
    public $oMsg;
    public function __construct() {
        $_aParameters = func_get_args() + array($this->aFieldsetsPerSection, $this->iSectionIndex, $this->aSavedData, $this->aFieldErrors, $this->aFieldTypeDefinitions, $this->aCallbacks, $this->oMsg,);
        $this->aFieldsetsPerSection = $_aParameters[0];
        $this->iSectionIndex = $_aParameters[1];
        $this->aSavedData = $_aParameters[2];
        $this->aFieldErrors = $_aParameters[3];
        $this->aFieldTypeDefinitions = $_aParameters[4];
        $this->aCallbacks = $_aParameters[5] + $this->aCallbacks;
        $this->oMsg = $_aParameters[6];
    }
    public function get($bTableRow = true) {
        $_sMethodName = $this->getAOrB($bTableRow, '_getFieldsetRow', '_getFieldset');
        $_aOutput = array();
        foreach ($this->aFieldsetsPerSection as $_aFieldset) {
            $_oFieldsetOutputFormatter = new UsersProfileCardWidgetAdminPageFramework_Form_Model___Format_FieldsetOutput($_aFieldset, $this->iSectionIndex, $this->aFieldTypeDefinitions);
            $_aOutput[] = call_user_func_array(array($this, $_sMethodName), array($_oFieldsetOutputFormatter->get()));
        }
        return implode(PHP_EOL, $_aOutput);
    }
    private function _getFieldsetRow($aFieldset) {
        $_oFieldsetRow = new UsersProfileCardWidgetAdminPageFramework_Form_View___FieldsetTableRow($aFieldset, $this->aSavedData, $this->aFieldErrors, $this->aFieldTypeDefinitions, $this->aCallbacks, $this->oMsg);
        return $_oFieldsetRow->get();
    }
    private function _getFieldset($aFieldset) {
        $_oFieldsetRow = new UsersProfileCardWidgetAdminPageFramework_Form_View___FieldsetRow($aFieldset, $this->aSavedData, $this->aFieldErrors, $this->aFieldTypeDefinitions, $this->aCallbacks, $this->oMsg);
        return $_oFieldsetRow->get();
    }
}
