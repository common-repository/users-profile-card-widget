<?php 
/**



*/
class UsersProfileCardWidgetAdminPageFramework_AdminNotice extends UsersProfileCardWidgetAdminPageFramework_FrameworkUtility {
    static private $_aNotices = array();
    public $sNotice = '';
    public $aAttributes = array();
    public $aCallbacks = array('should_show' => null,);
    public function __construct($sNotice, array $aAttributes = array('class' => 'error'), array $aCallbacks = array()) {
        $this->aAttributes = $aAttributes + array('class' => 'error',);
        $this->aAttributes['class'] = $this->getClassAttribute($this->aAttributes['class'], 'users-profile-card-widget-settings-notice-message', 'users-profile-card-widget-settings-notice-container', 'notice', 'is-dismissible');
        $this->aCallbacks = $aCallbacks + $this->aCallbacks;
        new UsersProfileCardWidgetAdminPageFramework_AdminNotice___Script;
        if (!$sNotice) {
            return;
        }
        $this->sNotice = $sNotice;
        self::$_aNotices[$sNotice] = $sNotice;
        $this->registerAction('admin_notices', array($this, '_replyToDisplayAdminNotice'));
        $this->registerAction('network_admin_notices', array($this, '_replyToDisplayAdminNotice'));
    }
    public function _replyToDisplayAdminNotice() {
        if (!$this->_shouldProceed()) {
            return;
        }
        $_aAttributes = $this->aAttributes + array('style' => '');
        $_aAttributes['style'] = $this->getStyleAttribute($_aAttributes['style'], 'display: none');
        echo "<div " . $this->getAttributes($_aAttributes) . ">" . "<p>" . self::$_aNotices[$this->sNotice] . "</p>" . "</div>" . "<noscript>" . "<div " . $this->getAttributes($this->aAttributes) . ">" . "<p>" . self::$_aNotices[$this->sNotice] . "</p>" . "</div>" . "</noscript>";
        unset(self::$_aNotices[$this->sNotice]);
    }
    private function _shouldProceed() {
        if (!is_callable($this->aCallbacks['should_show'])) {
            return true;
        }
        return call_user_func_array($this->aCallbacks['should_show'], array(true,));
    }
}
