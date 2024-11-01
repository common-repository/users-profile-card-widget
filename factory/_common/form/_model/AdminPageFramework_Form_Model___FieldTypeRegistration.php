<?php 
/**



*/
class UsersProfileCardWidgetAdminPageFramework_Form_Model___FieldTypeRegistration extends UsersProfileCardWidgetAdminPageFramework_FrameworkUtility {
    public function __construct(array $aFieldTypeDefinition, $sStructureType) {
        $this->_initialize($aFieldTypeDefinition, $sStructureType);
    }
    private function _initialize($aFieldTypeDefinition, $sStructureType) {
        if (is_callable($aFieldTypeDefinition['hfFieldSetTypeSetter'])) {
            call_user_func_array($aFieldTypeDefinition['hfFieldSetTypeSetter'], array($sStructureType));
        }
        if (is_callable($aFieldTypeDefinition['hfFieldLoader'])) {
            call_user_func_array($aFieldTypeDefinition['hfFieldLoader'], array());
        }
    }
}
