<?php 
/**



*/
class UsersProfileCardWidgetAdminPageFramework_Factory_View__SettingNotice extends UsersProfileCardWidgetAdminPageFramework_FrameworkUtility {
    public $oFactory;
    public function __construct($oFactory, $sActionHookName = 'admin_notices') {
        $this->oFactory = $oFactory;
        add_action($sActionHookName, array($this, '_replyToPrintSettingNotice'));
    }
    public function _replyToPrintSettingNotice() {
        if (!$this->_shouldProceed()) {
            return;
        }
        $this->oFactory->oForm->printSubmitNotices();
    }
    private function _shouldProceed() {
        if (!$this->oFactory->_isInThePage()) {
            return false;
        }
        if ($this->hasBeenCalled(__METHOD__)) {
            return false;
        }
        return isset($this->oFactory->oForm);
    }
}
