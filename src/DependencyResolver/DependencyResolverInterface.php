<?php

declare(strict_types=1);

namespace App\DependencyResolver;

interface DependencyResolverInterface
{
    /**
     * @template T of HasDependenciesInterface
     *
     * @param iterable<T> $dependencies
     *
     * @return iterable<T>
     */
    public function resolve(iterable $dependencies): iterable;
}
