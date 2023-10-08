<?php
/*
 * Copyright (c) 2023.
 * @author Tahir Yasin <scriptbaker@gmail.com>
 */

namespace App\Interfaces;

/**
 * Interface ItineraryPrinterInterface
 *
 * @package \App\Interfaces
 */
interface ItineraryPrinterInterface
{
    /**
     * Output the itinerary/journey list
     * @param $transportation
     * @param $boardingCards
     * @return void
     */
    public function printItinerary($transportation, $boardingCards);
}