<?php

namespace JMarcher;

use JMarcher\Assembler\Memory;
use JMarcher\Assembler\Register;
use JMarcher\Assembler\Values\BinaryValue;
use JMarcher\Assembler\Values\IntValue;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class InterpreterCommand extends BaseCommand
{
    protected function configure()
    {
        // This should be the entry point of the application
        $this->setName('start')
            ->setDescription('Interprets the assembly in order to execute the code.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->alert('interpreted');
        $memory = new Memory;
        $register = new Register('EAX');
        $intValue = new BinaryValue;
        $intValue->setValue('11111111000000001111111100000000');
        $intValue->setLowValue('11111111');
        $memory->move('EAX', $intValue);
        $intValue->setValue('11');
        $memory->move('EAX', $intValue);
        $register->setValue($intValue);
        $this->question('Do you want to see how the memory looks like?');
        $this->alert($memory);
    }
}
