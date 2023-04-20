<?php
namespace App\Command;

use App\Service\HelloMessageService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Symfony\Component\Console\Question\Question;

class QuestionCommand extends Command {
    protected static $defaultName = 'app:question';
    protected function configure() {
        $this->setDescription('データを出力する');
    }
    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ) {
        $helper = $this->getHelper('question');
        $question = new ConfirmationQuestion(
            '処理を続行しますか? [y/N] ',
            false
        );
        if (!$helper->ask($input, $output, $question)) {
            $output->writeln('中止しました');
            return Command::FAILURE;
        }
        // 任意の文字列入力を求める
        $filenameQuestion = new Question(
            'ファイルの保存先を入力してください: '
        );
        $filename = $helper->ask(
            $input,
            $output,
            $filenameQuestion
        );
        // 選択肢からいずれかを選ばせる
        $choices = ['選択肢A', '選択肢B', '選択肢C'];
        $choiceQuestion = new ChoiceQuestion(
            'いずれかを選択してください:',
            $choices,
            0
        );
        $choice = $helper->ask(
            $input,
            $output,
            $choiceQuestion
        );
        $output->writeln(
            json_encode(
                [
                    'filename' => $filename,
                    'choice' => $choice,
                ],
                JSON_UNESCAPED_UNICODE
            )
        );
        return Command::SUCCESS;
    }
}
