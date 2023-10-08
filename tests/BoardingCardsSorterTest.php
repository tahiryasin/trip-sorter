<?php
/*
 * Copyright (c) 2023.
 * @author Tahir Yasin <scriptbaker@gmail.com>
 */

use PHPUnit\Framework\TestCase;
use App\Helpers\BoardingCards;
use App\Helpers\BoardingCardsSorter;

class BoardingCardsSorterTest extends TestCase
{

    public function testSortBoardingCards()
    {
        $boardingCards = BoardingCards::getBoardingCards();

        $sorter = new BoardingCardsSorter($boardingCards);
        $sorter->sortBoardingCards();
        $sortedCards = $sorter->getBoardingCards();

        $expectedSortedCards = [
            [
                "Departure" => "Madrid",
                "Arrival" => "Barcelona",
                "Transportation" => "Train",
                "TransportationNumber" => "78A",
                "Seat" => "45B",
            ],
            [
                "Departure" => "Barcelona",
                "Arrival" => "Gerona Airport",
                "Transportation" => "Bus",
            ],
            [
                "Departure" => "Gerona Airport",
                "Arrival" => "Stockholm",
                "Transportation" => "Plane",
                "TransportationNumber" => "SK455",
                "Seat" => "3A",
                "Gate" => "45B",
                "Baggage" => "334",
            ],
            [
                "Departure" => "Stockholm",
                "Arrival" => "New York JFK",
                "Transportation" => "Plane",
                "TransportationNumber" => "SK22",
                "Seat" => "7B",
                "Gate" => "22",
            ],
        ];

        $this->assertEquals(
            $expectedSortedCards,
            $sortedCards,
            'The sortBoardingCards method did not return the expected sorted array.'
        );
    }

}
