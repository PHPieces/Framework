<?php

namespace PHPieces\Framework;

use League\Plates\Engine;
use PHPieces\Framework\Util\File;

class BaseController
{
    public function __construct(File $file, Engine $templates)
    {
        $this->fs = $file;

        $this->templates = $templates;
    }
}
