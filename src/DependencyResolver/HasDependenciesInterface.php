<?php

declare(strict_types=1);

namespace App\DependencyResolver;

/**
 * @template-covariant T of object
 */
interface HasDependenciesInterface
{
    /**
     * @return iterable<class-string<T>>
     */
    public function getDependencies(): iterable;
}
