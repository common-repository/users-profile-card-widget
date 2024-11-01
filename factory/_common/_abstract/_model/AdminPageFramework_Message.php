<?php 
/**



*/
class UsersProfileCardWidgetAdminPageFramework_Message {
    public $aMessages = array();
    public $aDefaults = array('option_updated' => 'The options have been updated.', 'option_cleared' => 'The options have been cleared.', 'export' => 'Export', 'export_options' => 'Export Options', 'import_options' => 'Import', 'import_options' => 'Import Options', 'submit' => 'Submit', 'import_error' => 'An error occurred while uploading the import file.', 'uploaded_file_type_not_supported' => 'The uploaded file type is not supported: %1$s', 'could_not_load_importing_data' => 'Could not load the importing data.', 'imported_data' => 'The uploaded file has been imported.', 'not_imported_data' => 'No data could be imported.', 'upload_image' => 'Upload Image', 'use_this_image' => 'Use This Image', 'insert_from_url' => 'Insert from URL', 'reset_options' => 'Are you sure you want to reset the options?', 'confirm_perform_task' => 'Please confirm your action.', 'specified_option_been_deleted' => 'The specified options have been deleted.', 'nonce_verification_failed' => 'A problem occurred while processing the form data. Please try again.', 'check_max_input_vars' => 'Not all form fields could not be sent. Please check your server settings of PHP <code>max_input_vars</code> and consult the server administrator to increase the value. <code>max input vars</code>: %1$s. <code>$_POST</code> count: %2$s', 'send_email' => 'Is it okay to send the email?', 'email_sent' => 'The email has been sent.', 'email_scheduled' => 'The email has been scheduled.', 'email_could_not_send' => 'There was a problem sending the email', 'title' => 'Title', 'author' => 'Author', 'categories' => 'Categories', 'tags' => 'Tags', 'comments' => 'Comments', 'date' => 'Date', 'show_all' => 'Show All', 'show_all_authors' => 'Show all Authors', 'powered_by' => 'Thank you for creating with', 'and' => 'and', 'settings' => 'Settings', 'manage' => 'Manage', 'select_image' => 'Select Image', 'upload_file' => 'Upload File', 'use_this_file' => 'Use This File', 'select_file' => 'Select File', 'remove_value' => 'Remove Value', 'select_all' => 'Select All', 'select_none' => 'Select None', 'no_term_found' => 'No term found.', 'select' => 'Select', 'insert' => 'Insert', 'use_this' => 'Use This', 'return_to_library' => 'Return to Library', 'queries_in_seconds' => '%1$s queries in %2$s seconds.', 'out_of_x_memory_used' => '%1$s out of %2$s MB (%3$s) memory used.', 'peak_memory_usage' => 'Peak memory usage %1$s MB.', 'initial_memory_usage' => 'Initial memory usage  %1$s MB.', 'allowed_maximum_number_of_fields' => 'The allowed maximum number of fields is {0}.', 'allowed_minimum_number_of_fields' => 'The allowed minimum number of fields is {0}.', 'add' => 'Add', 'remove' => 'Remove', 'allowed_maximum_number_of_sections' => 'The allowed maximum number of sections is {0}', 'allowed_minimum_number_of_sections' => 'The allowed minimum number of sections is {0}', 'add_section' => 'Add Section', 'remove_section' => 'Remove Section', 'toggle_all' => 'Toggle All', 'toggle_all_collapsible_sections' => 'Toggle all collapsible sections', 'reset' => 'Reset', 'yes' => 'Yes', 'no' => 'No', 'on' => 'On', 'off' => 'Off', 'enabled' => 'Enabled', 'disabled' => 'Disabled', 'supported' => 'Supported', 'not_supported' => 'Not Supported', 'functional' => 'Functional', 'not_functional' => 'Not Functional', 'too_long' => 'Too Long', 'acceptable' => 'Acceptable', 'no_log_found' => 'No log found.', 'method_called_too_early' => 'The method is called too early.', 'debug_info' => 'Debug Info', 'click_to_expand' => 'Click here to expand to view the contents.', 'click_to_collapse' => 'Click here to collapse the contents.', 'loading' => 'Loading...', 'please_enable_javascript' => 'Please enable JavaScript for better experience.');
    protected $_sTextDomain = 'users-profile-card-widget';
    static private $_aInstancesByTextDomain = array();
    public static function getInstance($sTextDomain = 'users-profile-card-widget') {
        $_oInstance = isset(self::$_aInstancesByTextDomain[$sTextDomain]) && (self::$_aInstancesByTextDomain[$sTextDomain] instanceof UsersProfileCardWidgetAdminPageFramework_Message) ? self::$_aInstancesByTextDomain[$sTextDomain] : new UsersProfileCardWidgetAdminPageFramework_Message($sTextDomain);
        self::$_aInstancesByTextDomain[$sTextDomain] = $_oInstance;
        return self::$_aInstancesByTextDomain[$sTextDomain];
    }
    public static function instantiate($sTextDomain = 'users-profile-card-widget') {
        return self::getInstance($sTextDomain);
    }
    public function __construct($sTextDomain = 'users-profile-card-widget') {
        $this->_sTextDomain = $sTextDomain;
        $this->aMessages = array_fill_keys(array_keys($this->aDefaults), null);
    }
    public function getTextDomain() {
        return $this->_sTextDomain;
    }
    public function set($sKey, $sValue) {
        $this->aMessages[$sKey] = $sValue;
    }
    public function get($sKey = '') {
        if (!$sKey) {
            return $this->_getAllMessages();
        }
        return isset($this->aMessages[$sKey]) ? __($this->aMessages[$sKey], $this->_sTextDomain) : __($this->{$sKey}, $this->_sTextDomain);
    }
    private function _getAllMessages() {
        $_aMessages = array();
        foreach ($this->aMessages as $_sLabel => $_sTranslation) {
            $_aMessages[$_sLabel] = $this->get($_sLabel);
        }
        return $_aMessages;
    }
    public function output($sKey) {
        echo $this->get($sKey);
    }
    public function __($sKey) {
        return $this->get($sKey);
    }
    public function _e($sKey) {
        $this->output($sKey);
    }
    public function __get($sPropertyName) {
        return isset($this->aDefaults[$sPropertyName]) ? $this->aDefaults[$sPropertyName] : $sPropertyName;
    }
    private function __doDummy() {
        __('The options have been updated.', 'users-profile-card-widget');
        __('The options have been cleared.', 'users-profile-card-widget');
        __('Export', 'users-profile-card-widget');
        __('Export Options', 'users-profile-card-widget');
        __('Import', 'users-profile-card-widget');
        __('Import Options', 'users-profile-card-widget');
        __('Submit', 'users-profile-card-widget');
        __('An error occurred while uploading the import file.', 'users-profile-card-widget');
        __('The uploaded file type is not supported: %1$s', 'users-profile-card-widget');
        __('Could not load the importing data.', 'users-profile-card-widget');
        __('The uploaded file has been imported.', 'users-profile-card-widget');
        __('No data could be imported.', 'users-profile-card-widget');
        __('Upload Image', 'users-profile-card-widget');
        __('Use This Image', 'users-profile-card-widget');
        __('Insert from URL', 'users-profile-card-widget');
        __('Are you sure you want to reset the options?', 'users-profile-card-widget');
        __('Please confirm your action.', 'users-profile-card-widget');
        __('The specified options have been deleted.', 'users-profile-card-widget');
        __('A problem occurred while processing the form data. Please try again.', 'users-profile-card-widget');
        __('Not all form fields could not be sent. Please check your server settings of PHP <code>max_input_vars</code> and consult the server administrator to increase the value. <code>max input vars</code>: %1$s. <code>$_POST</code> count: %2$s', 'users-profile-card-widget');
        __('Is it okay to send the email?', 'users-profile-card-widget');
        __('The email has been sent.', 'users-profile-card-widget');
        __('The email has been scheduled.', 'users-profile-card-widget');
        __('There was a problem sending the email', 'users-profile-card-widget');
        __('Title', 'users-profile-card-widget');
        __('Author', 'users-profile-card-widget');
        __('Categories', 'users-profile-card-widget');
        __('Tags', 'users-profile-card-widget');
        __('Comments', 'users-profile-card-widget');
        __('Date', 'users-profile-card-widget');
        __('Show All', 'users-profile-card-widget');
        __('Show All Authors', 'users-profile-card-widget');
        __('Thank you for creating with', 'users-profile-card-widget');
        __('and', 'users-profile-card-widget');
        __('Settings', 'users-profile-card-widget');
        __('Manage', 'users-profile-card-widget');
        __('Select Image', 'users-profile-card-widget');
        __('Upload File', 'users-profile-card-widget');
        __('Use This File', 'users-profile-card-widget');
        __('Select File', 'users-profile-card-widget');
        __('Remove Value', 'users-profile-card-widget');
        __('Select All', 'users-profile-card-widget');
        __('Select None', 'users-profile-card-widget');
        __('No term found.', 'users-profile-card-widget');
        __('Select', 'users-profile-card-widget');
        __('Insert', 'users-profile-card-widget');
        __('Use This', 'users-profile-card-widget');
        __('Return to Library', 'users-profile-card-widget');
        __('%1$s queries in %2$s seconds.', 'users-profile-card-widget');
        __('%1$s out of %2$s MB (%3$s) memory used.', 'users-profile-card-widget');
        __('Peak memory usage %1$s MB.', 'users-profile-card-widget');
        __('Initial memory usage  %1$s MB.', 'users-profile-card-widget');
        __('The allowed maximum number of fields is {0}.', 'users-profile-card-widget');
        __('The allowed minimum number of fields is {0}.', 'users-profile-card-widget');
        __('Add', 'users-profile-card-widget');
        __('Remove', 'users-profile-card-widget');
        __('The allowed maximum number of sections is {0}', 'users-profile-card-widget');
        __('The allowed minimum number of sections is {0}', 'users-profile-card-widget');
        __('Add Section', 'users-profile-card-widget');
        __('Remove Section', 'users-profile-card-widget');
        __('Toggle All', 'users-profile-card-widget');
        __('Toggle all collapsible sections', 'users-profile-card-widget');
        __('Reset', 'users-profile-card-widget');
        __('Yes', 'users-profile-card-widget');
        __('No', 'users-profile-card-widget');
        __('On', 'users-profile-card-widget');
        __('Off', 'users-profile-card-widget');
        __('Enabled', 'users-profile-card-widget');
        __('Disabled', 'users-profile-card-widget');
        __('Supported', 'users-profile-card-widget');
        __('Not Supported', 'users-profile-card-widget');
        __('Functional', 'users-profile-card-widget');
        __('Not Functional', 'users-profile-card-widget');
        __('Too Long', 'users-profile-card-widget');
        __('Acceptable', 'users-profile-card-widget');
        __('No log found.', 'users-profile-card-widget');
        __('The method is called too early: %1$s', 'users-profile-card-widget');
        __('Debug Info', 'users-profile-card-widget');
        __('Click here to expand to view the contents.', 'users-profile-card-widget');
        __('Click here to collapse the contents.', 'users-profile-card-widget');
        __('Loading...', 'users-profile-card-widget');
        __('Please enable JavaScript for better experience.', 'users-profile-card-widget');
    }
}
