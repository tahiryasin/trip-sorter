<?php
/*
 * Copyright (c) 2023.
 * @author Tahir Yasin <scriptbaker@gmail.com>
 */

namespace App\Helpers;

/**
 * Class BoardingCards
 *
 * @package \App\Helpers
 */
class BoardingCards
{
    /**
     * getBoardingCards
     *
     * @return array
     *
     */
    public static function getBoardingCards(): array
    {
        return $boardingCardsCollection = [
            [
                "Departure"            => "Stockholm",
                "Arrival"              => "New York JFK",
                "Transportation"       => "Plane",
                "TransportationNumber" => "SK22",
                "Seat"                 => "7B",
                "Gate"                 => "22",
            ],
            [
                "Departure"            => "Madrid",
                "Arrival"              => "Barcelona",
                "Transportation"       => "Train",
                "TransportationNumber" => "78A",
                "Seat"                 => "45B",
            ],
            [
                "Departure"            => "Gerona Airport",
                "Arrival"              => "Stockholm",
                "Transportation"       => "Plane",
                "TransportationNumber" => "SK455",
                "Seat"                 => "3A",
                "Gate"                 => "45B",
                "Baggage"              => "334",
            ],
            [
                "Departure"      => "Barcelona",
                "Arrival"        => "Gerona Airport",
                "Transportation" => "Bus",
            ],
        ];
    }
}
