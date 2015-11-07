<?php

require_once 'ClassLoader/UniversalClassLoader.php';

use Symfony\Component\ClassLoader\UniversalClassLoader;

$loader = new UniversalClassLoader();
$loader->register();
$loader->registerNamespace('BackupTask', '.');

$config = include 'config.php';
$backupTask = new BackupTask\BackupTask($config);

try {
        $backupTask->run();
} catch (Exception $e) {
        echo $e->getMessage();
}