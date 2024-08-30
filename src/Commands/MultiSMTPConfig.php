<?php

namespace Aselsan\CodeigniterMultiSmtpConfig\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use CodeIgniter\Publisher\Publisher;
use Throwable;

class MultiSMTPConfig extends BaseCommand
{
    protected $group       = 'SMTPConfig';
    protected $name        = 'smtpconfig:publish';
    protected $description = 'Publish SMTP config file into the current application.';
    protected $options = [
        '-f' => 'Force overwrite ALL existing files in destination.',
    ];

    /**
     * @return void
     */
    public function run(array $params)
    {
        $source = service('autoloader')->getNamespace('Aselsan\\CodeigniterMultiSmtpConfig')[0];

        $publisher = new Publisher($source, APPPATH);

        $path = 'Config/MultiEmail.php';
        $cleanPath = clean_path($path);
        $merge = true;

        if (file_exists(APPPATH . $path)) {
            $overwrite = (bool) CLI::getOption('f');

            if (
                ! $overwrite
                && CLI::prompt("  File '{$cleanPath}' already exists in destination. Overwrite?", ['n', 'y']) === 'n'
            ) {
                CLI::newLine();
                CLI::error("  Skipped {$cleanPath}. If you wish to overwrite, please use the '-f' option or reply 'y' to the prompt.");

                return;
            }
        }

        try {
            $publisher->addPaths([
                $path,
            ])->merge($merge);
        } catch (Throwable $e) {
            $this->showError($e);

            return;
        }

        foreach ($publisher->getPublished() as $file) {
            $contents = file_get_contents($file);
            $contents = str_replace('namespace Aselsan\\CodeigniterMultiSmtpConfig\\Config', 'namespace Config', $contents);
            $contents = str_replace('use CodeIgniter\\Config\\BaseConfig', 'use Aselsan\\CodeigniterMultiSmtpConfig\\Config\\MultiEmail as BaseMultiEmail', $contents);
            $contents = str_replace('class MultiEmail extends BaseConfig', 'class MultiEmail extends BaseMultiEmail', $contents);
            file_put_contents($file, $contents);
        }

        CLI::write(CLI::color('  Published! ', 'green') . 'You can customize the configuration by editing the "app/Config/MultiEmail.php" file.');
    }
}
