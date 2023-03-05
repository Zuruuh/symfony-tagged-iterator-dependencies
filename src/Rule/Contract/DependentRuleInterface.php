<?php

declare(strict_types=1);

namespace App\Rule\Contract;

use App\DependencyResolver\HasDependenciesInterface;

/**
 * @extends HasDependenciesInterface<RuleInterface>
 */
interface DependentRuleInterface extends HasDependenciesInterface
{
}
