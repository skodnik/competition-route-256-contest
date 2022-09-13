<?php

declare(strict_types=1);

$stdin = fopen('php://stdin', 'r');

$testCaseCount = quickReadline($stdin);

for ($ic = 0; $ic < $testCaseCount; $ic++) {
    $sequenceLength = quickReadline($stdin);
    $sequence = explode(' ', quickReadline($stdin));

    $set = [];
    $correctSequenceCounter = 1;
    $maxCorrectSequence = 1;

    for ($is = 0; $is < $sequenceLength; $is++) {

        $set[$sequence[$is]] = true;

        $in = $is;
        while ($in < $sequenceLength - 1) {

            $in++;
            $set[$sequence[$in]] = true;

            if (count($set) > 2) {
                $set = [];
                $correctSequenceCounter = 1;

                break;
            }

            $correctSequenceCounter++;

            if ($correctSequenceCounter > $maxCorrectSequence) {
                $maxCorrectSequence = $correctSequenceCounter;
            }
        }

        $set = [];
        $correctSequenceCounter = 1;
    }

    echo $maxCorrectSequence . PHP_EOL;
}

function quickReadline($stdin): ?string
{
    if ($line = fgets($stdin)) {
        return rtrim($line, "\r\n");
    }

    return null;
}

fclose($stdin);
