<?php declare(strict_types=1);

namespace App\Packages\Common\Application\Resources\Events;

use Ramsey\Uuid\Uuid;

final class EventId
{
    private $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public static function create(): self
    {
        return new self(Uuid::uuid4()->toString());
    }

    public function toString(): string
    {
        return $this->id;
    }
}