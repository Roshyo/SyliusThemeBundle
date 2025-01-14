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

namespace Sylius\Bundle\ThemeBundle\Configuration\Filesystem;

use Sylius\Bundle\ThemeBundle\Configuration\ConfigurationProviderInterface;
use Sylius\Bundle\ThemeBundle\Locator\FileLocatorInterface;

final class FilesystemConfigurationProvider implements ConfigurationProviderInterface
{
    private FileLocatorInterface $fileLocator;

    private ConfigurationLoaderInterface $loader;

    private string $configurationFilename;

    /**
     * @param string $configurationFilename
     */
    public function __construct(FileLocatorInterface $fileLocator, ConfigurationLoaderInterface $loader, $configurationFilename)
    {
        $this->fileLocator = $fileLocator;
        $this->loader = $loader;
        $this->configurationFilename = $configurationFilename;
    }

    public function getConfigurations(): array
    {
        try {
            return array_map(
                [$this->loader, 'load'],
                $this->fileLocator->locateFilesNamed($this->configurationFilename)
            );
        } catch (\InvalidArgumentException $exception) {
            return [];
        }
    }
}
