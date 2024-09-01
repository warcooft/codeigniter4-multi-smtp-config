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
    function multi_email(array $overrides = [], string $group = 'default'): Email
    {
        if (!setting('MultiEmail.' . $group)) {
            throw new Exception("Cannot send email from 'multi_email' helper.\n Undefined group name:  $group");
        }

        $config = [
            'fromEmail'     => env("email.$group.fromEmail", setting('MultiEmail.' . $group)['fromEmail']),
            'fromName'      => env("email.$group.fromName", setting('MultiEmail.' . $group)['fromName']),
            'userAgent'     => setting('MultiEmail.' . $group)['userAgent'],
            'protocol'      => env("email.$group.protocol", setting('MultiEmail.' . $group)['protocol']),
            'mailPath'      => setting('MultiEmail.' . $group)['mailPath'],
            'SMTPHost'      => env("email.$group.SMTPHost", setting('MultiEmail.' . $group)['SMTPHost']),
            'SMTPUser'      => env("email.$group.SMTPUser", setting('MultiEmail.' . $group)['SMTPUser']),
            'SMTPPass'      => env("email.$group.SMTPPass", setting('MultiEmail.' . $group)['SMTPPass']),
            'SMTPPort'      => (int) env("email.$group.SMTPPort", setting('MultiEmail.' . $group)['SMTPPort']),
            'SMTPTimeout'   => setting('MultiEmail.' . $group)['SMTPTimeout'],
            'SMTPKeepAlive' => setting('MultiEmail.' . $group)['SMTPKeepAlive'],
            'SMTPCrypto'    => setting('MultiEmail.' . $group)['SMTPCrypto'],
            'wordWrap'      => setting('MultiEmail.' . $group)['wordWrap'],
            'wrapChars'     => setting('MultiEmail.' . $group)['wrapChars'],
            'mailType'      => setting('MultiEmail.' . $group)['mailType'],
            'charset'       => setting('MultiEmail.' . $group)['charset'],
            'validate'      => setting('MultiEmail.' . $group)['validate'],
            'priority'      => setting('MultiEmail.' . $group)['priority'],
            'CRLF'          => setting('MultiEmail.' . $group)['CRLF'],
            'newline'       => setting('MultiEmail.' . $group)['newline'],
            'BCCBatchMode'  => setting('MultiEmail.' . $group)['BCCBatchMode'],
            'BCCBatchSize'  => setting('MultiEmail.' . $group)['BCCBatchSize'],
            'DSN'           => setting('MultiEmail.' . $group)['DSN'],
        ];

        if ($overrides !== []) {
            $config = array_merge($config, $overrides);
        }

        /** @var Email $email */
        $email = service('email');

        return $email->initialize($config);
    }
}
