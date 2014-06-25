<?php
/**
 * @file
 * Contains \Drupal\example\Entity\Example.
 */
namespace Drupal\example\Entity;
use Drupal\Core\Config\Entity\ConfigEntityBase;
use Drupal\example\ExampleInterface;
/**
 * Defines the Example entity.
 *
 * @ConfigEntityType(
 *   id = "example",
 *   label = @Translation("Example"),
 *   controllers = {
 *     "list_builder" = "Drupal\example\Controller\ExampleListBuilder",
 *     "form" = {
 *       "add" = "Drupal\example\Form\ExampleForm",
 *       "edit" = "Drupal\example\Form\ExampleForm",
 *       "delete" = "Drupal\example\Form\ExampleDeleteForm"
 *     }
 *   },
 *   config_prefix = "example",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "edit-form" = "example.edit",
 *     "delete-form" = "example.delete"
 *   }
 * )
 */
class Example extends ConfigEntityBase implements ExampleInterface {
  /**
   * The Example ID.
   *
   * @var string
   */
  public $id;
  /**
   * The Example UUID.
   *
   * @var string
   */
  public $uuid;
  /**
   * The Example label.
   *
   * @var string
   */
  public $label;
  // Your specific configuration property get/set methods go here,
  // implementing the interface.
}
