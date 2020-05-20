<?php

declare(strict_types=1);

namespace Chebur\MessengerMiddlewareDatetime;

use Chebur\DateTimeFactory\DateTimeFactoryInterface;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Middleware\MiddlewareInterface;
use Symfony\Component\Messenger\Middleware\StackInterface;

class Middleware implements MiddlewareInterface
{
    /**
     * @var DateTimeFactoryInterface
     */
    private $dateTimeFactory;

    public function __construct(DateTimeFactoryInterface $dateTimeFactory)
    {
        $this->dateTimeFactory = $dateTimeFactory;
    }

    public function handle(Envelope $envelope, StackInterface $stack): Envelope
    {
        if (null === $envelope->last(Stamp::class)) {
            $envelope = $envelope->with(new Stamp($this->dateTimeFactory->createDateTime()));
        }

        return $stack->next()->handle($envelope, $stack);
    }
}
