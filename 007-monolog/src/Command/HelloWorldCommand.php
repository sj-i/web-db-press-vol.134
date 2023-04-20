<?php
namespace App\Command;

use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HelloWorldCommand extends Command {
    protected static $defaultName = 'app:hello';
    public function __construct(
        private LoggerInterface $logger,
    ) {
        parent::__construct();
    }
    protected function configure() {
        $this->setDescription('データを出力する');
    }
    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ) {
        $this->logger->error('error');
        $this->logger->warning('warning');
        $output->writeln('Hello, World!');
        return Command::SUCCESS;
    }
}
