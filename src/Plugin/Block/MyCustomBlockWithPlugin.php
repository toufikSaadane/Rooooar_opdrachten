<?php


namespace Drupal\dino_roar\Plugin\Block;


use Drupal\Core\Access\AccessResult;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Provides a block with a simple text.
 *
 * @Block(
 *   id = "my_dino_rooooooooar_custom_block_with_plugin",
 *   admin_label = @Translation("Dino Rooooooooar custom Block With plugin"),
 * )
 */
class MyCustomBlockWithPlugin extends BlockBase
{

  /**
   * {@inheritdoc}
   */
  public function build()
  {
    return [
      '#markup' => $this->t('Dino Rooooooooar custom Block With plugin'),
    ];
  }

  /**
   * {@inheritdoc}
   */
  protected function blockAccess(AccountInterface $account)
  {
    return AccessResult::allowedIfHasPermission($account, 'access content');
  }
//
//  /**
//   * {@inheritdoc}
//   */
//  public function blockForm($form, FormStateInterface $form_state)
//  {
//    $config = $this->getConfiguration();
//
//    return $form;
//  }
//
//  /**
//   * {@inheritdoc}
//   */
//  public function blockSubmit($form, FormStateInterface $form_state)
//  {
//    $this->configuration['my_block_settings'] = $form_state->getValue('my_block_settings');
//  }
}
