<?php
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HelloWorldCommand extends Command {
    protected static $defaultName = 'app:hello-world';
    protected function configure() {
        $this->setDescription('Say "Hello, World!"');
    }
    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ) {
        $output->writeln('Hello, World!');
        return Command::SUCCESS;
    }
}