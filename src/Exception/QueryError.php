<?php

namespace GraphQL\Exception;

use RuntimeException;

/**
 * This exception is triggered when the GraphQL endpoint returns an error in the provided query
 *
 * Class QueryError
 *
 * @package GraphQl\Exception
 */
class QueryError extends RuntimeException
{
    /**
     * @var array
     */
    protected $errorDetails;

    /**
     * QueryError constructor.
     *
     * @param array $errorDetails
     */
    public function __construct($errorDetails)
    {
        $errorString = '';

        foreach ($errorDetails['errors'] as $errorDetail) {
            $errorString .= $errorDetail['message'] . " [" . $errorDetail['extensions']['code'] . "] \n";
        }

        $this->errorDetails = $errorString;
    }

    /**
     * @return string
     */
    public function getErrorDetails()
    {
        return $this->errorDetails;
    }
}