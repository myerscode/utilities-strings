# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/), and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## Unreleased

### Changed
- Upgrade minimum PHP version to ^8.5
- Upgrade PHPUnit to ^13.0
- Modernise codebase with Rector (PHP 8.5+ syntax, strict types, early returns, dead code removal)
- Replace deprecated Rector `strictBooleans` set with `codingStyle`
- Replace `squizlabs/php_codesniffer` with `laravel/pint` for linting
- Update tests to use `assertSame` over `assertEquals`, yield-based data providers, and final test classes
- Remove implicit int/bool constructor support — use string casting before passing values
- Tighten type declarations across Utility class (PHPDoc and native types)
- Replace `InvalidFormatArgumentException` with native `Error` for invalid format arguments
- Use `array_all`/`array_any` for containsAll/containsAny methods
- Replace `strlen`/`substr` with `mb_strlen`/`mb_substr` for multibyte safety
- Replace `strtolower`/`strtoupper`/`ucfirst`/`lcfirst` with `mb_` equivalents
- Use `json_validate()` instead of `json_decode` + `json_last_error` for `isJson()`
- Simplify `reverse()` with `mb_str_split` + `array_reverse`
- Simplify `parameters()` with `array_map`

### Added
- PHPStan static analysis at level 8
- `pint.json` config with PSR-12 preset and alphabetical method ordering
- `rector.php` config for automated code modernisation
- Security audit GitHub Actions workflow (daily)
- Dependabot configuration for composer and GitHub Actions
- Composer scripts: `lint`, `analyse`, `security-audit`
- Additional test edge cases and data providers (447 → 492 tests)

### Fixed
- PHPStan level 8 compliance (null safety, return types, iterable types)
- Handle `preg_replace`/`preg_split`/`mb_convert_encoding` returning `false`
- Fix MatchesTest data provider warning in PHPUnit 13 (unused parameters)

### Removed
- `squizlabs/php_codesniffer` dev dependency
- `InvalidFormatArgumentException` and `InvalidStringException` exception classes (unused dead code)
- `InvalidFormatArgumentException` runtime check in `format()` (type safety enforced via PHPDoc)

## [2025.0.0](https://github.com/myerscode/utilities-strings/releases/tag/2025.0.0) - 2025-02-02

- [`1ecc351`](https://github.com/myerscode/utilities-strings/commit/1ecc351ee6e0122e43425bc7fca83edb313ffd5b) chore(core): updated codebase and dependancies for 2025 release
