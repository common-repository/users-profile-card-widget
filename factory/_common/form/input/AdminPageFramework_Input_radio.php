<?php 
/**



*/
class UsersProfileCardWidgetAdminPageFramework_Input_radio extends UsersProfileCardWidgetAdminPageFramework_Input_Base {
    public function get() {
        $_aParams = func_get_args() + array(0 => '', 1 => array());
        $_sLabel = $_aParams[0];
        $_aAttributes = $this->uniteArrays($this->getElementAsArray($_aParams, 1, array()), $this->aAttributes);
        return "<{$this->aOptions['input_container_tag']} " . $this->getAttributes($this->aOptions['input_container_attributes']) . ">" . "<input " . $this->getAttributes($_aAttributes) . " />" . "</{$this->aOptions['input_container_tag']}>" . "<{$this->aOptions['label_container_tag']} " . $this->getAttributes($this->aOptions['label_container_attributes']) . ">" . $_sLabel . "</{$this->aOptions['label_container_tag']}>";
    }
    public function getAttributesByKey() {
        $_aParams = func_get_args() + array(0 => '',);
        $_sKey = $_aParams[0];
        return $this->getElementAsArray($this->aAttributes, $_sKey, array()) + array('type' => 'radio', 'checked' => isset($this->aAttributes['value']) && $this->aAttributes['value'] == $_sKey ? 'checked' : null, 'value' => $_sKey, 'id' => $this->getAttribute('id') . '_' . $_sKey, 'data-id' => $this->getAttribute('id'),) + $this->aAttributes;
    }
}
