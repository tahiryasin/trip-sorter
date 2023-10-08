<?php
/*
 * Copyright (c) 2023.
 * @author Tahir Yasin <scriptbaker@gmail.com>
 */

namespace App\Models\Output;

use App\Interfaces\ItineraryPrinterInterface;

/**
 * HTMLPrinter class
 * Print formatted list output for browsers using <ol>
 *
 * @package \App\Models
 */
class HTMLPrinter implements ItineraryPrinterInterface
{
    /**
     * Print the itinerary/Journey list
     * @param $transportation
     * @param $boardingCards
     * @return void
     */
    public function printItinerary($transportation, $boardingCards)
    {
        echo "<ol>";
        foreach ($transportation as $index => $transportation) {
            echo "<li>".  $transportation->getDirectionMessage()  ."</li>";
            // Final destination message
            if ($index == (count($boardingCards) - 1)) {
                echo "<li>" . $transportation::MESSAGE_FINAL_DESTINATION . "</li>";
            }
        }
        echo "<ol>";
    }
}