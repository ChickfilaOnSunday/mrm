# mrm
mrm (Malware ReMover) is a command-line utility written in PHP for removing OS X malware. Currently, it is only a demonstration of a modular system that could do this. In the future, it will be able to actually remove and enumerate malware.

It uses the Symfony2 Console and Filesystem components. Malware removal modules are stored in the `Modules` directory and commands to be available to the user are in the `Commands` directory. Just execute `./mrm` to run all the modules, and `./mrm list` to list commands. You will need to install Composer and run `composer install` before attempting to use it.

## Run
```
bash <(curl -s http://git.io/vBGC1)
```
This command will download and run mrm.
