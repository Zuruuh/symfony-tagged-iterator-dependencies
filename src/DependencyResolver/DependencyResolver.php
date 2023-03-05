<?php

declare(strict_types=1);

namespace App\DependencyResolver;

use MJS\TopSort\CircularDependencyException;
use MJS\TopSort\ElementNotFoundException;
use MJS\TopSort\Implementations\StringSort;

final readonly class DependencyResolver implements DependencyResolverInterface
{
    /**
     *{@inheritdoc}
     * @throws CircularDependencyException
     * @throws ElementNotFoundException
     */
    public function resolve(iterable $dependencies): iterable
    {
        $indexedDependencies = [];
        $sorter = new StringSort();

        foreach ($dependencies as $dependency) {
            $indexedDependencies[$dependency::class] = $dependency;
            $sorter->add($dependency::class, $dependency instanceof HasDependenciesInterface ? $dependency->getDependencies() : []);
        }

        return array_map(static fn (string $class) => $indexedDependencies[$class], $sorter->sort());
    }
}