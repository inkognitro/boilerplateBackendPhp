<?php declare(strict_types=1);

namespace App\Resources\User\Application\Application\User\Command\Event;

use App\Packages\Common\Application\Authorization\User as AuthUser;
use App\Packages\Common\Application\CommandHandling\Event\AbstractEvent;
use App\Packages\Common\Application\CommandHandling\Event\Payload;
use App\Resources\User\Application\User;
use DateTimeImmutable;

final class UserWasRemoved extends AbstractEvent
{
    public static function occur(Payload $payload, AuthUser $authUser): self
    {
        $previousPayload = null;
        return new self(
            new DateTimeImmutable('now'), $authUser, $payload, $previousPayload
        );
    }

    public function mustBeLogged(): bool
    {
        return true;
    }

    public  function getResourceClass(): string
    {
        return User::class;
    }
}