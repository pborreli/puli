<?php

/*
 * This file is part of the Puli package.
 *
 * (c) Bernhard Schussek <bschussek@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Webmozart\Puli\Extension\Symfony\Config;

use Webmozart\Puli\Locator\ResourceLocatorInterface;
use Webmozart\Puli\Locator\ResourceNotFoundException;

/**
 * @since  1.0
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
class PuliFileLocator implements ChainableFileLocatorInterface
{
    /**
     * @var ResourceLocatorInterface
     */
    private $locator;

    public function __construct(ResourceLocatorInterface $locator)
    {
        $this->locator = $locator;
    }

    public function supports($path)
    {
        return isset($path[0]) && '/' === $path[0];
    }

    /**
     * Returns a full path for a given Puli path.
     *
     * @param mixed   $repositoryPath The Puli path to locate
     * @param string  $currentPath    The current path
     * @param boolean $first          Whether to return the first occurrence or
     *                                an array of file names
     *
     * @return string|array The full path to the file|An array of file paths
     *
     * @throws \InvalidArgumentException When the path is not found
     */
    public function locate($repositoryPath, $currentPath = null, $first = true)
    {
        // Accept actual file paths
        if (file_exists($repositoryPath)) {
            return $repositoryPath;
        }

        if (null !== $currentPath && file_exists($currentPath.'/'.$repositoryPath)) {
            throw new \RuntimeException(sprintf(
                'You tried to load the file "%s" using a relative path. '.
                'This functionality is not supported due to a limitation in '.
                'Symfony, because then this file cannot be overridden anymore. '.
                'Please pass the absolute Puli path instead.',
                $repositoryPath
            ));
        }

        try {
            $resource = $this->locator->get($repositoryPath);

            return $first
                ? $resource->getRealPath()
                : array_reverse($resource->getAlternativePaths());
        } catch (ResourceNotFoundException $e) {
            throw new \InvalidArgumentException(sprintf(
                'The file "%s" could not be found.',
                $repositoryPath
            ), 0, $e);
        }
    }
}
