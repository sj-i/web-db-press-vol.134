<?php
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class HelloWorldCommand extends Command {
    protected static $defaultName = 'app:hello-world';
    protected function configure() {
        $this->setDescription('挨拶を出力')
            ->addArgument(
                'name',
                InputArgument::REQUIRED,
                '挨拶する相手の名雨'
            )
            ->addOption(
                'repeat',
                'r',
                InputOption::VALUE_OPTIONAL,
                '挨拶を繰り返す回数',
                1
            );
    }
    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ) {
        $name = $input->getArgument('name');
        $repeat = $input->getOption('repeat');
        for ($i = 0; $i < $repeat; ++$i) {
            $output->writeln(
                sprintf('Hello, %s!', $name)
            );
        }
        return Command::SUCCESS;
    }
}