<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

class ServicesMake extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:services';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new services class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Services';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/services.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        // 儲存檔案的位置
        return $rootNamespace . '\Services';
    }

    /**
     * Replace the namespace for the given stub.
     *
     * @param  string $stub
     * @param  string $name
     * @return $this
     */
    protected function replaceNamespace(&$stub, $name)
    {

        $stub = str_replace(
            [
                'NameRepository'
            ],
            [
                $this->setModel()
            ],
            $stub
        );

        return $this;
    }

    /**
     * set Model
     *
     */
    private function setModel()
    {
        if (!empty($this->option('repository'))) {
            return $this->option('repository') . "Repository";
        } else {
            $name = explode('/', $this->getNameInput('name'));
            $new = str_replace('Services', '', $name[0]);

            return $new . "Repository";
        }
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['repository', 'r', InputOption::VALUE_OPTIONAL, 'Injection  repository.'],
        ];
    }
}
