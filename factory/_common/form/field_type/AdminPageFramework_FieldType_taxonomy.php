<?php 
/**



*/
class UsersProfileCardWidgetAdminPageFramework_FieldType_taxonomy extends UsersProfileCardWidgetAdminPageFramework_FieldType_checkbox {
    public $aFieldTypeSlugs = array('taxonomy',);
    protected $aDefaultKeys = array('taxonomy_slugs' => 'category', 'height' => '250px', 'width' => null, 'max_width' => '100%', 'show_post_count' => true, 'attributes' => array(), 'select_all_button' => true, 'select_none_button' => true, 'label_no_term_found' => null, 'label_list_title' => '', 'query' => array('child_of' => 0, 'parent' => '', 'orderby' => 'name', 'order' => 'ASC', 'hide_empty' => false, 'hierarchical' => true, 'number' => '', 'pad_counts' => false, 'exclude' => array(), 'exclude_tree' => array(), 'include' => array(), 'fields' => 'all', 'slug' => '', 'get' => '', 'name__like' => '', 'description__like' => '', 'offset' => '', 'search' => '', 'cache_domain' => 'core',), 'queries' => array(),);
    protected function setUp() {
        new UsersProfileCardWidgetAdminPageFramework_Form_View___Script_CheckboxSelector;
    }
    protected function getScripts() {
        $_aJSArray = json_encode($this->aFieldTypeSlugs);
        return parent::getScripts() . <<<JAVASCRIPTS
/* For tabs */
var enableUsersProfileCardWidgetAdminPageFrameworkTabbedBox = function( nodeTabBoxContainer ) {
    jQuery( nodeTabBoxContainer ).each( function() {
        jQuery( this ).find( '.tab-box-tab' ).each( function( i ) {
            
            if ( 0 === i ) {
                jQuery( this ).addClass( 'active' );
            }
                
            jQuery( this ).click( function( e ){
                     
                // Prevents jumping to the anchor which moves the scroll bar.
                e.preventDefault();
                
                // Remove the active tab and set the clicked tab to be active.
                jQuery( this ).siblings( 'li.active' ).removeClass( 'active' );
                jQuery( this ).addClass( 'active' );
                
                // Find the element id and select the content element with it.
                var thisTab = jQuery( this ).find( 'a' ).attr( 'href' );
                active_content = jQuery( this ).closest( '.tab-box-container' ).find( thisTab ).css( 'display', 'block' ); 
                active_content.siblings().css( 'display', 'none' );
                
            });
        });     
    });
};        

jQuery( document ).ready( function() {
         
    enableUsersProfileCardWidgetAdminPageFrameworkTabbedBox( jQuery( '.tab-box-container' ) );

    /* The repeatable event */
    jQuery().registerUsersProfileCardWidgetAdminPageFrameworkCallbacks( {     
        /**
         * The repeatable field callback for the add event.
         * 
         * @param object node
         * @param string    the field type slug
         * @param string    the field container tag ID
         * @param integer    the caller type. 1 : repeatable sections. 0 : repeatable fields.
         */     
        added_repeatable_field: function( oCloned, sFieldType, sFieldTagID, iCallType ) {
            
            // Repeatable Sections
            if ( 1 === iCallType ) {
                var _oSectionsContainer     = jQuery( oCloned ).closest( '.users-profile-card-widget-sections' );
                var _iSectionIndex          = _oSectionsContainer.attr( 'data-largest_index' );
                var _sSectionIDModel        = _oSectionsContainer.attr( 'data-section_id_model' );
                jQuery( oCloned ).find( 'div, li.category-list' ).incrementAttribute(
                    'id', // attribute name
                    _iSectionIndex, // increment from
                    _sSectionIDModel // digit model
                );
                jQuery( oCloned ).find( 'label' ).incrementAttribute(
                    'for', // attribute name
                    _iSectionIndex, // increment from
                    _sSectionIDModel // digit model
                );            
                jQuery( oCloned ).find( 'li.tab-box-tab a' ).incrementAttribute(
                    'href', // attribute name
                    _iSectionIndex, // increment from
                    _sSectionIDModel // digit model
                );                
            } 
            // Repeatable fields 
            else {
                var _oFieldsContainer       = jQuery( oCloned ).closest( '.users-profile-card-widget-fields' );
                var _iFieldIndex            = Number( _oFieldsContainer.attr( 'data-largest_index' ) - 1 );
                var _sFieldTagIDModel       = _oFieldsContainer.attr( 'data-field_tag_id_model' );

                jQuery( oCloned ).find( 'div, li.category-list' ).incrementAttribute(
                    'id', // attribute name
                    _iFieldIndex, // increment from
                    _sFieldTagIDModel // digit model
                );
                jQuery( oCloned ).find( 'label' ).incrementAttribute(
                    'for', // attribute name
                    _iFieldIndex, // increment from
                    _sFieldTagIDModel // digit model
                );            
                jQuery( oCloned ).find( 'li.tab-box-tab a' ).incrementAttribute(
                    'href', // attribute name
                    _iFieldIndex, // increment from
                    _sFieldTagIDModel // digit model
                );
            }
            enableUsersProfileCardWidgetAdminPageFrameworkTabbedBox( jQuery( oCloned ).find( '.tab-box-container' ) );            
            
        }
    
    },
    {$_aJSArray}
    );
});     
JAVASCRIPTS;
        
    }
    protected function getStyles() {
        return ".users-profile-card-widget-field .taxonomy-checklist li { margin: 8px 0 8px 20px; }.users-profile-card-widget-field div.taxonomy-checklist {padding: 8px 0 8px 10px;margin-bottom: 20px;}.users-profile-card-widget-field .taxonomy-checklist ul {list-style-type: none;margin: 0;}.users-profile-card-widget-field .taxonomy-checklist ul ul {margin-left: 1em;}.users-profile-card-widget-field .taxonomy-checklist-label {white-space: nowrap; }.users-profile-card-widget-field .tab-box-container.categorydiv {max-height: none;}.users-profile-card-widget-field .tab-box-tab-text {display: inline-block;}.users-profile-card-widget-field .tab-box-tabs {line-height: 12px;margin-bottom: 0;}.users-profile-card-widget-field .tab-box-tabs .tab-box-tab.active {display: inline;border-color: #dfdfdf #dfdfdf #fff;margin-bottom: 0px;padding-bottom: 2px;background-color: #fff;}.users-profile-card-widget-field .tab-box-container { position: relative; width: 100%; clear: both;margin-bottom: 1em;}.users-profile-card-widget-field .tab-box-tabs li a { color: #333; text-decoration: none; }.users-profile-card-widget-field .tab-box-contents-container {padding: 0 0 0 1.8em;padding: 0.55em 0.5em 0.55em 1.8em;border: 1px solid #dfdfdf; background-color: #fff;}.users-profile-card-widget-field .tab-box-contents { overflow: hidden; overflow-x: hidden; position: relative; top: -1px; height: 300px;}.users-profile-card-widget-field .tab-box-content { display: none; overflow: auto; display: block; position: relative; overflow-x: hidden;}.users-profile-card-widget-field .tab-box-content .taxonomychecklist {margin-right: 3.2em;}.users-profile-card-widget-field .tab-box-content:target, .users-profile-card-widget-field .tab-box-content:target, .users-profile-card-widget-field .tab-box-content:target { display: block; }.users-profile-card-widget-field .tab-box-content .select_all_button_container, .users-profile-card-widget-field .tab-box-content .select_none_button_container{margin-top: 0.8em;}.users-profile-card-widget-field .taxonomychecklist .children {margin-top: 6px;margin-left: 1em;}";
    }
    protected function getIEStyles() {
        return ".tab-box-content { display: block; }.tab-box-contents { overflow: hidden;position: relative; }b { position: absolute; top: 0px; right: 0px; width:1px; height: 251px; overflow: hidden; text-indent: -9999px; }";
    }
    protected function getField($aField) {
        $aField['label_no_term_found'] = $this->getElement($aField, 'label_no_term_found', $this->oMsg->get('no_term_found'));
        $_aTabs = array();
        $_aCheckboxes = array();
        foreach ($this->getAsArray($aField['taxonomy_slugs']) as $sKey => $sTaxonomySlug) {
            $_aTabs[] = $this->_getTaxonomyTab($aField, $sKey, $sTaxonomySlug);
            $_aCheckboxes[] = $this->_getTaxonomyCheckboxes($aField, $sKey, $sTaxonomySlug);
        }
        return "<div id='tabbox-{$aField['field_id']}' class='tab-box-container categorydiv' style='max-width:{$aField['max_width']};'>" . "<ul class='tab-box-tabs category-tabs'>" . implode(PHP_EOL, $_aTabs) . "</ul>" . "<div class='tab-box-contents-container'>" . "<div class='tab-box-contents' style='height: {$aField['height']};'>" . implode(PHP_EOL, $_aCheckboxes) . "</div>" . "</div>" . "</div>";
    }
    private function _getTaxonomyCheckboxes(array $aField, $sKey, $sTaxonomySlug) {
        $_aTabBoxContainerArguments = array('id' => "tab_{$aField['input_id']}_{$sKey}", 'class' => 'tab-box-content', 'style' => $this->generateInlineCSS(array('height' => $this->sanitizeLength($aField['height']), 'width' => $this->sanitizeLength($aField['width']),)),);
        return "<div " . $this->getAttributes($_aTabBoxContainerArguments) . ">" . $this->getElement($aField, array('before_label', $sKey)) . "<div " . $this->getAttributes($this->_getCheckboxContainerAttributes($aField)) . "></div>" . "<ul class='list:category taxonomychecklist form-no-clear'>" . $this->_getTaxonomyChecklist($aField, $sKey, $sTaxonomySlug) . "</ul>" . "<!--[if IE]><b>.</b><![endif]-->" . $this->getElement($aField, array('after_label', $sKey)) . "</div><!-- tab-box-content -->";
    }
    private function _getTaxonomyChecklist(array $aField, $sKey, $sTaxonomySlug) {
        return wp_list_categories(array('walker' => new UsersProfileCardWidgetAdminPageFramework_WalkerTaxonomyChecklist, 'taxonomy' => $sTaxonomySlug, '_name_prefix' => is_array($aField['taxonomy_slugs']) ? "{$aField['_input_name']}[{$sTaxonomySlug}]" : $aField['_input_name'], '_input_id_prefix' => $aField['input_id'], '_attributes' => $this->getElement($aField, array('attributes', $sKey), array()) + $aField['attributes'], '_selected_items' => $this->_getSelectedKeyArray($aField['value'], $sTaxonomySlug), 'echo' => false, 'show_post_count' => $aField['show_post_count'], 'show_option_none' => $aField['label_no_term_found'], 'title_li' => $aField['label_list_title'],) + $this->getAsArray($this->getElement($aField, array('queries', $sTaxonomySlug), array()), true) + $aField['query']);
    }
    private function _getSelectedKeyArray($vValue, $sTaxonomySlug) {
        $vValue = ( array )$vValue;
        if (!isset($vValue[$sTaxonomySlug])) {
            return array();
        }
        if (!is_array($vValue[$sTaxonomySlug])) {
            return array();
        }
        return array_keys($vValue[$sTaxonomySlug], true);
    }
    private function _getTaxonomyTab(array $aField, $sKey, $sTaxonomySlug) {
        return "<li class='tab-box-tab'>" . "<a href='#tab_{$aField['input_id']}_{$sKey}'>" . "<span class='tab-box-tab-text'>" . $this->_getLabelFromTaxonomySlug($sTaxonomySlug) . "</span>" . "</a>" . "</li>";
    }
    private function _getLabelFromTaxonomySlug($sTaxonomySlug) {
        $_oTaxonomy = get_taxonomy($sTaxonomySlug);
        return isset($_oTaxonomy->label) ? $_oTaxonomy->label : null;
    }
}
