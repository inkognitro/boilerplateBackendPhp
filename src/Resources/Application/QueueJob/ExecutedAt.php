<?php declare(strict_types=1);

namespace App\Resources\Application\QueueJob;

use App\Resources\Application\DateTimeAttribute;
use App\Utilities\DateTimeFactory;

final class ExecutedAt extends DateTimeAttribute
{
    public static function getKey(): string
    {
        return 'queueJob.executedAt';
    }

    public static function fromString(string $dateTime): self
    {
        return new self(DateTimeFactory::createFromString($dateTime));
    }
}