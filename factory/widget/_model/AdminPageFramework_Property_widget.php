<?php 
/**



*/
class UsersProfileCardWidgetAdminPageFramework_Property_widget extends UsersProfileCardWidgetAdminPageFramework_Property_Base {
    public $_sPropertyType = 'widget';
    public $sStructureType = 'widget';
    public $sClassName = '';
    public $sCallerPath = '';
    public $sWidgetTitle = '';
    public $aWidgetArguments = array();
    public $bShowWidgetTitle = true;
    public $oWidget;
    public $sSettingNoticeActionHook = '';
    public function __construct($oCaller, $sCallerPath, $sClassName, $sCapability = 'manage_options', $sTextDomain = 'users-profile-card-widget', $sStructureType) {
        $this->_sFormRegistrationHook = 'load_' . $sClassName;
        $this->sSettingNoticeActionHook = 'load_' . $sClassName;
        parent::__construct($oCaller, $sCallerPath, $sClassName, $sCapability, $sTextDomain, $sStructureType);
    }
}
