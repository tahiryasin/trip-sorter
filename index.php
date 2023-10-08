<?php
/*
 * Copyright (c) 2023.
 * @author Tahir Yasin <scriptbaker@gmail.com>
 */

// Composer autoload
require_once __DIR__ . '/vendor/autoload.php';

use App\Helpers\BoardingCards;
use App\Main;
use App\Models\Output\ItineraryPrinterFactory;


// Trip details
$app = new Main(BoardingCards::getBoardingCards());

// Sort them
$app->sortBoardingCards();

// Print itinerary
$printer = ItineraryPrinterFactory::createPrinter();
$printer->printItinerary($app->getTransportations(), $app->getSortedBoardingCards());
