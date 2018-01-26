<?php
namespace LaraView\Console\Commands;

use Illuminate\Console\AppNamespaceDetectorTrait;
use Illuminate\Console\GeneratorCommand;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Routing\Router;

abstract class ViewCommand extends GeneratorCommand
{

    /**
     * TestCommand constructor.
     * @param Filesystem $files
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct($files);
    }

    /**
     *
     */
    public function fire()
    {
        dd(2);

    }


    protected function getStub() {

    }

}
