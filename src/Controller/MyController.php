<?php

declare(strict_types=1);

namespace App\Controller;

use App\Rule\Engine\RuleEngine;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;

#[AsController]
final readonly class MyController
{
    public function __construct()
    {
    }

    #[Route('/')]
    public function __invoke(RuleEngine $ruleEngine): Response
    {
        $errors = $ruleEngine->validate('use');
        dump($errors);

        return new JsonResponse([]);
    }
}
