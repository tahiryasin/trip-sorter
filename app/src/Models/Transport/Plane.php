<?php
/*
 * Copyright (c) 2023.
 * @author Tahir Yasin <scriptbaker@gmail.com>
 */

namespace App\Models\Transport;

/**
 * Class Plane
 *
 * @package \App\Transport
 */
class Plane extends BaseTransport
{
    /**
     * Flight Number
     * @var string
     */
    protected $transportationNumber;

    /**
     * Seat Number
     * @var string
     */
    protected $seat;

    /**
     * Gate Number
     * @var string
     */
    protected $gate;

    /**
     * Baggage Info
     * @var string
     */
    protected $baggage;

    const MESSAGE                   = 'From %s, take flight %s to %s. Gate %s, seat %s.';
    const MESSAGE_BAGGAGE_TICKET    = 'Baggage drop at ticket counter %s.';
    const MESSAGE_NO_BAGGAGE_TICKET = 'Baggage will we automatically transferred from your last leg.';

    /**
     * Return the direction message for the trip, defined in TransportationInterface
     *
     * @return string
     */
    public function getDirectionMessage(): string
    {
        $message = sprintf(
            static::MESSAGE,
            $this->departure,
            $this->transportationNumber,
            $this->arrival,
            $this->gate,
            $this->seat
        );

        // Add Baggage message
        if (!empty($this->baggage)) {
            $message .= sprintf(
                PHP_EOL . '   ' . static::MESSAGE_BAGGAGE_TICKET,
                $this->baggage
            );

            return $message;
        }

        // We don't have baggage
        $message .= PHP_EOL . '   ' . static::MESSAGE_NO_BAGGAGE_TICKET;

        return $message;
    }
}
