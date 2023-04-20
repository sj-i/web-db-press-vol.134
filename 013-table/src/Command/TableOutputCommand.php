<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Helper\TableStyle;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TableOutputCommand extends Command {
    protected static $defaultName = 'app:table-output';
    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ) {
        // テーブルデータの準備
        $headers = ['ID', 'Name', 'Email'];
        $rows = [
            [1, 'Alice', 'alice@example.com'],
            [2, 'Bob', 'bob@example.com'],
            [3, 'Carol', 'carol@example.com'],
        ];
        // テーブルのインスタンスを作成
        $table = new Table($output);
        // ヘッダーとデータをセット
        $table->setHeaders($headers)->setRows($rows);
        // テーブルを出力
        $table->render();

        // カスタムスタイルの作成
        $style = new TableStyle();
        $style
            ->setHorizontalBorderChars('=')
            ->setVerticalBorderChars('|')
            ->setDefaultCrossingChar('+')
            ->setCellRowContentFormat('%s ');

        // テーブルにスタイルを適用
        $table->setStyle($style);

        // テーブルを出力
        $table->render();

        return Command::SUCCESS;
    }
}
