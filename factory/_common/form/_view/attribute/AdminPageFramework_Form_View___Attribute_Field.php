<?php 
/**



*/
abstract class UsersProfileCardWidgetAdminPageFramework_Form_View___Attribute_Base extends UsersProfileCardWidgetAdminPageFramework_FrameworkUtility {
    public $sContext = '';
    public $aArguments = array();
    public $aAttributes = array();
    public function __construct() {
        $_aParameters = func_get_args() + array($this->aArguments, $this->aAttributes,);
        $this->aArguments = $_aParameters[0];
        $this->aAttributes = $_aParameters[1];
    }
    public function get() {
        return $this->getAttributes($this->_getFormattedAttributes());
    }
    protected function _getFormattedAttributes() {
        return $this->aAttributes + $this->_getAttributes();
    }
    protected function _getAttributes() {
        return array();
    }
}
abstract class UsersProfileCardWidgetAdminPageFramework_Form_View___Attribute_FieldContainer_Base extends UsersProfileCardWidgetAdminPageFramework_Form_View___Attribute_Base {
    protected function _getFormattedAttributes() {
        $_aAttributes = $this->uniteArrays($this->getElementAsArray($this->aArguments, array('attributes', $this->sContext)), $this->aAttributes + $this->_getAttributes());
        $_aAttributes['class'] = $this->getClassAttribute($this->getElement($_aAttributes, 'class', array()), $this->getElement($this->aArguments, array('class', $this->sContext), array()));
        return $_aAttributes;
    }
}
class UsersProfileCardWidgetAdminPageFramework_Form_View___Attribute_Field extends UsersProfileCardWidgetAdminPageFramework_Form_View___Attribute_FieldContainer_Base {
    public $sContext = 'field';
    protected function _getAttributes() {
        return array('id' => $this->aArguments['_field_container_id'], 'data-type' => $this->aArguments['type'], 'class' => "users-profile-card-widget-field users-profile-card-widget-field-" . $this->aArguments['type'] . $this->getAOrB($this->aArguments['attributes']['disabled'], ' disabled', '') . $this->getAOrB($this->aArguments['_is_sub_field'], ' users-profile-card-widget-subfield', ''));
    }
}
