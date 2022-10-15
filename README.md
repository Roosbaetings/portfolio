# Todaytomorrow WordPress Starter Theme

Hello, this is the latest (as of may 2022) WordPress Starter Theme from [Todaytomorrow](https://www.todaytomorrow.nl).

It features a minimalistic WordPress setup powered by [Timber & Twig](https://timber.github.io/docs/), [Laravel Mix](https://laravel-mix.com/), [Composer](https://getcomposer.org/) and [Typescript](https://www.typescriptlang.org/).

## The Tools

### Timber & Twig
Timber is the WordPress specific extension of the [Twig](https://twig.symfony.com/) template engine.

### Laravel Mix
Laravel Mix is a wrapper around [Webpack](https://webpack.js.org/) featuring some sane defaults that should be appropriate for 80% of users. It let's you compile typescript & scss, bundle js & css and create sourcemaps, versioning strings and helps with hotreloading.

### Composer
Composer a dependency manager for PHP, comparable to [NPM](https://npmjs.com) for JavaScript. We mostly use this to install WordPress plugins, which is easy for development and can also be very useful in deployments.

## Getting Started
To get started, clone this repository (even better to create a fork) and install all composer dependencies with `composer install`. This should help you get the necessary plugins, like Timber.
Then `cd` into the `themes/starter-theme` theme folder and install all node modules with `npm install`. This should install everything needed to get started with Laravel Mix.

To start developing with js & css run:
`npm run dev` -- this starts the `npx mix watch` command, starting the dev server and browserSync for watching file changes.

## Building & Deployment
To create a production build run: `npm run build:prod` -- this creates a production version.

All build files for js and css will be output into the `/dist` folder inside the theme. All source files live inside the `src/` folder.