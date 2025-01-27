<?php 
/**



*/
abstract class UsersProfileCardWidgetAdminPageFramework_PageLoadInfo_Base {
    public $oProp;
    public $oMsg;
    protected $_nInitialMemoryUsage;
    public function __construct($oProp, $oMsg) {
        if ($oProp->bIsAdminAjax || !$oProp->bIsAdmin) {
            return;
        }
        if (!defined('WP_DEBUG') || !WP_DEBUG) {
            return;
        }
        $this->oProp = $oProp;
        $this->oMsg = $oMsg;
        $this->_nInitialMemoryUsage = memory_get_usage();
        add_action('in_admin_footer', array($this, '_replyToSetPageLoadInfoInFooter'), 999);
    }
    public function _replyToSetPageLoadInfoInFooter() {
    }
    static private $_bLoadedPageLoadInfo = false;
    public function _replyToGetPageLoadInfo($sFooterHTML) {
        if (self::$_bLoadedPageLoadInfo) {
            return;
        }
        self::$_bLoadedPageLoadInfo = true;
        $_nSeconds = timer_stop(0);
        $_nQueryCount = get_num_queries();
        $_nMemoryUsage = round($this->_convertBytesToHR(memory_get_usage()), 2);
        $_nMemoryPeakUsage = round($this->_convertBytesToHR(memory_get_peak_usage()), 2);
        $_nMemoryLimit = round($this->_convertBytesToHR($this->_convertToNumber(WP_MEMORY_LIMIT)), 2);
        $_sInitialMemoryUsage = round($this->_convertBytesToHR($this->_nInitialMemoryUsage), 2);
        return $sFooterHTML . "<div id='users-profile-card-widget-page-load-stats'>" . "<ul>" . "<li>" . sprintf($this->oMsg->get('queries_in_seconds'), $_nQueryCount, $_nSeconds) . "</li>" . "<li>" . sprintf($this->oMsg->get('out_of_x_memory_used'), $_nMemoryUsage, $_nMemoryLimit, round(($_nMemoryUsage / $_nMemoryLimit), 2) * 100 . '%') . "</li>" . "<li>" . sprintf($this->oMsg->get('peak_memory_usage'), $_nMemoryPeakUsage) . "</li>" . "<li>" . sprintf($this->oMsg->get('initial_memory_usage'), $_sInitialMemoryUsage) . "</li>" . "</ul>" . "</div>";
    }
    private function _convertToNumber($nSize) {
        $_nReturn = substr($nSize, 0, -1);
        switch (strtoupper(substr($nSize, -1))) {
            case 'P':
                $_nReturn*= 1024;
            case 'T':
                $_nReturn*= 1024;
            case 'G':
                $_nReturn*= 1024;
            case 'M':
                $_nReturn*= 1024;
            case 'K':
                $_nReturn*= 1024;
        }
        return $_nReturn;
    }
    private function _convertBytesToHR($nBytes) {
        $_aUnits = array(0 => 'B', 1 => 'kB', 2 => 'MB', 3 => 'GB');
        $_nLog = log($nBytes, 1024);
        $_iPower = ( int )$_nLog;
        $_iSize = pow(1024, $_nLog - $_iPower);
        return $_iSize . $_aUnits[$_iPower];
    }
}
