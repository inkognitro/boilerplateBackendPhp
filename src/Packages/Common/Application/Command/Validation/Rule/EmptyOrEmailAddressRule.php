<?php declare(strict_types=1);

namespace App\Packages\Common\Application\Command\Validation\Rule;

use App\Packages\Common\Application\Command\Validation\Message\MustBeAStringMessage;
use App\Packages\Common\Application\Command\Validation\Message\MustBeAnEmailAddressMessage;
use App\Packages\Common\Application\Command\Validation\Message;
use App\Packages\Common\Application\Command\Validation\Rule;

final class EmptyOrEmailAddressRule implements Rule
{
    public function getMessageFromValidation($data): ?Message
    {
        if(!is_string($data)) {
            return new MustBeAStringMessage();
        }

        if(strlen($data) === 0) {
            return null;
        }

        if(filter_var($data, FILTER_VALIDATE_EMAIL)) {
            return new MustBeAnEmailAddressMessage();
        }

        return null;
    }
}