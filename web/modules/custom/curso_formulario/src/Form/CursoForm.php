<?php

namespace Drupal\curso_formulario\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Database\Connection;
use Drupal\Core\Session\AccountInterface;
use Egulias\EmailValidator\EmailValidator;

/**
 * Provides a Curso Formulario form.
 */
class CursoForm extends FormBase {

  protected $database;
  protected $currentUser;
  protected $emailValidator;

  /**
   * {@inheritdoc}
   */
  public function __construct(Connection $database, AccountInterface $current_user, EmailValidator $email_validator) {
    $this->database = $database;
    $this->currentUser = $current_user;
    $this->emailValidator = $email_validator;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('database'),
      $container->get('current_user'),
      $container->get('email.validator')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'curso_formulario_curso';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    
    $form['username'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Username'),
      '#description' => $this->t('Your username.'),
      '#default_value' => $this->currentUser->getAccountName(),
      '#required' => TRUE,
    ];
    
    $form['color'] = array(
      '#type' => 'color',
      '#title' => $this
        ->t('Color'),
      '#default_value' => '#ffffff',
    );

    $form['email'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Email'),
      '#default_value' => \Drupal::currentUser()->getEmail(),
      '#required' => TRUE,
    ];

    $form['example_select'] = [
      '#type' => 'select',
      '#title' => $this->t('Departamento'),
      '#options' => [
        '1' => $this->t('Administracion'),
        '2' => $this->t('Talento Humano'),
        '3' => $this->t('Desarrollo'),
      ],
    ];

    $form['phone'] = array(
      '#type' => 'tel',
      '#title' => $this->t('Phone'),
      '#required' => TRUE,
    );

    $form['message'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Message'),
      '#required' => TRUE,
    ];

    $form['actions'] = [
      '#type' => 'actions',
    ];
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Send'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $matches = null;
    $email = $form_state->getValue('email');

    /* Validacion del mensaje */
    if (mb_strlen($form_state->getValue('message')) < 10) {
      $form_state->setErrorByName('message', $this->t('Message should be at least 10 characters.'));
    }

    /* Validacion del correo */
    if (!$this->emailValidator->isValid($email)) {
      $form_state->setErrorByName('email', $this->t('%email is not a valid email address.', ['%email' => $email]));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $email = $form_state->getValue('email');
    $uid = 0;

    $this->database->insert('curso_formulario_example')
      ->fields([
        'uid' => $uid,
        'descripcion' => $email,
      ])
      ->execute();

    $this->messenger()->addStatus($this->t('The message has been sent.'));
    $form_state->setRedirect('<front>');
  }

}
