# WPKirk-Options-Boilerplate

Focused demo of the **options layer** in WP Bones — a single serialized WordPress option that
maps to a nested PHP array defined in `config/options.php`. The framework exposes `$plugin->options`
as a live accessor (read/write), migrates new option keys across versions, and shows three
patterns (classic controller, resource controller, view-only controller) for managing them.

## What this demos

- `config/options.php` — declarative options shape (`General`, nested arrays, defaults).
- `config/plugin.php` — `options.version` key drives the upgrade routine when the shape changes.
- Three controller patterns in `plugin/Http/Controllers/Options/`:
  - `OptionController` — classic form handler
  - `OptionResourceController` — resource-style REST-like semantics
  - `OptionViewController` — read-only rendering

**Key files to read first:**

| File | What to look at |
| --- | --- |
| `config/options.php` | Declarative shape (`General`, nested keys, defaults) + `version` string |
| `plugin/Http/Controllers/Options/OptionController.php` | Read/write via `$plugin->options` |
| `plugin/Http/Controllers/Options/OptionResourceController.php` | Resource-style update semantics |
| `plugin/activation.php` | Where options get seeded on first activation |

## Smoke test (manual, ~30s)

With the plugin active:

1. Open **WP Kirk → Options** in admin — the options form renders with the current values.
2. Change a value, submit — the page re-renders with the updated value; the DB row
   `wp_kirk_options_boilerplate_slug` (or whatever your plugin slug resolves to) reflects the
   change.
3. `wp option delete wp_kirk_options_boilerplate_slug` — then reload the admin page. The
   options re-seed from `config/options.php` on the next `$plugin->options` access (seeding
   is lazy — first read creates the DB row).
4. `wp-content/debug.log` stays clean throughout.

## Use as a template

```sh
# 1. clone from the GitHub template
gh repo create my-options-plugin --template wpbones/WPKirk-Options-Boilerplate --public --clone
cd my-options-plugin

# 2. rename the PHP namespace + plugin slug
composer install
php bones rename "My Options Plugin"

# 3. build + activate
yarn install && yarn build
wp plugin activate my-options-plugin
```

Edit `config/options.php` for your own settings shape. Read/write via `$plugin->options->get('General.option_1')`
and `$plugin->options->set(...)` — everything serializes to a single WP option row, so there's
no O(n) DB trip per key.

## Framework surface exercised

This boilerplate is the **regression bed** for the options layer:

- `WPKirk\WPBones\Database\WordPressOption` (the live accessor behind `$plugin->options`)
- Lazy options seeding: first `$plugin->options->get(...)` reads `config/options.php` and
  persists the defaults to the `wp_options` row if it doesn't exist yet
- Version-based options migration triggered on plugin upgrade
- Nested array access with dot notation
