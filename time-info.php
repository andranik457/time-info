<?php
{
    /**
     * Get time info
     * timestamp to date
     * date to timestamp
     */

    date_default_timezone_set('UTC');

    define('COLOR_RED',         "\033[31m");    # bash red
    define('COLOR_YELLOW',      "\033[33m");    # bash yellow
    define('COLOR_PURPLE',      "\033[35m");    # bash purple
    define('COLOR_END',         "\033[0m");     # bash color END
    define('CIRCLE',            "● ");          # circle
    define('CHECK_MARK',        "✔ ");          # check mark
    define('UN_CHECK_MARK',     "✘ ");          # unCheck mark

    $arguments = getArgvs($argv);

    if (isset($arguments['timestamp'])) {
        $unixTimestamp = $arguments['timestamp'];

        echo COLOR_YELLOW, CIRCLE, $unixTimestamp, COLOR_END, "\n";
        echo COLOR_PURPLE, CHECK_MARK, date('Y-m-d H:i:s', $unixTimestamp), COLOR_END, "\n";
        echo COLOR_PURPLE, CHECK_MARK, date('Y M d H:i:s', $unixTimestamp), COLOR_END, "\n";
    }
    else if (isset($arguments['date'])) {
        $unixTimestamp = strtotime($arguments['date']);

        echo COLOR_PURPLE, CHECK_MARK, $unixTimestamp, COLOR_END, "\n";
        echo COLOR_YELLOW, CIRCLE, date('Y-m-d H:i:s', $unixTimestamp), COLOR_END, "\n";
        echo COLOR_YELLOW, CIRCLE, date('Y M d H:i:s', $unixTimestamp), COLOR_END, "\n";
    }
    else {
        die(COLOR_RED . UN_CHECK_MARK . "Please select argument correct index and try again | index need to be one of this ['date', 'timestamp']" . COLOR_END . "\n");
    }
}


/**
 * @param $argv
 * @return array
 */
function getArgvs($argv): array {
    $args = [];
    for ($i = 1; $i < count($argv); $i++) {
        if (preg_match('/^--([^=]+)=(.*)/', $argv[$i], $match)) {
            $args[$match[1]] = $match[2];
        }
    }

    return $args;
}
