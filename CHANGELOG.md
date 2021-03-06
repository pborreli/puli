Changelog
=========

* 1.0.0-alpha4 (@release_date@)

   * added prototypical `PuliAssetFactory` for Assetic
   * renamed `Path::dirname()` to `Path::getDirectory()`
   * added methods to `Path`:
      * `getRoot()`
      * `isAbsolute()`
      * `isRelative()`
      * `makeAbsolute()`
      * `makeRelative()`
      * `isLocal()`
   * added `PuliCssRewriteFilter` for Assetic
   * added `ResourceCollectionIterator` and `DirectoryResourceIterator`
   * added `ResourceFilterIterator`
   * added `TwigTemplateCacheWarmer`
   * renamed `PuliLoader` to `PuliTemplateLoader` for clarity
   * changed `PuliTemplateLoader::getCacheKey()` to prevent cache conflicts with
     templates loaded through a different loader

* 1.0.0-alpha3 (2014-02-22)

   * renamed `PhpResourceLocator` to `PhpCacheLocator`
   * renamed `PhpResourceLocatorDumper` to `PhpCacheDumper`
   * added `FilesystemLocator`
   * removed `ResourceDiscoveringInterface`
   * a base `ResourceLocatorInterface` can now be passed to `ResourceRepository`
   * instead of arrays, `ResourceCollection` objects are now returned everywhere
   * renamed `ResourceInterface::getPath()` to `getRealPath()`
   * renamed `ResourceInterface::getRepositoryPath()` to `getPath()`
   * added an extension for the templating engine Twig
   * added an extension for the Symfony Config and HttpKernel components

* 1.0.0-alpha2 (2014-02-14)

   * fixed "Maximum function nesting level" error on Windows
   * pushed minimum PHP version to 5.3.9
   * removed `TagInterface` and descending classes
   * added support for dot segments ("." and "..")
   * removed `CreationNotAllowedException`
   * removed `RemoveNotAllowedException`
   * removed `RenameNotAllowedException`
   * added `UnsupportedOperationException`
   * added `Path`
   * added `Uri`
   * added `UriLocatorInterface` and `UriLocator`
   * changed `ResourceStreamWrapper::register()` to take a `UriLocatorInterface`
     instance instead of a scheme and a resource locator

* 1.0.0-alpha1 (2014-02-04)

   * first alpha release
