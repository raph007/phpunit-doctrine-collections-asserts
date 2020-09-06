<?php

declare(strict_types=1);

namespace Raph\PHPUnitExtensions\DoctrineCollectionsAsserts\Constraint;

use Closure;
use PHPUnit\Framework\Constraint\Constraint;

class AllCollectionItems extends Constraint
{
    /**
     * @var Closure
     */
    private $predicate;

    /**
     * AllCollectionItems constructor.
     * @param Closure $predicate
     */
    public function __construct(Closure $predicate)
    {
        $this->predicate = $predicate;
    }

    public function toString(): string
    {
        return 'all items satisfy predicate';
    }

    protected function matches($other): bool
    {
        return $other->forAll($this->predicate);
    }
}
