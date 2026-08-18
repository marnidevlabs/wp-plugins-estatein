# Estatein WordPress Theme

A custom, page-builder-free classic WordPress theme reproducing the supplied Estatein About Us designs. It provides responsive layouts, accessible navigation and client carousel controls, editable Team and Client content, dynamic menus, and safe output handling.

## Requirements

- WordPress 6.6+
- PHP 8.2+
- Composer 2
- Node.js 20+

## Installation

1. Run `composer install` and `npm install` from this directory.
2. Activate **Estatein** under Appearance → Themes.
3. Create a page with slug `about-us` or assign the **About Estatein** template.
4. Assign it as needed under Settings → Reading and configure menus under Appearance → Menus.

The page has polished fallback content so it renders immediately. Publishing `Team Member` or `Client` entries replaces the corresponding fallback cards. Use featured images for team portraits and the Estatein Details panel for role, contact links, year, website, domain, and category. Order cards with the Page Attributes order field.

## Development

```bash
composer install
npm install
npm run lint
npm run build
vendor/bin/phpcs
vendor/bin/phpstan analyse
composer audit
npm audit
```

CSS and JavaScript source files are deliberately dependency-free at runtime. Assets are loaded through WordPress with modification-time cache busting. The PHP architecture uses PSR-4 services for setup, assets, menus, content types, and secured metadata.

## Deployment

Run the quality commands, then deploy the `estatein` directory with its Composer autoloader. Production environments may omit development-only Node dependencies. Team and Client post types live in this assessment theme; move them to a companion plugin if content portability between themes is required.

