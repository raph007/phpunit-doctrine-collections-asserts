# PHPUnit Doctrine Collections asserts extensions

This extension allows asserting [Doctrine Collections](https://www.doctrine-project.org/projects/doctrine-collections/en/1.6/index.html#introduction) by given predicates in tests.

## Installation

Install it via Composer:

```
composer require --dev raph007/phpunit-doctrine-collections-asserts
```

## Usage

Use DoctrineCollectionsAsserts:

```php
<?php

declare(strict_types=1);

namespace Raph\PHPUnitExtensions\DoctrineCollectionsAsserts\Tests;

use Doctrine\Common\Collections\ArrayCollection;
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
}
```
