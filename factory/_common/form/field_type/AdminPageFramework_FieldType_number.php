<?php 
/**



*/
class UsersProfileCardWidgetAdminPageFramework_FieldType_number extends UsersProfileCardWidgetAdminPageFramework_FieldType_text {
    public $aFieldTypeSlugs = array('number', 'range');
    protected $aDefaultKeys = array('attributes' => array('size' => 30, 'maxlength' => 400, 'class' => null, 'min' => null, 'max' => null, 'step' => null, 'readonly' => null, 'required' => null, 'placeholder' => null, 'list' => null, 'autofocus' => null, 'autocomplete' => null,),);
    protected function getStyles() {
        return "";
    }
}
