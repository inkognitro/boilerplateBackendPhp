<?php declare(strict_types=1);

namespace App\Resources\Application\User\Attributes;

use App\Resources\Application\DateTimeAttribute;
use App\Utilities\DateTimeFactory;

final class CreatedAt extends DateTimeAttribute
{
    public static function getPayloadKey(): string
    {
        return 'createdAt';
    }

    public static function fromString(string $dateTime): self
    {
        return new self(DateTimeFactory::createFromString($dateTime));
    }
}