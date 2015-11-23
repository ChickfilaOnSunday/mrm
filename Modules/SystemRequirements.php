<?php
namespace MalRem\Console\Command\Module;

use Exception;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SystemRequirements extends Command
{
    protected $exception;

    protected function configure()
    {
        $this
            ->setName('module:system-requirements')
            ->setDescription('Checks the system requirements to confirm the operating system is OS X.')
        ;

        $this->exception = new Exception("This operating system is not supported.");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $progress = new ProgressBar($output, 3);
        $progress->start();

        if (php_uname("s") != "Darwin" || PHP_OS != "Darwin") {
            throw $this->exception;
        }

        $progress->advance();

        if (php_uname("m") != "x86_64") {
            throw $this->exception;
        }

        $progress->advance();

        if (posix_getuid() != 0) {
            throw new Exception('You must run MalRem with sudo.');
        }

        $progress->advance();

        $progress->finish();
    }
}