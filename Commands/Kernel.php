<?php
namespace MalRem\Console\Command;

class Kernel
{
    protected $commands = [
        RunModules::class,
    ];

    public function commands()
    {
        return $this->commands;
    }
}
