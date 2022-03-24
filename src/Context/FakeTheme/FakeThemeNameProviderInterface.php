<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Sylius\Bundle\ThemeBundle\Context\FakeTheme;

use Symfony\Component\HttpFoundation\Request;

interface FakeThemeNameProviderInterface
{
    public const PARAMETER_NAME = '_theme_name';

    public function getName(Request $request): ?string;
}