<?php

declare(strict_types=1);

namespace Raph\PHPUnitExtensions\DoctrineCollectionsAsserts\Tests;

use Doctrine\Common\Collections\ArrayCollection;
use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\TestCase;
use Raph\PHPUnitExtensions\DoctrineCollectionsAsserts\DoctrineCollectionsAsserts;

class DoctrineCollectionsAssertsTest extends TestCase
{
    use DoctrineCollectionsAsserts;

    public function testAssertCollectionItemExistsThatSatisfiesPredicate(): void
    {
        $collection = new ArrayCollection(['key1' => 'value1', 'key2' => 'value2']);

        self::assertCollectionItemExistsThatSatisfiesPredicate(
            $collection,
            function (string $key, string $value) {
                return $key === 'key1' && $value === 'value1';
            }
        );
    }

    public function testAssertCollectionItemExistsThatSatisfiesPredicateFail(): void
    {
        $this->expectException(AssertionFailedError::class);
        $collection = new ArrayCollection(['key1' => 'value1', 'key2' => 'value2']);

        self::assertCollectionItemExistsThatSatisfiesPredicate(
            $collection,
            function (string $key, string $value) {
                return $key === 'key1' && $value === 'value888';
            }
        );
    }

    public function testAssertWholeCollectionSatisfiesPredicate(): void
    {
        $collection = new ArrayCollection([0, 8, 5, 3]);

        self::assertCollectionItemExistsThatSatisfiesPredicate(
            $collection,
            function (int $key, int $value) {
                return $value > 0;
            }
        );
    }

    public function testAssertWholeCollectionSatisfiesPredicateFail(): void
    {
        $this->expectException(AssertionFailedError::class);

        $collection = new ArrayCollection([0, 8, 5, 3]);

        self::assertCollectionItemExistsThatSatisfiesPredicate(
            $collection,
            function (int $key, int $value) {
                return $key > 10 && $value > 0;
            }
        );
    }
}
