<?php declare(strict_types=1);

namespace App\Packages\Common\Application\CommandHandling\HandlerResponse;

use App\Packages\Common\Application\CommandHandling\HandlerResponse;
use App\Packages\Common\Application\Validation\Messages\MessageBag;

final class SuccessResponse implements HandlerResponse
{
    private $events;
    private $warnings;

    public function __construct(array $events, MessageBag $warnings)
    {
        $this->events = $events;
        $this->warnings = $warnings;
    }

    public function getEvents(): array
    {
        return $this->events;
    }

    public function getWarnings(): MessageBag
    {
        return $this->warnings;
    }
}