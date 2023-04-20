<?php
namespace App\Command;

use App\Service\HelloMessageService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Symfony\Component\Console\Question\Question;

class SetStyleCommand extends Command {
    protected static $defaultName = 'app:set-style';
    protected function configure() {
        $this->setDescription('データを出力する');
    }
    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ) {
        $style = new OutputFormatterStyle('red');
        $output->getFormatter()->setStyle(
            'error',
            $style
        );
        // ...
        $output->writeln('<error>Error message.</error>');
        // ...
        return Command::SUCCESS;
    }
}
