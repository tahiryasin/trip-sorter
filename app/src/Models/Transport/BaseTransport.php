<?php
/*
 * Copyright (c) 2023.
 * @author Tahir Yasin <scriptbaker@gmail.com>
 */

namespace App\Models\Transport;

use App\Interfaces\TransportInterface;

/**
 * Class BaseTransport
 *
 * @package \App\Transport
 */
abstract class BaseTransport implements TransportInterface
{
    /**
     * Departure City
     * @var string
     */
    protected $departure;

    /**
     * Arrival City
     * @var string
     */
    protected $arrival;

    const MESSAGE_FINAL_DESTINATION = 'You have arrived at your final destination.';

    /**
     * BaseTransport constructor.
     *
     * @param array $boardingCard
     */
    public function __construct(array $boardingCard)
    {
        foreach ($boardingCard as $key => $value) {
            // Make attribute's first character lowercase
            $property = lcfirst($key);

            if (property_exists($this, $property)) {
                $this->{$property} = $value;
            }
        }
    }
}
