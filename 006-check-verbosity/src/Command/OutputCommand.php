<?php
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\StreamableInputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class OutputCommand extends Command {
    protected static $defaultName = 'app:check-verbosity';
    protected function configure() {
        $this->setDescription('データを出力する');
    }
    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ) {
        if (
            $output->getVerbosity()
            >=
            OutputInterface::VERBOSITY_VERBOSE
        ) {
            $output->writeln("詳細な出力");
        }
        return 0;
    }
}
