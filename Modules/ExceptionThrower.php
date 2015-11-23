<?php
namespace MalRem\Console\Command\Module;

use Exception;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ExceptionThrower extends Command
{
    protected function configure()
    {
        $this
            ->setName('module:exception')
            ->setDescription('Throws an exception.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $progress = new ProgressBar($output, 50);
        $progress->start();

        $i = 0;
        while ($i++ < 50) {
            usleep(40000);
            if ($i == 35) {
                throw new Exception("Demonstration exception!");
            }
            $progress->advance();
        }
        $progress->finish();
        $output->writeln("");
    }
}
