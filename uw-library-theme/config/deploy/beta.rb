set :stage, :beta

set :sp_name, "cms-test"
set :wp_folder, "/#{fetch(:sp_name)}/data/sites/#{fetch(:sp_name)}/wordpress"
set :deploy_to, "#{fetch(:wp_folder)}/wp-content/themes/deploy/library-wp-theme"
# Define folder where project LWS Assets is checked out
set :assets_folder, "#{fetch(:wp_folder)}/assets"
# Define folder where project Legacy Assets is checked out
set :legacy_assets_folder, "#{fetch(:wp_folder)}/legacy-assets"
# Define folder where project LWS Launch Data is checked out
set :launch_data_folder, "#{fetch(:wp_folder)}/launch-data"
# Define folder where project LWS Primo Includes is checked out
set :primo_data_folder, "#{fetch(:wp_folder)}/includes-primo"

server 'libt0005.library.wisc.edu', user: 'cmstsu', roles: %w{web}
