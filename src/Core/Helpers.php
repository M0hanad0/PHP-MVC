<?php

namespace App\Core\Helpers;

function isUpper($chr)
{
    return mb_strtolower($chr, "UTF-8") !== $chr;
}

function isLower($chr)
{
    return mb_strtoupper($chr, "UTF-8") !== $chr;
}
