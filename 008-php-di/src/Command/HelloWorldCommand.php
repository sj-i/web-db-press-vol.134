<?php
namespace App\Command;

use App\Service\HelloMessageService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HelloWorldCommand extends Command {
    protected static $defaultName = 'app:hello';
    public function __construct(
        private HelloMessageService $message_service,
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
        $output->writeln(
            $this->message_service->get()
        );
        return Command::SUCCESS;
    }
}
