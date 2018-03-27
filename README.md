# Zemplate

-----

Zemplate is a bare-bones WordPress theme for fully custom, ground-up theme development.

Free of nearly all presentational elements and non-semantic markup, Zemplate is the perfect modern 'blank slate' for your WordPress projects.

We're light on SASS mixins and framework dependencies, and have some opinionated PHP functions and aggressively minimal markup patterns. Comment out, destroy, enhance (and collaborate) to your heart's content. Feedback and pull requests are welcome, and you're free to use this theme in whatever kind of project you like.

Zemplate was created for use at our digital agency. For more information about our client work, see the Zenman website: [https://www.zenman.com](https://www.zenman.com)

-----

## Building

We've included a [package.json](./package.json) file for compiling assets that is--unsurprisingly--fairly minimal. The build scripts are based on the excellent [npm-build-boilerplate by Damon Bauer](https://github.com/damonbauer/npm-build-boilerplate), which runs tasks without Grunt or Gulp or any additional configuration files.

It should be fairly easy to adapt this to your build tool of preference, or only slightly more complicated to opt-out of this entirely. But it works extremely well for us, so we'd be flattered if you gave it a shot.

Source files are in `src`, and everything that gets transformed/compiled ends up in `lib`. These root directories are defined as config variables in the package.json file, so you can override those folder names if you like `dist` better than `lib`, or more usefully, if you need to change them relative to where your package.json ends up living. In our setup, we'll move the package.json to the WordPress root and modify the config to point to the theme directory (e.g. `lib` -> `wp-content/themes/zemplate/lib`).

If you don't at all know what to do with a package.json file, it's relatively easy. First you'll need to install Node and NPM, which we'll leave up to you. Then, in a terminal of some kind, you'll need to `cd` to the directory where this package.json file lives. Run this to kick things off:

~~~~
npm install
~~~~

This will fetch all the packages required to make things work. When it's done, just for funsies, it will also automatically kick off the main `watch` script. Make an edit to a JS or CSS file and as soon as you save you should see some output in your terminal about what's happening while it attempts to compile whatever asset you've just saved.

That's it.

You can create, rename, delete, and edit files as much as you like and every change will be picked up and handled appropriately without stopping and starting the `watch` task. Truly, we live in a wonderful time.

When you eventually stop working to do something else, coming back and kicking things off is just as easy:

~~~~
npm run watch
~~~~

That command will kick off all the build processes and will keep running in the background while you work, doing whatever needs doing. `watch` is a friendly catch-all that will run every task at once, but if you want to manually run any specific build process you can do `npm run build:css` (or any of the keys in the package.json file under "scripts") and it will execute just that one thing on demand.

Everything works well for us on both OSX and Linux development machines. Windows users, we haven't excluded you on purpose, but we're unable to test for you and definitely expect there to be some incompatibilities. If you know of a package that mitigates any of these issues that we should use instead of native bash, open an issue and we'll look into including it. If you know of a way to rewrite a script command such that it will work more cross-platform *without* any extra dependencies, open an issue to tell us (or send a pull-request) and we'll try to merge it in right away.

#### BrowserSync

This will almost certainly not immediately work for you. We don't know anything about your development environment, but it works really well for us when we substitute `--server` with `--proxy 'http://your-local-wp-site-url.whatever'` in the ["serve" script definition](./package.json#L16). Godspeed.

#### CSS

We're using [SASS](https://sass-lang.com/guide) as a base, even though we're running it through PostCSS after compiling. We're a little bit in love with the power and extensibility of PostCSS, but the syntax is just different enough to jam up newcomers and there's value in being able to drop in the mixins you're used to.

The folder structure gets more general as you progress from top to bottom alphabetically. Keep in mind that files within the folders aren't compiled in any specifically-controllable order by default, so `base` is meant to be pretty lean. Any dependencies will be sorted out by being included in later folders. See [style.scss](./src/css/style.scss) for the intended use of the folders, or to manually define any explicit orders you end up requiring.

#### JS

Any folders you create in the `src/js` directory will have their contents minified and concatenated into a file named after the folder. For instance:

a folder of `src/js/sliders/` that contained `flickity.js`, `slider-foo.js`, and `slider-bar.js` will become `lib/js/sliders.min.js` after the scripts process runs.

UglifyJS doesn't like ES6, so will throw an error if you're writing advanced enough JS. But if you're doing that on purpose, you're probably well aware of this and able to handle it on your own. `uglify-es` is an option, but we're not jumping to that because the error is helpful for keeping us mindful of potential compatibility issues without having to set up a pipeline to transpile everything.

#### Images

Any compressible images in the `assets` folder will get compressed and put in `lib`. Smaller image files are the best. Since the compiled CSS ends up right in the root of `lib`, you can reference files in CSS with a simple `url(assets/whatever.png)`

#### SVGs

SVGs in the `assets` folder will be compressed and passed along to the `lib` folder like other images.

SVG icons are intentionally *not* compiled to sprites. SVG sprites are extremely powerful and useful, but since this is WordPress we can just inline the SVG's contents into the templates directly: `echo zen_svg_icon('envelope')` will attempt to dump the contents of `lib\assets\envelope.svg` right into the HTML for your CSS-manipulating pleasure.

-----

## Known Issues

* [BrowserSync gets triggered twice](../../issues/10) on style changes because the file it's watching is transformed two times (sass compilation, then postcss processing). This isn't excellent, but also hasn't seemed noticeable in terms of real-world performance....

* All images get re-compressed whenever any single image changes in the assets folder. We tried to [make the changes more atomic](../../issues/7) but this introduced more issues than it solved.

* [Nested folders](../../issues/8) inside `src/assets` don't get passed along to `lib`. This is by design, but isn't maybe the best thing. Our thought is that the contents will be manageable enough in a flat structure, but globbing could be added to the scripts fairly easily if it becomes necessary.

* Non-image files placed in `src/assets` (e.g a font) will get copied over (unharmed) to `lib` which makes linking to the file simple and consistent. But now we're duplicating assets without even a pretense of transforming them, and that's not great. The compiled assets in `lib` (whether actually compiled or just passed along) are .gitignored, so they won't clog up your repo, but they will still exist on disk in a not-maximally-efficient form.

## TODO

We put these in [Issues](../../issues?q=is%3Aissue+is%3Aopen+label%3Atodo) like good GitHub citizens.

-----

## Changelog

Version

v4.0.0 :: 2018 (WP 4.9.4)
- Near-total rewrite

-----

🧘 Zenman Devs
