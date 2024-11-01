<?php 
/**



*/
class UsersProfileCardWidgetAdminPageFramework_Form_View___Attribute_Fieldset extends UsersProfileCardWidgetAdminPageFramework_Form_View___Attribute_FieldContainer_Base {
    public $sContext = 'fieldset';
    protected function _getAttributes() {
        return array('id' => $this->sContext . '-' . $this->aArguments['tag_id'], 'class' => 'users-profile-card-widget-' . $this->sContext, 'data-field_id' => $this->aArguments['tag_id'],);
    }
}
