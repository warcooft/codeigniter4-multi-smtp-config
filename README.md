# CodeIgniter Multiple SMTP Configuration
A lightweight Multi-SMTP configuration helper for your CodeIgniter 4 application. This package allows you to use different email accounts simultaneously.

![CodeIgniter](https://img.shields.io/badge/CodeIgniter-%5E4.8-blue)
![PHP Version Require](https://img.shields.io/badge/PHP-%5E8.0-blue)

## Installation

```
composer require aselsan/codeigniter4-multi-smtp-config
```

## Publish File Config

```
php spark smtpconfig:publish
```

After that, check the `app/Config/MultiEmail.php` file, and set it up with your email credentials.

## Usage

```php
helper('multi_email');

$email = multi_email(['mailType' => 'html']);
$email->setTo('example@gmail.com');
$email->setSubject("Test Send Mail");
$email->setMessage('Hi, Bonjour');

if ($email->send(false) === false) {
       throw new Exception('Cannot send email:' . $email->printDebugger(['headers']));
}

// Clear the email
$email->clear();
```

You can use a different mail config by providing the group name in the second parameter.

```php
helper('multi_email');

$email = multi_email(['mailType' => 'html'], 'outlook');
$email->setTo('example@gmail.com');
$email->setSubject("Test Send Mail");
$email->setMessage('Hi, Bonjour');

if ($email->send(false) === false) {
       throw new Exception('Cannot send email:' . $email->printDebugger(['headers']));
}

// Clear the email
$email->clear();
```

## License

This project is licensed under the MIT License - see the [LICENSE](/LICENSE) file for details.
