<?php

/**
 * This file is part of CodeIgniter 4 framework.
 *
 * (c) 2024 CodeIgniter Foundation <syamsuddine9@icloud.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Aselsan\CodeigniterMultiSmtpConfig\Config;

use CodeIgniter\Config\BaseConfig;

class MultiEmail extends BaseConfig
{
    public string $defaultGroup = 'default';

    public array $default = [
        'fromEmail'     => '',
        'fromName'      => '',
        'recipients'    => '',
        'userAgent'     => 'CodeIgniter',
        'protocol'      => 'smtp',
        'mailPath'      => '/usr/sbin/sendmail',
        'SMTPHost'      => 'smtp.gmail.com',
        'SMTPUser'      => '',
        'SMTPPass'      => '',
        'SMTPPort'      => 587,
        'SMTPTimeout'   => 30,
        'SMTPKeepAlive' => false,
        'SMTPCrypto'    => 'tls',
        'wordWrap'      => true,
        'wrapChars'     => 76,
        'mailType'      => 'html',
        'charset'       => 'UTF-8',
        'validate'      => false,
        'priority'      => 3,
        'CRLF'          => "\r\n",
        'newline'       => "\r\n",
        'BCCBatchMode'  => false,
        'BCCBatchSize'  => 200,
        'DSN'           => false,
    ];

    public array $outlook = [
        'fromEmail'     => '',
        'fromName'      => '',
        'recipients'    => '',
        'userAgent'     => 'CodeIgniter',
        'protocol'      => 'smtp',
        'mailPath'      => '/usr/sbin/sendmail',
        'SMTPHost'      => 'smtp.office365.com',
        'SMTPUser'      => '',
        'SMTPPass'      => '',
        'SMTPPort'      => 587,
        'SMTPTimeout'   => 30,
        'SMTPKeepAlive' => false,
        'SMTPCrypto'    => 'tls',
        'wordWrap'      => true,
        'wrapChars'     => 76,
        'mailType'      => 'html',
        'charset'       => 'UTF-8',
        'validate'      => false,
        'priority'      => 3,
        'CRLF'          => "\r\n",
        'newline'       => "\r\n",
        'BCCBatchMode'  => false,
        'BCCBatchSize'  => 200,
        'DSN'           => false,
    ];

    // public array $mailgun = [
    //     'fromEmail'     => '', // Replace it with the email you used as the sender
    //     'fromName'      => '', // Replace with sender name
    //     'recipients'    => '', // Can be left blank if there are no default settings for the recipient
    //     'userAgent'     => 'CodeIgniter',
    //     'protocol'      => 'smtp',
    //     'mailPath'      => '/usr/sbin/sendmail',
    //     'SMTPHost'      => 'smtp.mailgun.org', // Host SMTP Mailgun
    //     'SMTPUser'      => '', // Replace with your Mailgun email address (e.g. postmaster@yourdomain.com)
    //     'SMTPPass'      => '', // Replace it with the Mailgun SMTP password or API key
    //     'SMTPPort'      => 587, // Port SMTP Mailgun for TLS
    //     'SMTPTimeout'   => 30,
    //     'SMTPKeepAlive' => false,
    //     'SMTPCrypto'    => 'tls', // Encryption TLS untuk Mailgun
    //     'wordWrap'      => true,
    //     'wrapChars'     => 76,
    //     'mailType'      => 'html',
    //     'charset'       => 'UTF-8',
    //     'validate'      => false,
    //     'priority'      => 3,
    //     'CRLF'          => "\r\n",
    //     'newline'       => "\r\n",
    //     'BCCBatchMode'  => false,
    //     'BCCBatchSize'  => 200,
    //     'DSN'           => false,
    // ];

    // public array $sendgrid = [
    //     'fromEmail'     => '', // Replace it with the email you used as the sender
    //     'fromName'      => '', // Replace with sender name
    //     'recipients'    => '', // Can be left blank if there are no default settings for the recipient
    //     'userAgent'     => 'CodeIgniter',
    //     'protocol'      => 'smtp',
    //     'mailPath'      => '/usr/sbin/sendmail',
    //     'SMTPHost'      => 'smtp.sendgrid.net', // Host SMTP Mailgun
    //     'SMTPUser'      => '', // Username SMTP SendGrid, use 'apikey'
    //     'SMTPPass'      => '', // Replace it with the SendGrid SMTP password or API key
    //     'SMTPPort'      => 587, // Port SMTP Mailgun for TLS
    //     'SMTPTimeout'   => 30,
    //     'SMTPKeepAlive' => false,
    //     'SMTPCrypto'    => 'tls', // Encryption TLS for SendGrid
    //     'wordWrap'      => true,
    //     'wrapChars'     => 76,
    //     'mailType'      => 'html',
    //     'charset'       => 'UTF-8',
    //     'validate'      => false,
    //     'priority'      => 3,
    //     'CRLF'          => "\r\n",
    //     'newline'       => "\r\n",
    //     'BCCBatchMode'  => false,
    //     'BCCBatchSize'  => 200,
    //     'DSN'           => false,
    // ];
}
