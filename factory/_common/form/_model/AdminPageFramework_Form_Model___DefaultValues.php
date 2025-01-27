<?php 
/**



*/
class UsersProfileCardWidgetAdminPageFramework_Form_Model___DefaultValues extends UsersProfileCardWidgetAdminPageFramework_Form_Base {
    public $aFieldsets = array();
    public function __construct() {
        $_aParameters = func_get_args() + array($this->aFieldsets,);
        $this->aFieldsets = $_aParameters[0];
    }
    public function get() {
        $_aResult = $this->_getDefaultValues($this->aFieldsets, array());
        return $_aResult;
    }
    private function _getDefaultValues($aFieldsets, $aDefaultOptions) {
        foreach ($aFieldsets as $_sSectionPath => $_aItems) {
            $_aSectionPath = explode('|', $_sSectionPath);
            foreach ($_aItems as $_sFieldPath => $_aFieldset) {
                $_aFieldPath = explode('|', $_sFieldPath);
                $this->setMultiDimensionalArray($aDefaultOptions, '_default' === $_sSectionPath ? array($_sFieldPath) : array_merge($_aSectionPath, $_aFieldPath), $this->_getDefautValue($_aFieldset));
            }
        }
        return $aDefaultOptions;
    }
    private function _getDefautValue($aFieldset) {
        $_aSubFields = $this->getIntegerKeyElements($aFieldset);
        if (count($_aSubFields) == 0) {
            return $this->getElement($aFieldset, 'value', $this->getElement($aFieldset, 'default', null));
        }
        $_aDefault = array();
        array_unshift($_aSubFields, $aFieldset);
        foreach ($_aSubFields as $_iIndex => $_aField) {
            $_aDefault[$_iIndex] = $this->getElement($_aField, 'value', $this->getElement($_aField, 'default', null));
        }
        return $_aDefault;
    }
}
