<?php
namespace MalRem\Console\Command\Module;

use Exception;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;

class LockFile extends Command
{
    protected $exception;
    protected $filesystem;

    protected function configure()
    {
        $this
            ->setName('module:check-lockfile')
            ->setDescription('Checks for and adds a lockfile.')
        ;

        $this->exception  = new Exception("There is already a lockfile for MalRem on this system (/tmp/malrem.lock). This may mean that MalRem exited early, but it also could mean MalRem is running.");
        $this->filesystem = new Filesystem();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if ($this->filesystem->exists("/tmp/malrem.lock")) {
            throw $this->exception;
        }

        $this->filesystem->touch('/tmp/malrem.lock');

        $output->writeln("<info>Successfully created the lockfile.</info>");
    }
}