<?php 
/**



*/
class UsersProfileCardWidgetAdminPageFramework_View__Resource extends UsersProfileCardWidgetAdminPageFramework_FrameworkUtility {
    public $oFactory;
    public $sCurrentPageSlug;
    public $sCurrentTabSlug;
    public $aCSSRules = array();
    public $aScripts = array();
    public function __construct($oFactory) {
        $this->oFactory = $oFactory;
        $this->sCurrentPageSlug = $oFactory->oProp->getCurrentPageSlug();
        $this->sCurrentTabSlug = $oFactory->oProp->getCurrentTabSlug($this->sCurrentPageSlug);
        $this->_parseAssets($oFactory);
        $this->_setHooks();
    }
    private function _setHooks() {
        add_action("style_{$this->sCurrentPageSlug}", array($this, '_replyToAddInlineCSSRules'));
        if ($this->sCurrentTabSlug) {
            add_action("style_{$this->sCurrentPageSlug}_{$this->sCurrentTabSlug}", array($this, '_replyToAddInlineCSSRules'));
        }
        add_action("script_{$this->sCurrentPageSlug}", array($this, '_replyToAddInlineScripts'));
        if ($this->sCurrentTabSlug) {
            add_action("script_{$this->sCurrentPageSlug}_{$this->sCurrentTabSlug}", array($this, '_replyToAddInlineScripts'));
        }
    }
    public function _replyToAddInlineCSSRules($sCSS) {
        return $this->_appendInlineAssets($sCSS, $this->aCSSRules);
    }
    public function _replyToAddInlineScripts($sScript) {
        return $this->_appendInlineAssets($sScript, $this->aScripts);
    }
    public function _appendInlineAssets($sInline, &$aContainer) {
        $_aInlines = array_unique($aContainer);
        $sInline = PHP_EOL . $sInline;
        foreach ($_aInlines as $_iIndex => $_sInline) {
            $sInline.= $_sInline . PHP_EOL;
            unset($_aInlines[$_iIndex]);
        }
        $aContainer = $_aInlines;
        return $sInline;
    }
    private function _parseAssets($oFactory) {
        $_aPageStyles = $this->getElementAsArray($oFactory->oProp->aPages, array($this->sCurrentPageSlug, 'style'));
        $this->_enqueuePageAssets($_aPageStyles, 'style');
        $_aPageScripts = $this->getElementAsArray($oFactory->oProp->aPages, array($this->sCurrentPageSlug, 'script'));
        $this->_enqueuePageAssets($_aPageScripts, 'script');
        if (!$this->sCurrentTabSlug) {
            return;
        }
        $_aInPageTabStyles = $this->getElementAsArray($oFactory->oProp->aInPageTabs, array($this->sCurrentPageSlug, $this->sCurrentTabSlug, 'style'));
        $this->_enqueuePageAssets($_aInPageTabStyles, 'style');
        $_aInPageTabScripts = $this->getElementAsArray($oFactory->oProp->aInPageTabs, array($this->sCurrentPageSlug, $this->sCurrentTabSlug, 'script'));
        $this->_enqueuePageAssets($_aInPageTabScripts, 'script');
    }
    private function _enqueuePageAssets(array $aPageAssets, $sType = 'style') {
        $_sMathodName = "_enqueueAsset_" . $sType;
        foreach ($aPageAssets as $_asPageAsset) {
            $this->{$_sMathodName}($_asPageAsset);
        }
    }
    private function _enqueueAsset_style($asPageStyle) {
        $_oFormatter = new UsersProfileCardWidgetAdminPageFramework_Format_PageResource_Style($asPageStyle);
        $_aPageStyle = $_oFormatter->get();
        $_sSRC = $_aPageStyle['src'];
        if (file_exists($_sSRC) || filter_var($_sSRC, FILTER_VALIDATE_URL)) {
            return $this->oFactory->enqueueStyle($_sSRC, $this->sCurrentPageSlug, $this->sCurrentTabSlug, $_aPageStyle);
        }
        $this->aCSSRules[] = $_sSRC;
    }
    private function _enqueueAsset_script($asPageScript) {
        $_oFormatter = new UsersProfileCardWidgetAdminPageFramework_Format_PageResource_Script($asPageScript);
        $_aPageScript = $_oFormatter->get();
        $_sSRC = $_aPageScript['src'];
        if ($this->isResourcePath($_sSRC)) {
            return $this->oFactory->enqueueScript($_sSRC, $this->sCurrentPageSlug, $this->sCurrentTabSlug, $_aPageScript);
        }
        $this->aScripts[] = $_sSRC;
    }
}
