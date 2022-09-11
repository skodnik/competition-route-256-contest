<?php

declare(strict_types=1);

$stdin = fopen('php://stdin', 'r');

$testCaseCount = quickReadline($stdin);

$dictionary = [
    'a' => '00',
    'b' => '100',
    'c' => '101',
    'd' => '11',
];

for ($i = 0; $i < $testCaseCount; $i++) {
    $encodedRow = quickReadline($stdin);
    $decodedRow = '';

    for (; 0 < strlen($encodedRow);) {
        foreach ($dictionary as $character => $code) {
            $length = strlen($code);

            if (substr($encodedRow, 0, $length) == $code) {
                $decodedRow .= $character;
                $encodedRow = substr($encodedRow, $length);
                break;
            }
        }
    }

    echo $decodedRow . PHP_EOL;
}

function quickReadline($stdin): ?string
{
    if ($line = fgets($stdin)) {
        return rtrim($line, "\r\n");
    }

    return null;
}

fclose($stdin);
