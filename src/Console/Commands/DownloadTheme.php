<?php

namespace LaraView\Console\Commands;

class DownloadTheme extends ViewCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'lara:download-theme';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download theme by adjusting to use in LaraView packages';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'All App';


    protected function getTestClassContent($file) {

    }


}