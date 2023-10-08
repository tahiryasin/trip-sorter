<?php
/*
 * Copyright (c) 2023.
 * @author Tahir Yasin <scriptbaker@gmail.com>
 */

namespace App\Interfaces;

/**
 * Interface TransportInterface
 *
 * @package \App\Interfaces
 */
interface TransportInterface
{
    /**
     * Return the direction message
     *
     * @return string
     */
    public function getDirectionMessage();
}
