<?php

declare(strict_types=1);

namespace App\Rule\Rule\Username;

use App\Rule\Contract\DependentRuleInterface;
use App\Rule\Contract\RuleInterface;
use App\Rule\Rule\ZShared\StringRule;

final readonly class UsernameLengthRule implements RuleInterface, DependentRuleInterface
{
    public function supports(mixed $value): bool
    {
        return true;
    }

    public function validate(mixed $value): ?string
    {
        $length = strlen($value);

        if ($length > 20 || $length < 4) {
            return 'username.length';
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getDependencies(): array
    {
        return [
            StringRule::class,
        ];
    }
}
