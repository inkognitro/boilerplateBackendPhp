<?php declare(strict_types=1);

namespace App\Packages\UserManagement\Application\Resources\Events;

use App\Packages\Common\Application\Authorization\User\User as AuthUser;
use App\Packages\Common\Application\Resources\AbstractResource;
use App\Packages\Common\Application\Resources\Events\AbstractEvent;
use App\Packages\Common\Application\Resources\Events\EventId;
use App\Packages\Common\Application\Resources\Events\OccurredAt;
use App\Packages\UserManagement\Application\Resources\Events\UserPayload;
use App\Packages\UserManagement\Application\Resources\User\User;

final class UserWasCreated extends AbstractEvent
{
    public static function occur(User $user, AuthUser $authUser): self
    {
        $previousPayload = null;
        $occurredAt = OccurredAt::create();
        $payload = UserPayload::fromUser($user, [
            'createdAt' => $occurredAt->toString()
        ]);
        return new self(EventId::create(), $occurredAt, $authUser, $payload, $previousPayload);
    }

    public function getUser(): User
    {
        /** @var $payload UserPayload */
        $payload = $this->getPayload();
        return $payload->toUser();
    }

    public function getResource(): AbstractResource
    {
        return $this->getUser();
    }

    public function mustBeLogged(): bool
    {
        return true;
    }
}