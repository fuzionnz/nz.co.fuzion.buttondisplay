<?php

class CRM_Buttondisplay_Contribute_Form_ContributionPage_Amount {

  /**
   * @see buttondisplay_civicrm_buildForm().
   *
   * Adds a widget for the setting. The JS positions it in the right place.
   */
  public static function buildForm(&$form) {
    $form->addYesNo('button_display_for_options', ts('Display buttons for radio and checkbox fields?'), FALSE);

    $form_id = $form->get('id');
    $form->setDefaults([
      'button_display_for_options' => Civi::settings()->get('button_display_page_id_' . $form_id) ?? 0,
    ]);

    CRM_Core_Region::instance('form-body')->add(array(
      'template' => 'CRM/Buttondisplay/Contribute/Form/ContributePage/Amount.tpl',
    ));
  }

  /**
   *
   */
  public static function postProcess(&$form) {
    $form_id = $form->get('id');
    $values = $form->exportValues();

    Civi::settings()->set('button_display_page_id_' . $form_id, CRM_Utils_Array::value('button_display_for_options', $values));
  }

}
