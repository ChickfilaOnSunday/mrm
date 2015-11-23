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

class RemoveLockFile extends Command
{
    protected $filesystem;

    protected function configure()
    {
        $this
            ->setName('module:remove-lockfile')
            ->setDescription('Removes a lockfile.')
        ;

        $this->filesystem = new Filesystem();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->filesystem->remove('/tmp/malrem.lock');
        $output->writeln("<info>Successfully removed the lockfile.</info>");
    }
}