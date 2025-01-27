<?php 
/**



*/
class UsersProfileCardWidgetAdminPageFramework_Model__FormEmailHandler extends UsersProfileCardWidgetAdminPageFramework_FrameworkUtility {
    public $oFactory;
    public function __construct($oFactory) {
        $this->oFactory = $oFactory;
        if (!isset($_GET['apf_action'], $_GET['transient'])) {
            return;
        }
        if ('email' !== $_GET['apf_action']) {
            return;
        }
        ignore_user_abort(true);
        $this->registerAction('after_setup_theme', array($this, '_replyToSendFormEmail'));
    }
    static public $_bDoneEmail = false;
    public function _replyToSendFormEmail() {
        if (self::$_bDoneEmail) {
            return;
        }
        self::$_bDoneEmail = true;
        $_sTransient = $this->getElement($_GET, 'transient', '');
        if (!$_sTransient) {
            return;
        }
        $_aFormEmail = $this->getTransient($_sTransient);
        $this->deleteTransient($_sTransient);
        if (!is_array($_aFormEmail)) {
            return;
        }
        $_oEmail = new UsersProfileCardWidgetAdminPageFramework_FormEmail($_aFormEmail['email_options'], $_aFormEmail['input'], $_aFormEmail['section_id']);
        $_bSent = $_oEmail->send();
        exit;
    }
}
