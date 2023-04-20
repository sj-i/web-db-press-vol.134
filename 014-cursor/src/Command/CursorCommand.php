<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Cursor;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CursorCommand extends Command {
    protected static $defaultName = 'app:cursor';
    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ) {
        $cursor = new Cursor($output);
        $cursor->moveUp(1);
        // ...処理...
        return Command::SUCCESS;
    }
}
