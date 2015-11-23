# MalRem
MalRem (MalwareRemoval) is a command-line utility written in PHP for removing OS X malware. Currently, it is only a demonstration of a modular system that could do this. In the future, it will be able to actually remove and enumerate malware.

It uses the Symfony2 Console and Filesystem components. Malware removal modules are stored in the `Modules` directory and commands to be available to the user are in the `Commands` directory. Just execute `./malrem` to run all the modules, and `./malrem list` to list commands. You will need to install Composer and run `composer install` before attempting to use it.

## Quick Install
If you already have Composer installed, the installation is two lines:

```
composer global require iang/mac-malware-removal:dev-master
export PATH=$PATH:~/.composer/vendor/bin
```

Then you should be able to run `malrem` from anywhere.