<?php

declare(strict_types=1);

namespace Raph\PHPUnitExtensions\DoctrineCollectionsAsserts\Constraint;

use Closure;
use PHPUnit\Framework\Constraint\Constraint;

class CollectionHasItem extends Constraint
{
    /**
     * @var Closure
     */
    private $predicate;

    /**
     * CollectionHasItem constructor.
     * @param Closure $predicate
     */
    public function __construct(Closure $predicate)
    {
        $this->predicate = $predicate;
    }

    protected function matches($other): bool
    {
        return $other->exists($this->predicate);
    }

    public function toString(): string
    {
        return 'has item that satisfies predicate';
    }
}
