<?php 
/**
Admin Page Framework v3.7.13 by Michael Uno 


*/
class UsersProfileCardWidgetAdminPageFramework_ClassTester {
    static public function getInstance($sClassName, array $aParameters = array()) {
        $_oReflection = new ReflectionClass($sClassName);
        return $_oReflection->newInstanceArgs($aParameters);
    }
    static public function call($oClass, $sMethodName, $aParameters) {
        if (version_compare(phpversion(), '<', '5.3.0')) {
            trigger_error('Program Name' . ': ' . sprintf('The method cannot run with your PHP version: %1$s', phpversion()), E_USER_WARNING);
            return;
        }
        $_sClassName = get_class($oClass);
        $_oMethod = self::_getMethod($_sClassName, $sMethodName);
        return $_oMethod->invokeArgs($oClass, $aParameters);
    }
    static private function _getMethod($sClassName, $sMethodName) {
        $_oClass = new ReflectionClass($sClassName);
        $_oMethod = $_oClass->getMethod($sMethodName);
        $_oMethod->setAccessible(true);
        return $_oMethod;
    }
}
