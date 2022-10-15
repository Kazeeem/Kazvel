<?php

namespace Core;

use ErrorException;

class ErrorsException {
    /**
     * @param $level
     * @param $message
     * @param $file
     * @param $line
     * @throws ErrorException
     */
    public static function errorHandler($level, $message, $file, $line)
    {
        if (error_reporting() !== 0) {
            throw new ErrorException($message, 0, $level, $file, $line);
        }
    }

    public static function exceptionHandler($exception)
    {
        $error_code = $exception->getCode();

        if ($error_code != 404) {
            $error_code = 500;
        }

        http_response_code($error_code);

        if (env('DISPLAY_ERRORS')) {
            self::logToFile($exception);
        }
        else {
            self::logToFile($exception);
        }

        echo errorView('errors.'.$error_code);
    }

    protected static function logToFile($exception)
    {
        $log = dirname(__DIR__).'/logs/kazvel_log_'.date('Y-m-d').'.log';

        ini_set('error_log', $log); // Save the details of the problem to the error log.

        $message = "Uncaught exception: ".get_class($exception);
        $message .= "\nMessage: ".$exception->getMessage();
        $message .= "\nStack trace: ".$exception->getTraceAsString();
        $message .= "Thrown in '" . $exception->getFile() . "' on line " . $exception->getLine();

        error_log(PHP_EOL.$message);
    }
}