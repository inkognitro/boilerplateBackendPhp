<?php declare(strict_types=1);

namespace App\Packages\Common\Domain;

use App\Packages\Common\Domain\Event\Event;
use App\Packages\Common\Domain\Event\EventStream;
use App\Packages\Common\Domain\Event\ProjectionRepository;

final class EventDispatcher
{
    private $repository;

    public function __construct(ProjectionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function dispatch(EventStream $events): void
    {
        foreach($events->toCollection() as $event) {
            $this->projectEvent($event);
            //todo: execute event subscribers here!
        }
    }

    public function projectEvent(Event $event): void
    {
        $projections = $this->repository->findAll();
        foreach($projections->toCollection() as $projection) {
            $projection->project($event);
        }
    }
}