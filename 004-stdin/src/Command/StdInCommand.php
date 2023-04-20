<?php
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\StreamableInputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class StdInCommand extends Command {
    protected static $defaultName = 'app:stdin';
    protected function configure() {
        $this->setDescription('標準入力からデータを読み込む');
    }
    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ) {
        assert(
            $input instanceof StreamableInputInterface
        );
        // 標準入力からデータを読み込む
        $stream = $input->getStream() ?? STDIN;
        $data = '';
        while (($line = fgets($stream)) !== false) {
            $data .= $line;
        }
        // 読み取ったデータを処理（ここでは単純に出力）
        $output->writeln('入力データ:');
        $output->writeln($data);
        return Command::SUCCESS;
    }
}