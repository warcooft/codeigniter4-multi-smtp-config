# CodeIgniter Multiple SMTP Configuration

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
