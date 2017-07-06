<?php


namespace App\Console\Commands;

use MartinLindhe\VueInternationalizationGenerator\Generator;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GenLang extends Base
{
    public function handle()
    {
        $root = base_path() . config('vue-i18n-generator.langPath');
        $data = (new Generator)
            ->generateFromPath($root);
        $jsFile = base_path() . config('vue-i18n-generator.jsFile');
        file_put_contents($jsFile, $data);
        echo "Written to " . $jsFile . PHP_EOL;
    }

    protected function configure()
    {
        $this->setName('genVueLang');
        $this->setDescription('Generate Vue Lang js file');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
      $this->handle();
    }
}