<?php
declare(strict_types=1);

/**
 * Copyright 2010 - 2019, Cake Development Corporation (https://www.cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2018, Cake Development Corporation (https://www.cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
namespace CakeDC\Users\Mailer;

use Cake\Datasource\EntityInterface;
use Cake\Mailer\Mailer;
use Cake\Mailer\Message;
use CakeDC\Users\Utility\UsersUrl;

/**
 * User Mailer
 */
class UsersMailer extends Mailer
{
    /**
     * Send the templated email to the user
     *
     * @param \Cake\Datasource\EntityInterface $user User entity
     * @return void
     */
    protected function validation(EntityInterface $user, array $options = [])
    {
        $firstName = isset($user['first_name']) ? $user['first_name'] . ', ' : '';
        // un-hide the token to be able to send it in the email content
        $user->setHidden(['password', 'token_expires', 'api_token']);
        $subject = __d('cake_d_c/users', 'Your account validation link');

        if (isset($options['linkGenerator']) && is_callable($options['linkGenerator'])) {
            $generator = $options['linkGenerator'];
            $link = $generator($user['token']);
        } else {
            $link = UsersUrl::actionUrl('validateEmail', [
                '_full' => true,
                $user['token'],
            ]);
        }

        $viewVars = [
            'activationUrl' => $link,
        ] + $user->toArray();

        $this
            ->setTo($user['email'])
            ->setSubject($firstName . $subject)
            ->setEmailFormat(Message::MESSAGE_BOTH)
            ->setViewVars($viewVars);

        $this->viewBuilder()
            ->setTemplate('CakeDC/Users.validation');
    }

    /**
     * Send the reset password email to the user
     *
     * @param \Cake\Datasource\EntityInterface $user User entity
     * @return void
     */
    protected function resetPassword(EntityInterface $user, array $options = [])
    {
        $firstName = isset($user['first_name']) ? $user['first_name'] . ', ' : '';
        $subject = __d('cake_d_c/users', '{0}Your reset password link', $firstName);
        // un-hide the token to be able to send it in the email content
        $user->setHidden(['password', 'token_expires', 'api_token']);

        if (isset($options['linkGenerator']) && is_callable($options['linkGenerator'])) {
            $generator = $options['linkGenerator'];
            $link = $generator($user['token']);
        } else {
            $link = UsersUrl::actionUrl('resetPassword', [
                '_full' => true,
                $user['token'],
            ]);
        }

        $viewVars = [
            'activationUrl' => $link,
        ] + $user->toArray();

        $this
            ->setTo($user['email'])
            ->setSubject($subject)
            ->setEmailFormat(Message::MESSAGE_BOTH)
            ->setViewVars($viewVars);
        $this
            ->viewBuilder()
            ->setTemplate('CakeDC/Users.resetPassword');
    }

    /**
     * Send account validation email to the user
     *
     * @param \Cake\Datasource\EntityInterface $user User entity
     * @param \Cake\Datasource\EntityInterface $socialAccount SocialAccount entity
     * @return void
     */
    protected function socialAccountValidation(EntityInterface $user, EntityInterface $socialAccount)
    {
        $firstName = isset($user['first_name']) ? $user['first_name'] . ', ' : '';
        // note: we control the space after the username in the previous line
        $subject = __d('cake_d_c/users', '{0}Your social account validation link', $firstName);
        $activationUrl = [
            '_full' => true,
            'prefix' => false,
            'plugin' => 'CakeDC/Users',
            'controller' => 'SocialAccounts',
            'action' => 'validateAccount',
            $socialAccount['provider'] ?? null,
            $socialAccount['reference'] ?? null,
            $socialAccount['token'] ?? null,
        ];
        $this
            ->setTo($user['email'])
            ->setSubject($subject)
            ->setEmailFormat(Message::MESSAGE_BOTH)
            ->setViewVars(['user' => $user, 'socialAccount' => $socialAccount, 'activationUrl' => $activationUrl]);
        $this
            ->viewBuilder()
            ->setTemplate('CakeDC/Users.socialAccountValidation');
    }
}
