# AGENTS.md

PHP client for the [Bling ERP API v3](https://developer.bling.com.br/). Consumers call `new Bling($accessToken)` with a bearer access token and then methods on resource modules (contacts, products, NFe, orders, logistics, and the rest of the inventory in `src/Bling.php`). HTTP is centralized in `BlingRepository` (Guzzle). Each entity maps a Bling endpoint to `get`, `find`, `create`, `update`, `delete`, and domain actions, and parses the reply with a schema class under `Schema/`. Issuing the access token is outside this package; `demo/` is the authorization-code sample.

## Cursor Rules

Rules live under `.cursor/rules/`. Each file states one standard for its topic.

### Architecture

| Rule | Summary |
|------|---------|
| [overview](.cursor/rules/architecture/overview.mdc) | Layering, assumptions, and the entity module inventory |
| [auth-layer](.cursor/rules/architecture/auth-layer.mdc) | Bearer access token, `new Bling($accessToken)`, fixed base URL |
| [repository-layer](.cursor/rules/architecture/repository-layer.mdc) | `IBlingRepository` verb mapping and Guzzle transport |
| [entity-modules](.cursor/rules/architecture/entity-modules.mdc) | Per-resource folder layout and method conventions |
| [bling-facade](.cursor/rules/architecture/bling-facade.mdc) | `Bling` magic getters and lazy module registration |
| [extending-entities](.cursor/rules/architecture/extending-entities.mdc) | Checklist for new modules and operations |
| [exceptions-and-errors](.cursor/rules/architecture/exceptions-and-errors.mdc) | `BlingApiException`, `BlingInternalException`, payload parse errors |
| [shared-and-helpers](.cursor/rules/architecture/shared-and-helpers.mdc) | `@shared` bases, request DTOs, and helpers |

### Code Style

| Rule | Summary |
|------|---------|
| [php](.cursor/rules/code-style/php.mdc) | PHP 8.2, PSR-4, readonly schema objects, synchronous calls |
| [naming](.cursor/rules/code-style/naming.mdc) | Files, classes, endpoints, enums, and facade getters |
| [schemas-and-enums](.cursor/rules/code-style/schemas-and-enums.mdc) | `Schema/` and `Enum/` organization |
| [linting-and-formatting](.cursor/rules/code-style/linting-and-formatting.mdc) | PHPStan api-library preset (level 3), PHP-CS-Fixer, Composer scripts, on-commit CI |

### Documentation

| Rule | Summary |
|------|---------|
| [phpdoc](.cursor/rules/documentation/phpdoc.mdc) | Portuguese PHPDoc blocks and `@see` requirements |
| [api-reference](.cursor/rules/documentation/api-reference.mdc) | Linking code to the official Bling API docs |

### Testing

| Rule | Summary |
|------|---------|
| [entity-unit-tests](.cursor/rules/testing/entity-unit-tests.mdc) | Colocated `*Test.spec.php` structure and assertions |
| [fixtures](.cursor/rules/testing/fixtures.mdc) | `__tests__/<operation>/*.json` mock data |
| [repository-test-doubles](.cursor/rules/testing/repository-test-doubles.mdc) | PHPUnit mock of `IBlingRepository` and `TestResponseTrait` |
