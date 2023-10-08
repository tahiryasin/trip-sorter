<?php
/*
 * Copyright (c) 2023.
 * @author Tahir Yasin <scriptbaker@gmail.com>
 */

namespace App\Models\Output;
use App\Interfaces\ItineraryPrinterInterface;

/**
 * Class CLIPrinter
 * Print formatted output on the CLI using PHP_EOL
 * @package \App\Models
 */
class CLIPrinter implements ItineraryPrinterInterface
{
    /**
     * Print the itinerary/Journey list
     *
     * @param $transportation
     * @param $boardingCards
     * @return void
     */
    public function printItinerary($transportation, $boardingCards)
    {
        foreach ($transportation as $idx => $transportation) {
            echo ($idx + 1) . ". " . $transportation->getDirectionMessage() . PHP_EOL ;
            // Final destination message
            if ($idx == (count($boardingCards) - 1)) {
                echo ($idx + 2) . ". " . $transportation::MESSAGE_FINAL_DESTINATION . PHP_EOL;
            }
        }
    }
}
