<?php


namespace Drupal\dino_roar\Form;


use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;


class RoarSimpleForm extends FormBase
{

  /**
   * @param array $form
   * @param FormStateInterface $form_state
   * @return array
   */
  public function buildForm(array $form, FormStateInterface $form_state)
  {

    $form['description'] = [
      '#type' => 'item',
      '#markup' => $this->t('This example shows how to add some inputs'),
    ];

    $form['title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Title'),
      '#size' => 60,
      '#maxlength' => 128,
    ];

    $form['test_checkboxes'] = [
      '#type' => 'checkboxes',
      '#options' => [
        'drupal' => $this->t('Drupal'),
        'Symfony' => $this->t('Symfony'),
        'Laravel' => $this->t('Laravel')

      ],
      '#title' => $this->t('Are you developer :'),
    ];

    $form['color'] = [
      '#type' => 'color',
      '#title' => $this->t('Color'),
      '#default_value' => '#f0f0f0',
    ];

    $form['date'] = [
      '#type' => 'date',
      '#title' => $this->t('Date'),
      '#default_value' => ['year' => 2020, 'month' => 2, 'day' => 15],
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];


    return $form;
  }

  /**
   * @return string
   */
  public function getFormId()
  {
    return 'codimth_simple_form_api';
  }

  /**
   * @param array $form
   * @param FormStateInterface $form_state
   */
  public function validateForm(array &$form, FormStateInterface $form_state)
  {
    $title = $form_state->getValue('title');
    if (strlen($title) < 15) {
      $form_state->setErrorByName('title', $this->t('The title must be at least 15 characters long.'));
    }
  }

  /**
   * @param array $form
   * @param FormStateInterface $form_state
   */
  public function submitForm(array &$form, FormStateInterface $form_state)
  {

    $title = $form_state->getValue('title');
    $this->messenger()->addStatus($this->t('You specified a title of @title.', ['@title' => $title]));
  }
}
