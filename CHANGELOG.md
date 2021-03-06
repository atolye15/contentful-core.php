# Changelog

All notable changes to this project will be documented in this file.
This project adheres to [Semantic Versioning](http://semver.org/).

## [2.1.0](https://github.com/contentful/contentful-core.php/tree/2.1.0) (2018-11-07)

### Added

* Interface `LinkResolverInterface` now declares method `resolveLinkCollection`.

## [2.0.0](https://github.com/contentful/contentful-core.php/tree/2.0.0) (2018-10-30)

**ATTENTION**: This release contains breaking changes. Please take extra care when updating to this version. See [the upgrade guide](UPGRADE-2.0.md) for more.

## [2.0.0-beta2](https://github.com/contentful/contentful-core.php/tree/2.0.0-beta2) (2018-10-15)

### Added

* The following interfaces have been added: `AssetInterface`, `ContentTypeInterface`, `EntryInterface`, `ClientInterface`, `ResourcePoolInterface`.

### Changed

* Client objects now must declare a `request` method defined in `ClientInterface`.
* `ResourceArray` now implements `ResourceInterface`.
* Logic for querying the API has been refactored into the new `Requester` class.
* Client methods `getVersion`, `getPackageName`, `getSdkName`, and `getApiContentType` are now static. **[BREAKING]**

## [2.0.0-beta1](https://github.com/contentful/contentful-core.php/tree/2.0.0-beta1) (2018-09-18)

### Added

* Class `Contentful\Core\File\ImageOptions` now has a `setPng8Bit` method which will force the image to be returned as a 8-bit PNG.
* Interface `Contentful\Core\File\ProcessedFileInterface` has been introduced, and can be used to identify assets that have already been processed and have a `url` property available.

### Changed

* Class `Contentful\Core\Api\BaseClient` no longer has abstract method `getSdkVersion`, now instead it requires `getPackageName`. The version of the SDK will be inferred automatically using that value.
* Options array in `Contentful\Core\Api\BaseClient::request` now uses property `host` instead of `baseUri`.

## [1.5.0](https://github.com/contentful/contentful-core.php/tree/1.5.0) (2018-08-30)

### Added

* Class `ObjectHydrator` has been introduced, to abstract resource hydration.

## [1.4.0](https://github.com/contentful/contentful-core.php/tree/1.4.0) (2018-08-29)

### Added

* Coding standards are implemented in a generic way so that it can be reused in all SDKs.

## [1.3.0](https://github.com/contentful/contentful-core.php/tree/1.3.0) (2018-08-28)

### Added

* `LinkResolverInterface` was added to abstract link resolving.

## [1.2.0](https://github.com/contentful/contentful-core.php/tree/1.2.0) (2018-08-23)

### Changed

* The client used to create a log entry with a full message by default. Now it will create one regular entry with either level "INFO" or "ERROR" depending on the status code of the response, and one with level "DEBUG" with full dumps of request, response, and exception. 

## [1.1.0](https://github.com/contentful/contentful-core.php/tree/1.1.0) (2018-06-06)

### Fixed

* `Contentful\Core\Api\Location` used to provide a wrongful serialization of the longitude property. Now it correctly serializes to `lon` instead of `long`.

### Changed

* The `Contentful\Core\Log\Timer` has been deprecated and will be removed in version 2.

## [1.0.0](https://github.com/contentful/contentful-core.php/tree/1.0.0) (2018-04-17)

### Added

* Initial release.
