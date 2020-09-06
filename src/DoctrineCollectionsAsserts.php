<?php

declare(strict_types=1);

namespace Raph\PHPUnitExtensions\DoctrineCollectionsAsserts;

use Closure;
use Doctrine\Common\Collections\Collection;
use Raph\PHPUnitExtensions\DoctrineCollectionsAsserts\Constraint\AllCollectionItems;
use Raph\PHPUnitExtensions\DoctrineCollectionsAsserts\Constraint\CollectionHasItem;

trait DoctrineCollectionsAsserts
{
    /**
     * Asserts if at least one collection item satisfies given predicate.
     * How to define predicate see:
     * https://www.doctrine-project.org/projects/doctrine-collections/en/1.6/index.html#exists
     *
     * @param Collection $collection
     * @param Closure $predicate
     * @param string $message
     */
    public static function assertCollectionItemExistsThatSatisfiesPredicate(
        Collection $collection,
        Closure $predicate,
        $message = ''
    ): void {
        static::assertThat(
            $collection,
            new CollectionHasItem($predicate),
            $message
        );
    }

    public static function assertWholeCollectionSatisfiesPredicate(
        Collection $collection,
        Closure $predicate,
        $message = ''
    ): void {
        static::assertThat(
            $collection,
            new AllCollectionItems($predicate),
            $message
        );
    }
}

