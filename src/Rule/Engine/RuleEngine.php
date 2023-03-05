<?php

declare(strict_types=1);

namespace App\Rule\Engine;

use App\DependencyResolver\DependencyResolverInterface;
use App\Rule\Contract\RuleInterface;
use Symfony\Component\DependencyInjection\Attribute\TaggedIterator;

final readonly class RuleEngine
{
    /**
     * @var iterable<RuleInterface> $rules
     */
    private iterable $rules;

    /**
     * @param iterable<RuleInterface> $rules
     */
    public function __construct(
        #[TaggedIterator(tag: RuleInterface::class)] iterable $rules,
        DependencyResolverInterface $dependencyResolver
    ) {
        $this->rules = $dependencyResolver->resolve($rules);
    }

    /**
     * @return list<string>
     */
    public function validate(mixed $value): array
    {
        $errors = [];

        foreach ($this->rules as $rule) {
            if ($rule->supports($value)) {
                $message = $rule->validate($value);
                if ($message !== null) {
                    $errors[] = $message;
                }
            }
        }

        return $errors;
    }
}
