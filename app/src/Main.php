<?php
/*
 * Copyright (c) 2023.
 * @author Tahir Yasin <scriptbaker@gmail.com>
 */

namespace App;

use App\Exceptions\RuntimeException;
use App\Helpers\BoardingCardsSorter;
use App\Models\Transport\{Plane};
use App\Models\Transport\Bus;
use App\Models\Transport\Train;

/**
 * Class Main
 *
 * @package \App
 */
class Main
{
    /**
     * BoardingCards
     *
     * @var array
     */
    protected $boardingCards = [];

    /**
     * Sorted boarding cards
     *
     * @var array
     */
    protected $sortedBoardingCards = [];

    /**
     * Default set of transportation
     *
     * @var array
     */
    protected static $transportation = [];

    /**
     * Trip constructor.
     *
     * @param array $boardings
     */
    public function __construct(array $boardingCards)
    {
        $this->setDefaultTransportation();
        $this->boardingCards = $boardingCards;
    }

    /**
     * setDefaultTransportation
     *
     * @return void
     */
    public function setDefaultTransportation()
    {
        static::$transportation = [
            'Train' => Train::class,
            'Bus'   => Bus::class,
            'Plane' => Plane::class,
        ];
    }



    /**
     * Sort boardings This function sorts the boardings in order
     *
     * @return void
     */
    public function sortBoardingCards()
    {
        // Create BoardingCardsSorter instance to sort data
        $boardingCardsSorter = new BoardingCardsSorter($this->boardingCards);
        // Sort boardings and assign them to the sorted boardings array
        $boardingCardsSorter->sortBoardingCards();
        $this->sortedBoardingCards = $boardingCardsSorter->getBoardingCards();
    }

    /**
     * Get sorted transportations as an array of objects
     *
     * @return array
     */
    public function getTransportations(): array
    {
        $transportationList = [];

        if (count($this->sortedBoardingCards) == 0) {
            return $transportationList;
        }

        foreach ($this->sortedBoardingCards as $boardingCard) {
            $TransportType = $boardingCard['Transportation'];

            if (!isset(static::$transportation[$TransportType])) {
                throw new RuntimeException(
                    sprintf(
                        'Unsupported transportation : %s',
                        $TransportType
                    )
                );
            }

            $transportationList[] = new static::$transportation[$TransportType]($boardingCard);
        }

        return $transportationList;

    }

    /**
     * Get sorted boarding cards
     *
     * @return array
     */
    public function getSortedBoardingCards(){
        return $this->sortedBoardingCards;
    }
}
