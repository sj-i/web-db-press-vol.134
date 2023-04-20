<?php
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\StreamableInputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class OutputCommand extends Command {
    protected static $defaultName = 'app:output';
    protected function configure() {
        $this->setDescription('データを出力する');
    }
    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ) {
        // -qでも出力される
        $output->writeln(
            'message',
            OutputInterface::VERBOSITY_QUIET
        );
        // -q以外で出力される
        $output->writeln(
            'message',
            OutputInterface::VERBOSITY_NORMAL
        );
        // -vや-vv、-vvvで出力される
        $output->writeln(
            'message',
            OutputInterface::VERBOSITY_VERBOSE
        );
        // -vv、-vvvで出力される
        $output->writeln(
            'message',
            OutputInterface::VERBOSITY_VERY_VERBOSE
        );
        // -vvvで出力される
        $output->writeln(
            'message',
            OutputInterface::VERBOSITY_VERY_VERBOSE
        );
        return Command::SUCCESS;
    }
}
