<?php 
/**



*/
class UsersProfileCardWidgetAdminPageFramework_FieldType_section_title extends UsersProfileCardWidgetAdminPageFramework_FieldType_text {
    public $aFieldTypeSlugs = array('section_title',);
    protected $aDefaultKeys = array('label_min_width' => 30, 'attributes' => array('size' => 20, 'maxlength' => 100,),);
    protected function getStyles() {
        return ".users-profile-card-widget-section-tab .users-profile-card-widget-field-section_title {padding: 0.5em;} .users-profile-card-widget-section-tab .users-profile-card-widget-field-section_title .users-profile-card-widget-input-label-string { vertical-align: middle; margin-left: 0.2em;}.users-profile-card-widget-section-tab .users-profile-card-widget-fields {display: inline-block;} .users-profile-card-widget-field.users-profile-card-widget-field-section_title {float: none;} .users-profile-card-widget-field.users-profile-card-widget-field-section_title input {background-color: #fff;color: #333;border-color: #ddd;box-shadow: inset 0 1px 2px rgba(0,0,0,.07);border-width: 1px;border-style: solid;outline: 0;box-sizing: border-box;vertical-align: middle;}";
    }
    protected function getField($aField) {
        $aField['attributes'] = array('type' => 'text') + $aField['attributes'];
        return parent::getField($aField);
    }
}
