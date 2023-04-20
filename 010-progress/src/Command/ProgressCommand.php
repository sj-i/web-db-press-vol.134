<?php
namespace App\Command;

use App\Service\HelloMessageService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ProgressCommand extends Command {
    protected static $defaultName = 'app:progress';
    protected function configure() {
        $this->setDescription('データを出力する');
    }
    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ) {
        $data = range(1, 100);
        $progressBar = new ProgressBar(
            $output,
            count($data)
        );
        foreach ($data as $item) {
            // ...処理...
            usleep(10000);
            $progressBar->advance();
        }
        $progressBar->finish();
        $output->writeln('');
        return Command::SUCCESS;
    }
}
