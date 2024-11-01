<?php 
/**



*/
class UsersProfileCardWidgetAdminPageFramework_FrameworkUtility extends UsersProfileCardWidgetAdminPageFramework_WPUtility {
    static public function sortAdminSubMenu() {
        if (self::hasBeenCalled(__METHOD__)) {
            return;
        }
        foreach (( array )$GLOBALS['_apf_sub_menus_to_sort'] as $_sIndex => $_sMenuSlug) {
            if (!isset($GLOBALS['submenu'][$_sMenuSlug])) {
                continue;
            }
            ksort($GLOBALS['submenu'][$_sMenuSlug]);
            unset($GLOBALS['_apf_sub_menus_to_sort'][$_sIndex]);
        }
    }
    static public function getFrameworkVersion($bTrimDevVer = false) {
        $_sVersion = UsersProfileCardWidgetAdminPageFramework_Registry::getVersion();
        return $bTrimDevVer ? self::getSuffixRemoved($_sVersion, '.dev') : $_sVersion;
    }
    static public function getFrameworkName() {
        return UsersProfileCardWidgetAdminPageFramework_Registry::NAME;
    }
}
class UsersProfileCardWidgetAdminPageFramework_ArrayHandler extends UsersProfileCardWidgetAdminPageFramework_FrameworkUtility {
    public $aData = array();
    public $aDefault = array();
    public function __construct() {
        $_aParameters = func_get_args() + array($this->aData, $this->aDefault,);
        $this->aData = $_aParameters[0];
        $this->aDefault = $_aParameters[1];
    }
    public function get() {
        $_mDefault = null;
        $_aKeys = func_get_args() + array(null);
        if (!isset($_aKeys[0])) {
            return $this->uniteArrays($this->aData, $this->aDefault);
        }
        if (is_array($_aKeys[0])) {
            $_aKeys = $_aKeys[0];
            $_mDefault = $this->getElement($_aKeys, 1);
        }
        return $this->getArrayValueByArrayKeys($this->aData, $_aKeys, $this->_getDefaultValue($_mDefault, $_aKeys));
    }
    private function _getDefaultValue($_mDefault, $_aKeys) {
        return isset($_mDefault) ? $_mDefault : $this->getArrayValueByArrayKeys($this->aDefault, $_aKeys);
    }
    public function set() {
        $_aParameters = func_get_args();
        if (!isset($_aParameters[0], $_aParameters[1])) {
            return;
        }
        $_asKeys = $_aParameters[0];
        $_mValue = $_aParameters[1];
        if (is_scalar($_asKeys)) {
            $this->aData[$_asKeys] = $_mValue;
            return;
        }
        $this->setMultiDimensionalArray($this->aData, $_asKeys, $_mValue);
    }
    public function delete() {
        $_aParameters = func_get_args();
        if (!isset($_aParameters[0], $_aParameters[1])) {
            return;
        }
        $_asKeys = $_aParameters[0];
        $_mValue = $_aParameters[1];
        if (is_scalar($_asKeys)) {
            $this->aData[$_asKeys] = $_mValue;
            return;
        }
        $this->unsetDimensionalArrayElement($this->aData, $aKeys);
    }
    public function __toString() {
        return $this->getObjectInfo($this);
    }
}