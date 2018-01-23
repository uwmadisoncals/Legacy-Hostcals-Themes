# Library WP Theme

WordPress theme for the Library

## Development

Start up a terminal process to auto-compile scss and js files for development

	./build.rb monitor

## Deploying

Deployed using [Capistrano](http://capistranorb.com/).

	cap staging deploy

where staging is your environment. Valid environments are

* alpha  (lcb dev)
* beta   (lcb test)
* staging  (lcb qa)
* production  (lcb prod)

Deployment will checkout the specified version from git, compile the css and js files, and
update shared assets and legacy assets on the server.

Deploying to QA and Production will also clear all the existing cache. This feature may be
removed in the future as it's only needed if we update markup (js and css changes use cache
busting.) It is not good to clear the cache frequently since markup changes will be in-frequent.

Given current active development, it makes sense to clear the cache on each deploy.

### Manual Deploy

If you'd like to deploy the theme without using capistrano this is possible using the
`build.rb` script. Run the script with either "dev" or "prod" as an argument to generate
the appropriate style of files. Only use "dev" if you're going to deploy files to a development
server - For local development you should always use `monitor` as described above.

After the build script has completed running you can then copy the entire folder over to your
wordpress theme directory to be served up.

The `build.rb prod` option will modify the header.php file. These changes should *never* be committed
back, and should only happen on the copy of the file in place on the server.

### Under the hood

Because wordpress requires a specific directory structure we deploy to a "deploy" folder, and
symlink the theme into the standard wordpress "themes" folder.


## Assets

CSS and JS assets are minimized and fingerprinted to allow for cache busting. This happens in the `build.rb` 
script when running in production mode. This script is automatically called upon a capistrano deploy 
to any environment.

When running `build.rb` with `dev` or `monitor` options, files will not be minimized or fingerprinted.

### CSS

The primary, and only, scss files that get compiled to css begin without an underscore. They import other supporting
files (starting with an underscore) as needed. Follow what is defined by [scss syntax](http://sass-lang.com/guide).

The primary `css/site.scss` file should only contain variable definitions, comments, and imports of scss templates.

The default wordpress `style.css` in the document root should never be used, however it must exist as it contains theme metadata. It is not referenced for style information anywhere.

### Images

General images, that can be reused, should be checked into the [LWS Assets project](https://bitbucket.org/uw-madison-library/lws-assets)

Images specific to the this theme, and only this theme, should live in the images folder.

Images are not fingerprinted, and are heavily cached. If you update the contents of an image the Varnish cache
must be cleared, and then all the browsers must clear their cache.

### Javascript

Javascript files are compiled, minimized, and fingerprinted. The list of files that gets compiled is stored
in the `build.rb` script. Update this list to include new javascript files. All files end up getting compiled
into `js/site.js`.

Since the `site.js` file is constantly over-written, it should never be used.

## Requirements

### Workstation

Your machine must have a valid ruby 2.0+ environment with bundler. Install all required
components with

	bundle install

### Server

A valid ruby 2.0+ environment is required. Bundler must also be installed on the server

	gem install bundler

The deploy will take care of installing the proper gems needed for compiling assets on the server.

## Caching

Certain URLs are cached, and will need to be cleared when things are updated, or cleared on a regular basis.

 * Search Results
 * Hours
 * Locations 
 * All-Staff & Departments

Searching the directory, and subject librarian search are not cached as they are JS API calls from the client.

### Search Results

Are only cached for a short amount of time via an s-maxage header returned from the theme.

### Hours

The summary hours page is cleared nightly at midnight via wp-tender
	
	/libraries/hours/

We still have yet to determine how we're going to handle hours for specific days.

TODO

### Locations

Cleared via the api, whenever a location is updated.

	/libraries/campus-libraries/


### All-staff & Departments

Cleared via the api, whenever a person or department is updated.

	/about/directory/library-departments/
	/about/directory/all-staff/
	recursively: /about/directory/staff/

TODO: Still need API hook for departments.
	