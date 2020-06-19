<?php

require_once 'buttondisplay.civix.php';
use CRM_Buttondisplay_ExtensionUtil as E;

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function buttondisplay_civicrm_config(&$config) {
  _buttondisplay_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_xmlMenu
 */
function buttondisplay_civicrm_xmlMenu(&$files) {
  _buttondisplay_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function buttondisplay_civicrm_install() {
  _buttondisplay_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_postInstall
 */
function buttondisplay_civicrm_postInstall() {
  _buttondisplay_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_uninstall
 */
function buttondisplay_civicrm_uninstall() {
  _buttondisplay_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function buttondisplay_civicrm_enable() {
  _buttondisplay_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_disable
 */
function buttondisplay_civicrm_disable() {
  _buttondisplay_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_upgrade
 */
function buttondisplay_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _buttondisplay_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_managed
 */
function buttondisplay_civicrm_managed(&$entities) {
  _buttondisplay_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_caseTypes
 */
function buttondisplay_civicrm_caseTypes(&$caseTypes) {
  _buttondisplay_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_angularModules
 */
function buttondisplay_civicrm_angularModules(&$angularModules) {
  _buttondisplay_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_alterSettingsFolders
 */
function buttondisplay_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _buttondisplay_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_entityTypes
 */
function buttondisplay_civicrm_entityTypes(&$entityTypes) {
  _buttondisplay_civix_civicrm_entityTypes($entityTypes);
}

/**
 * Implements hook_civicrm_thems().
 */
function buttondisplay_civicrm_themes(&$themes) {
  _buttondisplay_civix_civicrm_themes($themes);
}

function buttondisplay_civicrm_buildForm($formName, &$form) {
  if ($formName == 'CRM_Contribute_Form_Contribution_Main') {
    $form_id = $form->get('id');
    if (!empty(Civi::settings()->get('button_display_page_id_' . $form_id))) {
      CRM_Core_Resources::singleton()->addStyleFile('nz.co.fuzion.buttondisplay', 'css/civi-button-inputs.css');
    }
  }
  elseif($formName == 'CRM_Contribute_Form_ContributionPage_Amount') {
    CRM_Buttondisplay_Contribute_Form_ContributionPage_Amount::buildForm($form);
  }
}

/**
 * Implementation of hook_civicrm_postProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postProcess
 */
function buttondisplay_civicrm_postProcess($formName, &$form) {
  if ($formName == 'CRM_Contribute_Form_ContributionPage_Amount') {
    CRM_Buttondisplay_Contribute_Form_ContributionPage_Amount::postProcess($form);
  }
}


// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_preProcess
 *
function buttondisplay_civicrm_preProcess($formName, &$form) {

} // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_navigationMenu
 *
function buttondisplay_civicrm_navigationMenu(&$menu) {
  _buttondisplay_civix_insert_navigation_menu($menu, 'Mailings', array(
    'label' => E::ts('New subliminal message'),
    'name' => 'mailing_subliminal_message',
    'url' => 'civicrm/mailing/subliminal',
    'permission' => 'access CiviMail',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _buttondisplay_civix_navigationMenu($menu);
} // */
