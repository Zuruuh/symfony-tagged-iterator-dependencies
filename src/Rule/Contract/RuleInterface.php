<?php

declare(strict_types=1);

namespace App\Rule\Contract;

use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

#[AutoconfigureTag]
interface RuleInterface
{
    public function supports(mixed $value): bool;
    public function validate(mixed $value): ?string;
}
