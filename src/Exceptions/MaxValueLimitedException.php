<?php

namespace O21\Numeric\Exceptions;

class MaxValueLimitedException extends \Exception
{
    public function __construct(
        $message = 'Max value for numeric is to 99 999 999 due to PHP number formatting limitations.',
        $code = 0,
        \Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
