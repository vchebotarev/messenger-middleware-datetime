<?php

declare(strict_types=1);

namespace Chebur\MessengerMiddlewareDatetime;

use DateTimeInterface;
use Symfony\Component\Messenger\Stamp\StampInterface;

class Stamp implements StampInterface
{
    /**
     * @var DateTimeInterface
     */
    private $dateTime;

    public function __construct(DateTimeInterface $dateTime)
    {
        $this->dateTime = $dateTime;
    }

    public function getDateTime(): DateTimeInterface
    {
        return $this->dateTime;
    }
}
