<?php
namespace Mrm\Console\Command\Module;

class Kernel
{
    /*
     * Define all the modules that should be loaded here. They are run in order from top to bottom.
     * This is important if a fix requires another fix to run before it.
     */
    protected $modules = [
        SystemRequirements::class,
        LockFile::class,
        DemoModule::class,
        RemoveLockFile::class,
        // ExceptionThrower::class,
    ];

    public function modules()
    {
        return $this->modules;
    }
}
