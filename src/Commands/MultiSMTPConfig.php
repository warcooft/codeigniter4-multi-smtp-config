<?php

namespace Aselsan\CodeigniterMultiSmtpConfig\Config;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use CodeIgniter\Publisher\Publisher;
use Throwable;

class MultiSMTPConfig extends BaseCommand
{
    protected $group       = 'SMTPConfig';
    protected $name        = 'smtpconfig:publish';
    protected $description = 'Publish SMTP config file into the current application.';

    /**
     * @return void
     */
    public function run(array $params)
    {
        $source = service('autoloader')->getNamespace('Aselsan\\CodeigniterMultiSmtpConfig')[0];

        $publisher = new Publisher($source, APPPATH);

        try {
            $publisher->addPaths([
                'Config/MultiEmail.php',
            ])->merge(false);
        } catch (Throwable $e) {
            $this->showError($e);

            return;
        }

        foreach ($publisher->getPublished() as $file) {
            $contents = file_get_contents($file);
            $contents = str_replace('namespace Aselsan\\CodeigniterMultiSmtpConfig\\Config', 'namespace Config', $contents);
            $contents = str_replace('use CodeIgniter\\Config\\BaseConfig', 'use Aselsan\\CodeigniterMultiSmtpConfig\\Config as BaseMultiSmtpConfig', $contents);
            $contents = str_replace('class MultiEmail extends BaseConfig', 'class MultiEmail extends BaseMultiSmtpConfig', $contents);
            file_put_contents($file, $contents);
        }

        CLI::write(CLI::color('  Published! ', 'green') . 'You can customize the configuration by editing the "app/Config/MultiEmail.php" file.');
    }
}
