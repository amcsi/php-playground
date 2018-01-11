#!php
<?php
declare(strict_types=1);

use Symfony\Component\Console\Output\OutputInterface;

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Silly\Application();

$app
    ->command('create className', function (string $className, OutputInterface $output) {
        $filename = __DIR__ . "/../src/$className.php";
        $testFilename = __DIR__ . "/../test/{$className}Test.php";
        if (file_exists($filename)) {
            throw new RuntimeException("File $filename already exists.");
        }
        if (file_exists($testFilename)) {
            throw new RuntimeException("File $testFilename alrea    dy exists.");
        }

        $template = file_get_contents(__DIR__ . '/../templates/class.php');
        $testTemplate = file_get_contents(__DIR__ . '/../templates/test.php');

        file_put_contents($filename, str_replace('¤', $className, $template));
        file_put_contents($testFilename, str_replace('¤', $className, $testTemplate));

        $output->writeln('Successfully created:');
        $output->writeln('* ' . realpath($filename));
        $output->writeln('* ' . realpath($testFilename));

        return 0;
    })->descriptions('Create a class with a test', [
        'className' => 'Name of the class to create e.g. Class10',
    ]);
$app->setDefaultCommand('create', true);

$app->run();
