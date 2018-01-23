#!/usr/bin/env ruby
#
# Build up assets for deployment or development.
#
# David Lee - April 2014
#

require 'digest/md5'
require 'fileutils'
require 'uglifier'

# A list of javascript files that will be joined and minimized.
# all of these files will be included in "js/site.js"
def javascript_compile_list
	[	
		# Wordpress distributed JS (not monitored for changes...)
		#"../../../wp-includes/js/jquery/jquery-migrate.min.js",
		#"../../../wp-includes/js/jquery/jquery.masonry.min.js",

		# Theme JS
		"js/jquery-1.11.0.js",
		"js/jquery-ui-1.10.4.datepicker.js",
		"js/jquery.cookie.js",
		"js/functions.js",
		"js/imagelightbox.js",
		"js/lightboxinit.js",
		"js/jflickrfeed.js",
		"js/flickrsetup.js",
		"js/vender.js", 
		"js/scrollTo.js",
		"js/placeholder.js",
		"js/default.js",
		"js/campus-libraries.js",
		"js/find-a-library.js",
		"js/datepicker.js",
		"js/library.js",
		"js/directory.js",
		"js/liaison.js",
		"js/locations.js",
		"js/ask.js",
		"js/alerts.js",
		"js/google-support.js",
		"js/locate.js"
	]
end

# Generate checksum of file, copy to new file in assets, replace name in header.php
def fingerprint_header_file(file)
	sum = Digest::MD5.hexdigest(File.read(file))
	ext = File.extname(file)
	new_file = ["assets", [File.basename(file, ext), "-#{sum}", ext].join].join("/")

	# Copy to a new fingerprinted file
	FileUtils.cp file, new_file

	# Replace reference to file with our new filename
	`sed -i.tmp -e "s|#{file}|#{new_file}|" header.php`

	# Remove our temporary file
	FileUtils.rm "header.php.tmp", :force => true

	puts "Fingerprinted #{new_file} and updated header.php"
end

def fingerprint_footer_file(file)
	sum = Digest::MD5.hexdigest(File.read(file))
	ext = File.extname(file)
	new_file = ["assets", [File.basename(file, ext), "-#{sum}", ext].join].join("/")

	# Copy to a new fingerprinted file
	FileUtils.cp file, new_file

	# Replace reference to file with our new filename
	`sed -i.tmp -e "s|#{file}|#{new_file}|" footer.php`

	# Remove our temporary file
	FileUtils.rm "footer.php.tmp", :force => true

	puts "Fingerprinted #{new_file} and updated footer.php"
end


# Return all javascript files returned from javascript_compile_list as a single string
def concat_js_files
	javascript_compile_list.map { |f| File.read(f) }.join
end

# compile all javascript files and write out to file
def compile_js_files(file, prod=true)
	# use development style options for now, even in production
	if prod
		options = {:output => {:comments => :none }}
		File.open(file, "w") { |f| f.write(Uglifier.compile(concat_js_files, options)) }
	else
		#options = {:output => {:comments => :all, :beautify => true, :preserve_line => true}}
		File.open(file, "w") { |f| f.write(concat_js_files) }
	end

	puts "      \e[32mwrite #{file}\e[0m"
end

def dev_compile_scss
	# compile scss files, in a developer friendly way
  system "scss --line-numbers --style nested --force --update css"
end

###################################################

if ARGV[0]
	if ARGV[0] == "prod"
		# Compile and minimize assets, fingerprint and update header.php with new versions
		# this should only be run on the server!
		puts "Running for production"

		# Compile scss files
		system "scss --update css --force --style compressed"

		# Fingerprint scss files
		fingerprint_header_file("css/site.css")

		# Compile js files
		compile_js_files("js/site.js")
		
		# Fingerprint js files
		fingerprint_footer_file("js/site.js")
	end

	if ARGV[0] == "dev"
		# Compile assets, but don't fingerprint!
		puts "Running for development"
		dev_compile_scss
		compile_js_files("js/site.js", false)
	end

	if ARGV[0] == "monitor"
		require 'listen'
		puts "Updating files"
		dev_compile_scss
		compile_js_files("js/site.js", false)
		
		puts "Monitoring changes. Ctrl-C to exit."
		# listen to any changes in css/js folders (even if not part of compiled assets)
		# and fire a re-build event when anything changes. This isn't ideal, but keeps it simple.
		listener = Listen.to('css', 'js', only: /\.scss$|\.js$/, ignore: /site.*\.js/) do |modified, added, removed|
			if [modified, added, removed].join.include? "scss"
				puts "Change detected in scss, recompiling"
				dev_compile_scss
			else
				puts "Change detected in javascript, recompiling"
				compile_js_files("js/site.js", false)
			end
		end
		listener.start # not blocking

		begin
			sleep
		rescue Interrupt
			puts "Exiting"
			listener.stop
		end
	end

else
	puts "Build Usage:"
	puts "You must supply either \"monitor\", \"prod\" or \"dev\" as an option."
	puts ""
	puts "Example:  ./build.sh monitor"
	puts ""
	puts "See README.md for more information"
end
