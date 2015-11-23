<?php
namespace Mrm\Console\Command;

use Exception;
use Mrm\Console\Command\Module\Kernel;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RunModules extends Command
{
    protected function configure()
    {
        $this->setName('run')
             ->setDescription('Start the scanner.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("Loading modules...");
        $kernel      = new Kernel;
        foreach ($kernel->modules() as $module) {
            $instance = new $module;
            $input = new ArrayInput(['command' => $instance->getName()]);
            try {
                $output->writeln("Running " . $instance->getName());
                $code = $this->getApplication()->doRun($input, $output);
                $output->writeln("");
            } catch (Exception $e) {
                $output->writeln(PHP_EOL . "<error>An exception occurred while running " . $instance->getName() . " (" . $e->getMessage() . ") Terminating.</error>");
                exit(1);
            }
        }
    }
}
