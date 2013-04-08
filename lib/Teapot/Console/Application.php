<?php
namespace Teapot\Console;

use \ArrayObject;
use \Pimple;
use \Symfony\Component\Console\Application as BaseApplication;
use \Symfony\Component\Console\Input\InputInterface;
use \Symfony\Component\Console\Input\ArrayInput;
use \Symfony\Component\Console\Output\OutputInterface;

use \Teapot\Console\Command\ShowCommand;

class Application extends BaseApplication
{
    private $container;

    public function __construct()
    {
        parent::__construct('Teapot');

        $this->container = $c = new Pimple();

        $c['console.commands.show'] = function ($c) {
            return new ShowCommand();
        };

        $c['console.commands'] = function ($c) {
            return array(
                $c['console.commands.show'],
            );
        };
    }

    /**
     * {@inheritdoc}
     */
    public function doRun(InputInterface $input, OutputInterface $output)
    {
        foreach ($this->container['console.commands'] as $command) {
            $this->add($command);
        }
        return parent::doRun($input, $output);
    }
}
