<?php declare(strict_types=1);

namespace App\Packages\Common\Application\Resources;

interface ResourceId
{
    public function toString(): string;
}