<?php 
/**



*/
class UsersProfileCardWidgetAdminPageFramework_Form_View___Generate_FieldTagID extends UsersProfileCardWidgetAdminPageFramework_Form_View___Generate_Field_Base {
    public function get() {
        return $this->_getFiltered($this->_getBaseFieldTagID());
    }
    public function getModel() {
        return $this->get() . '__' . $this->sIndexMark;
    }
    protected function _getBaseFieldTagID() {
        $_sSectionIndex = isset($this->aArguments['_section_index']) ? '__' . $this->aArguments['_section_index'] : '';
        $_sSectionPart = implode('_', $this->aArguments['_section_path_array']);
        $_sFieldPart = implode('_', $this->aArguments['_field_path_array']);
        return $this->_isSectionSet() ? $_sSectionPart . $_sSectionIndex . '_' . $_sFieldPart : $_sFieldPart;
    }
}
class UsersProfileCardWidgetAdminPageFramework_Form_View___Generate_FieldInputID extends UsersProfileCardWidgetAdminPageFramework_Form_View___Generate_FieldTagID {
    public $isIndex = '';
    public function __construct() {
        $_aParameters = func_get_args() + array($this->aArguments, $this->isIndex, $this->hfCallback,);
        $this->aArguments = $_aParameters[0];
        $this->isIndex = $_aParameters[1];
        $this->hfCallback = $_aParameters[2];
    }
    public function get() {
        return $this->_getFiltered($this->_getBaseFieldTagID() . '__' . $this->isIndex);
    }
}
