<?php


use Illuminate\Support\Facades\Log;

function reportError(Throwable $t): void
{
    Log::error(
        $t->getMessage()
        . ' in line: ' . $t->getLine()
        . 'in file: ' . $t->getFile()
    );
}
