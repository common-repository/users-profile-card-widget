<?php 
/**



*/
class UsersProfileCardWidgetAdminPageFramework_Form_View___Generate_FieldInputName extends UsersProfileCardWidgetAdminPageFramework_Form_View___Generate_FlatFieldName {
    public $sIndex = '';
    public function __construct() {
        $_aParameters = func_get_args() + array($this->aArguments, $this->sIndex, $this->hfCallback,);
        $this->aArguments = $_aParameters[0];
        $this->sIndex = ( string )$_aParameters[1];
        $this->hfCallback = $_aParameters[2];
    }
    public function get() {
        $_sIndex = $this->getAOrB('0' !== $this->sIndex && empty($this->sIndex), '', "[" . $this->sIndex . "]");
        return $this->_getFiltered($this->_getFieldName() . $_sIndex);
    }
    protected function _getFiltered($sSubject) {
        return is_callable($this->hfCallback) ? call_user_func_array($this->hfCallback, array($sSubject, $this->aArguments, $this->sIndex)) : $sSubject;
    }
}
class UsersProfileCardWidgetAdminPageFramework_Form_View___Generate_FlatFieldInputName extends UsersProfileCardWidgetAdminPageFramework_Form_View___Generate_FieldInputName {
    public function get() {
        $_sIndex = $this->getAOrB('0' !== $this->sIndex && empty($this->sIndex), '', "|{$this->sIndex}");
        return $this->_getFiltered($this->_getFlatFieldName() . $_sIndex);
    }
}
