<?php

declare(strict_types=1);

namespace App\Rule\Rule\ZShared;

use App\Rule\Contract\RuleInterface;

final readonly class StringRule implements RuleInterface
{
    public function supports(mixed $value): bool
    {
        return true;
    }

    public function validate(mixed $value): ?string
    {
        if (gettype($value) === 'string') {
            return null;
        }

        return 'type.string';
    }
}
