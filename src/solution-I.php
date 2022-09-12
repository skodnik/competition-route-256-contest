<?php

declare(strict_types=1);

$stdin = fopen('php://stdin', 'r');

$testCaseCount = quickReadline($stdin);

for ($i = 0; $i < $testCaseCount; $i++) {
    $requestCount = quickReadline($stdin);
    $sequence = explode(' ', quickReadline($stdin));

    $set = [];
    $sequenceCounter = 0;
    $maxSequence = 0;

    for ($is = 0; $is < $requestCount; $is++) {
        $set[$sequence[$is]] = true;
        $sequenceCounter++;

        if (count($set) > 2) {
            $is = $is - $sequenceCounter + 1;
            $set = [];
            $sequenceCounter = 0;
        }

        if ($sequenceCounter > $maxSequence) {
            $maxSequence = $sequenceCounter;
        }
    }

    echo $maxSequence . PHP_EOL;
}

function quickReadline($stdin): ?string
{
    if ($line = fgets($stdin)) {
        return rtrim($line, "\r\n");
    }

    return null;
}

fclose($stdin);
