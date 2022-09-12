<?php

declare(strict_types=1);

$stdin = fopen('php://stdin', 'r');

$testCaseCount = quickReadline($stdin);

for ($i = 0; $i < $testCaseCount; $i++) {
    [$d, $m, $y] = explode(' ', quickReadline($stdin));

    $date = DateTimeImmutable::createFromFormat('j n Y', $d . ' ' . $m . ' ' . $y);

    if ($date->format('j n Y') === $d . ' ' . $m . ' ' . $y) {
        echo 'YES' . PHP_EOL;

        continue;
    }

    echo 'NO' . PHP_EOL;
}

function quickReadline($stdin): ?string
{
    if ($line = fgets($stdin)) {
        return rtrim($line, "\r\n");
    }

    return null;
}

fclose($stdin);
