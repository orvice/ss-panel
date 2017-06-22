<?php


namespace App\Command;

use MartinLindhe\VueInternationalizationGenerator\Generator;

class GenLang
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
}