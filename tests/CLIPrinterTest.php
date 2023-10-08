<?php
/*
 * Copyright (c) 2023.
 * @author Tahir Yasin <scriptbaker@gmail.com>
 */

use App\Helpers\BoardingCards;
use App\Main;
use App\Models\Output\CLIPrinter;
use PHPUnit\Framework\TestCase;

/**
 * Class CLIPrinterTest
 *
 * Unit Test for testing CLIPrinter class
 */
class CLIPrinterTest extends TestCase
{
    /**
     * testPrintItinerary
     * @return void
     */
    public function testPrintItinerary()
    {
        $expectedOutput = "1. Take train 78A from Madrid to Barcelona. Sit in seat 45B." . PHP_EOL;
        $expectedOutput .= "2. Take the airport bus from Barcelona to Gerona Airport. No seat assignment." . PHP_EOL;
        $expectedOutput .= "3. From Gerona Airport, take flight SK455 to Stockholm. Gate 45B, seat 3A." . PHP_EOL;
        $expectedOutput .= "   Baggage drop at ticket counter 334." . PHP_EOL;
        $expectedOutput .= "4. From Stockholm, take flight SK22 to New York JFK. Gate 22, seat 7B." . PHP_EOL;
        $expectedOutput .= "   Baggage will we automatically transferred from your last leg." . PHP_EOL;
        $expectedOutput .= "5. You have arrived at your final destination.". PHP_EOL;

        $app = new Main(BoardingCards::getBoardingCards());
        $app->sortBoardingCards();

        $printer = new CLIPrinter();

        ob_start();
        $printer->printItinerary($app->getTransportations(), $app->getSortedBoardingCards());
        $output = ob_get_clean();

        $this->assertEquals(
            $expectedOutput,
            $output,
            'The printItinerary method did not return the expected journey list.'
        );
    }
}