<?php 
/**



*/
class UsersProfileCardWidgetAdminPageFramework_View__PageMataBoxRenderer extends UsersProfileCardWidgetAdminPageFramework_FrameworkUtility {
    public function render($sContext) {
        if (!$this->doesMetaBoxExist()) {
            return;
        }
        $this->_doRender($sContext, ++self::$_iContainerID);
    }
    private static $_iContainerID = 0;
    private function _doRender($sContext, $iContainerID) {
        echo "<div id='postbox-container-{$iContainerID}' class='postbox-container'>";
        do_meta_boxes('', $sContext, null);
        echo "</div>";
    }
}
