<?php 
/**



*/
abstract class UsersProfileCardWidgetAdminPageFramework_UserMeta_Router extends UsersProfileCardWidgetAdminPageFramework_Factory {
    public function __construct($oProp) {
        parent::__construct($oProp);
        if (!$this->oProp->bIsAdmin) {
            return;
        }
        $this->oUtil->registerAction('current_screen', array($this, '_replyToDetermineToLoad'));
        add_action('set_up_' . $this->oProp->sClassName, array($this, '_replyToSetUpHooks'));
    }
    public function _isInThePage() {
        if (!$this->oProp->bIsAdmin) {
            return false;
        }
        return in_array($this->oProp->sPageNow, array('user-new.php', 'user-edit.php', 'profile.php'));
    }
    public function _replyToSetUpHooks($oFactory) {
        add_action('show_user_profile', array($this, '_replyToPrintFields'));
        add_action('edit_user_profile', array($this, '_replyToPrintFields'));
        add_action('user_new_form', array($this, '_replyToPrintFields'));
        add_action('personal_options_update', array($this, '_replyToSaveFieldValues'));
        add_action('edit_user_profile_update', array($this, '_replyToSaveFieldValues'));
        add_action('user_register', array($this, '_replyToSaveFieldValues'));
    }
}
abstract class UsersProfileCardWidgetAdminPageFramework_UserMeta_Model extends UsersProfileCardWidgetAdminPageFramework_UserMeta_Router {
    public function _replyToGetSavedFormData() {
        $_iUserID = isset($GLOBALS['profileuser']->ID) ? $GLOBALS['profileuser']->ID : 0;
        $_oMetaData = new UsersProfileCardWidgetAdminPageFramework_UserMeta_Model___UserMeta($_iUserID, $this->oForm->aFieldsets);
        $this->oProp->aOptions = $_oMetaData->get();
        return parent::_replyToGetSavedFormData();
    }
    public function _replyToSaveFieldValues($iUserID) {
        if (!current_user_can('edit_user', $iUserID)) {
            return;
        }
        $_aInputs = $this->oForm->getSubmittedData($_POST, true, false);
        $_aInputsRaw = $_aInputs;
        $_aSavedMeta = $this->oUtil->getSavedUserMetaArray($iUserID, array_keys($_aInputs));
        $_aInputs = $this->oUtil->addAndApplyFilters($this, "validation_{$this->oProp->sClassName}", call_user_func_array(array($this, 'validate'), array($_aInputs, $_aSavedMeta, $this)), $_aSavedMeta, $this);
        if ($this->hasFieldError()) {
            $this->setLastInputs($_aInputsRaw);
        }
        $this->oForm->updateMetaDataByType($iUserID, $_aInputs, $this->oForm->dropRepeatableElements($_aSavedMeta), $this->oForm->sStructureType);
    }
}
abstract class UsersProfileCardWidgetAdminPageFramework_UserMeta_View extends UsersProfileCardWidgetAdminPageFramework_UserMeta_Model {
    public function content($sContent) {
        return $sContent;
    }
    public function _replyToPrintFields() {
        $_aOutput = array();
        $_aOutput[] = $this->oForm->get();
        $_sOutput = $this->oUtil->addAndApplyFilters($this, 'content_' . $this->oProp->sClassName, $this->content(implode(PHP_EOL, $_aOutput)));
        $this->oUtil->addAndDoActions($this, 'do_' . $this->oProp->sClassName, $this);
        echo $_sOutput;
    }
}
abstract class UsersProfileCardWidgetAdminPageFramework_UserMeta_Controller extends UsersProfileCardWidgetAdminPageFramework_UserMeta_View {
    public function setUp() {
    }
    public function enqueueStyles($aSRCs, $aPostTypes = array(), $aCustomArgs = array()) {
        return $this->oResource->_enqueueStyles($aSRCs, $aPostTypes, $aCustomArgs);
    }
    public function enqueueStyle($sSRC, $aPostTypes = array(), $aCustomArgs = array()) {
        return $this->oResource->_enqueueStyle($sSRC, $aPostTypes, $aCustomArgs);
    }
    public function enqueueScripts($aSRCs, $aPostTypes = array(), $aCustomArgs = array()) {
        return $this->oResource->_enqueueScripts($aSRCs, $aPostTypes, $aCustomArgs);
    }
    public function enqueueScript($sSRC, $aPostTypes = array(), $aCustomArgs = array()) {
        return $this->oResource->_enqueueScript($sSRC, $aPostTypes, $aCustomArgs);
    }
}
abstract class UsersProfileCardWidgetAdminPageFramework_UserMeta extends UsersProfileCardWidgetAdminPageFramework_UserMeta_Controller {
    protected $_sStructureType = 'user_meta';
    public function __construct($sCapability = 'read', $sTextDomain = 'users-profile-card-widget') {
        $_sProprtyClassName = isset($this->aSubClassNames['oProp']) ? $this->aSubClassNames['oProp'] : 'UsersProfileCardWidgetAdminPageFramework_Property_' . $this->_sStructureType;
        $this->oProp = new $_sProprtyClassName($this, get_class($this), $sCapability, $sTextDomain, $this->_sStructureType);
        parent::__construct($this->oProp);
    }
}
