<?php
/*
 * Copyright (c) 2023.
 * @author Tahir Yasin <scriptbaker@gmail.com>
 */

namespace App\Models\Transport;

/**
 * Class Bus
 *
 * @package \App\Transport
 */
class Bus extends BaseTransport
{
    const MESSAGE         = 'Take the airport bus';
    const MESSAGE_FROM_TO = ' from %s to %s. ';
    const MESSAGE_NO_SEAT = 'No seat assignment.';

    /**
     * Return the direction message
     *
     * @return string
     */
    public function getDirectionMessage()
    {
        $message = sprintf(
            static::MESSAGE . static::MESSAGE_FROM_TO,
            $this->departure,
            $this->arrival
        );

        $message .= static::MESSAGE_NO_SEAT;

        return $message;
    }
}
