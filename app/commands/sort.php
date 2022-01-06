<?php

namespace App\Commands;

use App\Exceptions\EmptyDataException;
use App\Sorting;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;

class Sort extends Command
{
    protected function configure()
    {
        $this->setName('sort:run')
            ->setDescription('Run the sorting algorithm application')
            ->setHelp('This will run the main application')
            ->addOption('type', 
                        'st',
                        InputOption::VALUE_REQUIRED, 
                        'Type of sorting algorithm');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('<info>Start!</info>');
        $continue = "yes";

        do {
            
            $choices = [
                'b' => 'Bubblesort',
                'q' => 'Quicksort',
                'm' => 'Mergesort',
            ];
    
            try {
                $qchoice = new ChoiceQuestion('<question>Which sorting algorithm you want?</question>', $choices);
                $choiceHelper = $this->getHelper('question');
                $sortChoice = $choiceHelper->ask($input,$output,$qchoice);

                $dataHelper = $this->getHelper('question');
                $dataQuestion = new Question('Data to be sorted: ',"");
                $dataAnswer = $dataHelper->ask($input,$output,$dataQuestion);

                if (strlen($dataAnswer) <= 0) throw new EmptyDataException();
               
                if(count(explode(',', $dataAnswer)) <= 1) $dataAnswer = implode(',',str_split($dataAnswer));
                // If passes and no error convert format and execute sorting
                $sort = new Sorting();
                $output->writeln('<info>'.$choices[$sortChoice].' Results...</info>');
                $output->writeln('Input: '.$dataAnswer. ' or '. implode('', explode(',',$dataAnswer)));
                $sort->sortSelector(explode(',',$dataAnswer), $sortChoice);

            } catch (EmptyDataException $e) {
                $output->writeln("<error>{$e->getMessage()}</error>");
            }


            $helper = $this->getHelper('question');
            $question = new Question('Do you want to continue? yes|no ',$continue);
            $answer = $helper->ask($input,$output,$question);

            if (strtolower($answer) == "no" || strtolower($answer) == "n") $continue = "no";
        } while ($continue == "yes");

        return 1;
    }
}