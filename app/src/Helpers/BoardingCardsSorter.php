<?php
/*
 * Copyright (c) 2023.
 * @author Tahir Yasin <scriptbaker@gmail.com>
 */

namespace App\Helpers;

/**
 * Class BoardingCardsSorter
 *
 * @package \App\Helpers
 */
class BoardingCardsSorter
{
    /**
     * Boardings
     *
     * @var array
     */
    protected $boardingCards = [];

    /**
     * @var array A mapping of departure cities to their corresponding boarding cards.
     */
    private $departureMap;

    /**
     * @var array A set of arrival cities found in the boarding cards.
     */
    private $arrivalSet;

    /**
     * BoardingCardsSorter constructor.
     *
     * @param array $boardingCards
     */
    function __construct(array $boardingCards)
    {
        $this->boardingCards = $boardingCards;
        $this->departureMap = [];
        $this->arrivalSet = [];
        $this->processBoardingCards();
    }

    /**
     * Process the boarding cards and build data structures.
     */
    private function processBoardingCards()
    {
        foreach ($this->boardingCards as $card) {
            $departure = $card['Departure'];
            $arrival = $card['Arrival'];

            $this->departureMap[$departure] = $card;
            $this->arrivalSet[$arrival] = true;
        }
    }

    /**
     * Sort boarding cards
     * This function sorts the boarding cards in order
     *
     * @return void
     */
    function sortBoardingCards() {
        // Find the starting point (departure city)
        $start = $this->findStartingPoint();

        if (!$start) {
            // Handle the case where there's no clear starting point
            return [];
        }

        $sortedBoardingCards = [];
        $currentCity = $start;

        // Assemble the sorted boarding cards
        while (isset($this->departureMap[$currentCity])) {
            $card = $this->departureMap[$currentCity];
            $sortedBoardingCards[] = $card;
            $currentCity = $card['Arrival'];
        }

        $this->boardingCards = $sortedBoardingCards;
    }

    /**
     * Find the starting point of the journey.
     *
     * @return string|null The starting point (departure city) or null if not found.
     */
    private function findStartingPoint()
    {
        foreach ($this->boardingCards as $card) {
            $departure = $card['Departure'];
            if (!isset($this->arrivalSet[$departure])) {
                return $departure;
            }
        }
        return null;
    }

    /**
     * Get boarding cards
     *
     * @return array
     */
    public function getBoardingCards(): array
    {
        return $this->boardingCards;
    }



}
