<?php declare(strict_types=1);

namespace App\Packages\Common\Application\Validation;

final class MessageBag
{
    private $messages;

    public function __construct()
    {
        $this->messages = [];
    }

    public function addMessage(string $key, Message $message): void
    {
        $this->messages[$key] = $message;
    }

    public function addMessageBag(string $key, self $messageBag): void
    {
        $this->messages[$key] = $messageBag;
    }

    public function doesMessageKeyExist(string $key): bool
    {
        return isset($this->messages[$key]);
    }

    public function getCount(): int
    {
        return count($this->messages);
    }

    public function toArray(): array
    {
        $array = [];
        foreach ($this->messages as $key => $value) {
            if ($value instanceof self && count($value->toArray()) === 0) {
                continue;
            }
            if ($value instanceof self) {
                $array[$key] = $value->toArray();
                continue;
            }
            if ($value instanceof Message) {
                $array[$key] = [
                    'code' => $value->getCode(),
                    'message' => $value->getMessage()
                ];
            }
        }
        return $array;
    }
}