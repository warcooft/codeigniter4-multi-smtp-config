<?php

declare(strict_types=1);

/**
 * This file is part of CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <syamsuddine9@icloud.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use CodeIgniter\Email\Email;

if (! function_exists('multi_email')) {
    /**
     * Provides convenient access to the CodeIgniter Email class.
     *
     * @param array<string, mixed> $overrides Email preferences to override.
     *
     * @internal
     */
    function multi_email(array $overrides = [], string $group = ''): Email
    {
        if (!setting('MultiEmail.' . $group)) {
            throw new Exception("Cannot send email from 'multi_email' helper.\n Undefined group name:  $group");
        }

        $defaultGroup  = !empty($group) ? $group : setting('MultiEmail.defaultGroup');

        $config = [
            'fromEmail'     => setting('MultiEmail.' . $defaultGroup)['fromEmail'],
            'fromName'      => setting('MultiEmail.' . $defaultGroup)['fromName'],
            'userAgent'     => setting('MultiEmail.' . $defaultGroup)['userAgent'],
            'protocol'      => setting('MultiEmail.' . $defaultGroup)['protocol'],
            'mailPath'      => setting('MultiEmail.' . $defaultGroup)['mailPath'],
            'SMTPHost'      => setting('MultiEmail.' . $defaultGroup)['SMTPHost'],
            'SMTPUser'      => setting('MultiEmail.' . $defaultGroup)['SMTPUser'],
            'SMTPPass'      => setting('MultiEmail.' . $defaultGroup)['SMTPPass'],
            'SMTPPort'      => setting('MultiEmail.' . $defaultGroup)['SMTPPort'],
            'SMTPTimeout'   => setting('MultiEmail.' . $defaultGroup)['SMTPTimeout'],
            'SMTPKeepAlive' => setting('MultiEmail.' . $defaultGroup)['SMTPKeepAlive'],
            'SMTPCrypto'    => setting('MultiEmail.' . $defaultGroup)['SMTPCrypto'],
            'wordWrap'      => setting('MultiEmail.' . $defaultGroup)['wordWrap'],
            'wrapChars'     => setting('MultiEmail.' . $defaultGroup)['wrapChars'],
            'mailType'      => setting('MultiEmail.' . $defaultGroup)['mailType'],
            'charset'       => setting('MultiEmail.' . $defaultGroup)['charset'],
            'validate'      => setting('MultiEmail.' . $defaultGroup)['validate'],
            'priority'      => setting('MultiEmail.' . $defaultGroup)['priority'],
            'CRLF'          => setting('MultiEmail.' . $defaultGroup)['CRLF'],
            'newline'       => setting('MultiEmail.' . $defaultGroup)['newline'],
            'BCCBatchMode'  => setting('MultiEmail.' . $defaultGroup)['BCCBatchMode'],
            'BCCBatchSize'  => setting('MultiEmail.' . $defaultGroup)['BCCBatchSize'],
            'DSN'           => setting('MultiEmail.' . $defaultGroup)['DSN'],
        ];

        if ($overrides !== []) {
            $config = array_merge($config, $overrides);
        }

        /** @var Email $email */
        $email = service('email');

        return $email->initialize($config);
    }
}
