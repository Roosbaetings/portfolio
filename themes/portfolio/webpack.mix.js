let mix = require('laravel-mix');
// your Wordpress theme name here
var themename = "starter-theme";

const resources = './src';
const outputDir = './dist';

mix.setPublicPath(outputDir);

mix.version();

mix.sass(`${resources}/styles/main.scss`, `${outputDir}/css`);
// mix.js(`${resources}/scripts/main.js`, `${outputDir}/js`);
mix.ts(`${resources}/scripts/main.ts`, `${outputDir}/js`);

mix.browserSync({
	proxy: "https://starter.local",
	files: [
			`./**/*.php`,
			`./**/*.twig`,
			`./src/**/*.js`,
			`./src/**/*.css`,
			`./src/**/*.scss`,
	]
});