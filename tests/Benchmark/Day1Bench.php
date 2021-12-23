<?php

declare(strict_types=1);

namespace Tests\Benchmark;

class Day1Bench
{
    /**
     * @Iterations(5)
     */
    public function benchDay1()
    {
        ob_start();
        include __DIR__ . '/../../src/day01.php';
        ob_end_clean();
    }
}