<?php
/*
 * Copyright (c) 2023.
 * @author Tahir Yasin <scriptbaker@gmail.com>
 */

namespace App\Models\Output;

/**
 * Class ItineraryPrinterFactory
 *
 * @package \App\Models
 */
class ItineraryPrinterFactory
{
    /**
     * Instantiate appropriate printer class
     * 
     * @return CLIPrinter|HTMLPrinter
     */
    public static function createPrinter()
    {
        if (php_sapi_name() === 'cli') {
            return new CLIPrinter();
        } else {
            return new HTMLPrinter();
        }
    }
}
