# CodeIgniter Multiple SMTP Configuration

[![Version](http://poser.pugx.org/aselsan/codeigniter4-multi-smtp-config/version)](https://packagist.org/packages/aselsan/codeigniter4-multi-smtp-config)
[![Latest Unstable Version](http://poser.pugx.org/aselsan/codeigniter4-multi-smtp-config/v/unstable)](https://packagist.org/packages/aselsan/codeigniter4-multi-smtp-config)
![PHP](https://img.shields.io/badge/PHP-%5E8.0-blue)
![CodeIgniter](https://img.shields.io/badge/CodeIgniter-%5E4.8-blue)
[![License](http://poser.pugx.org/aselsan/codeigniter4-multi-smtp-config/license)](https://packagist.org/packages/aselsan/codeigniter4-multi-smtp-config)

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
$email->setSubject("Test Send");
$email->setMessage('Hi, .. ');

if ($email->send(false) === false) {
       throw new Exception('Cannot send email:' . $email->printDebugger(['headers']));
}

// Clear the email
$email->clear();
```

You can use a different vendor/driver by providing the group name in the second parameter.

```php
helper('multi_email');

$email = multi_email(['mailType' => 'html'], 'outlook');
$email->setTo('example@gmail.com');
$email->setSubject("Test Send");
$email->setMessage('Hi, .. ');

if ($email->send(false) === false) {
       throw new Exception('Cannot send email:' . $email->printDebugger(['headers']));
}

// Clear the email
$email->clear();
```

That's it.

## License

This project is licensed under the MIT License - see the [LICENSE](/LICENSE) file for details.
