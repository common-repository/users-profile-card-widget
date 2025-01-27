<?php 
/**



*/
class UsersProfileCardWidgetAdminPageFramework_FieldType_text extends UsersProfileCardWidgetAdminPageFramework_FieldType {
    public $aFieldTypeSlugs = array('text', 'password', 'date', 'datetime', 'datetime-local', 'email', 'month', 'search', 'tel', 'url', 'week',);
    protected $aDefaultKeys = array();
    protected function getStyles() {
        return ".users-profile-card-widget-field.users-profile-card-widget-field-text > .users-profile-card-widget-input-label-container {vertical-align: middle; }.users-profile-card-widget-field.users-profile-card-widget-field-text > .users-profile-card-widget-input-label-container.users-profile-card-widget-field-text-multiple-labels {display: block;}";
    }
    protected function getField($aField) {
        $_aOutput = array();
        foreach (( array )$aField['label'] as $_sKey => $_sLabel) {
            $_aOutput[] = $this->_getFieldOutputByLabel($_sKey, $_sLabel, $aField);
        }
        $_aOutput[] = "<div class='repeatable-field-buttons'></div>";
        return implode('', $_aOutput);
    }
    private function _getFieldOutputByLabel($sKey, $sLabel, $aField) {
        $_bIsArray = is_array($aField['label']);
        $_sClassSelector = $_bIsArray ? 'users-profile-card-widget-field-text-multiple-labels' : '';
        $_sLabel = $this->getElementByLabel($aField['label'], $sKey, $aField['label']);
        $aField['value'] = $this->getElementByLabel($aField['value'], $sKey, $aField['label']);
        $_aInputAttributes = $_bIsArray ? array('name' => $aField['attributes']['name'] . "[{$sKey}]", 'id' => $aField['attributes']['id'] . "_{$sKey}", 'value' => $aField['value'],) + $aField['attributes'] : $aField['attributes'];
        $_aOutput = array($this->getElementByLabel($aField['before_label'], $sKey, $aField['label']), "<div class='users-profile-card-widget-input-label-container {$_sClassSelector}'>", "<label for='" . $_aInputAttributes['id'] . "'>", $this->getElementByLabel($aField['before_input'], $sKey, $aField['label']), $_sLabel ? "<span class='users-profile-card-widget-input-label-string' style='min-width:" . $this->sanitizeLength($aField['label_min_width']) . ";'>" . $_sLabel . "</span>" : '', "<input " . $this->getAttributes($_aInputAttributes) . " />", $this->getElementByLabel($aField['after_input'], $sKey, $aField['label']), "</label>", "</div>", $this->getElementByLabel($aField['after_label'], $sKey, $aField['label']),);
        return implode('', $_aOutput);
    }
}
class UsersProfileCardWidgetAdminPageFramework_FieldType_file extends UsersProfileCardWidgetAdminPageFramework_FieldType_text {
    public $aFieldTypeSlugs = array('file',);
    protected $aDefaultKeys = array('attributes' => array('accept' => 'audio/*|video/*|image/*|MIME_type',),);
    protected function setUp() {
    }
    protected function getScripts() {
        return "";
    }
    protected function getStyles() {
        return "";
    }
    protected function getField($aField) {
        return parent::getField($aField) . $this->getHTMLTag('input', array('type' => 'hidden', 'value' => '', 'name' => $aField['attributes']['name'] . '[_dummy_value]',)) . $this->getHTMLTag('input', array('type' => 'hidden', 'name' => '__unset_' . $aField['_structure_type'] . '[' . $aField['_input_name_flat'] . '|_dummy_value' . ']', 'value' => $aField['_input_name_flat'] . '|_dummy_value', 'class' => 'unset-element-names element-address',));
    }
}
