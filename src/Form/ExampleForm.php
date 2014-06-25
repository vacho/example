<?php
/**
 * @file
 * Contains \Drupal\example\Form\ExampleForm.
 */
namespace Drupal\example\Form;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityForm;
class ExampleForm extends EntityForm {
  /**
   * {@inheritdoc}
   */
  public function form(array $form, array &$form_state) {
    $form = parent::form($form, $form_state);
    $example = $this->entity;
    $form['label'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $example->label(),
      '#description' => $this->t("Label for the Example."),
      '#required' => TRUE,
    );
    $form['id'] = array(
      '#type' => 'machine_name',
      '#default_value' => $example->id(),
      '#machine_name' => array(
        'exists' => 'example_load',
      ),
      '#disabled' => !$example->isNew(),
    );
    // You will need additional form elements for your custom properties.
    return $form;
  }
  /**
   * {@inheritdoc}
   */
  public function save(array $form, array &$form_state) {
    $example = $this->entity;
    $status = $example->save();
    if ($status) {
      drupal_set_message($this->t('Saved the %label Example.', array(
        '%label' => $example->label(),
      )));
    }
    else {
      drupal_set_message($this->t('The %label Example was not saved.', array(
        '%label' => $example->label(),
      )));
    }
    $form_state['redirect'] = 'admin/config/system/example';
  }
}
