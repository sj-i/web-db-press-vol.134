<?php
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AnotherCommand extends Command {
    protected static $defaultName = 'app:another';
    protected function configure() {
        $this->setDescription('Say "Hello, Another World!"');
    }
    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ) {
        $output->writeln('Hello, Another World!');
        return Command::SUCCESS;
    }
}
