# config valid only for Capistrano 3.1
lock '3.1.0'

set :application, 'library-wp-theme'
set :repo_url, 'git@bitbucket.org:uw-madison-library/library-wp-theme.git'

# Ask which branch to deploy
ask :branch, proc { `git rev-parse --abbrev-ref HEAD`.chomp }

set :linked_dirs, %w{assets}

set :keep_releases, 3

namespace :deploy do

  # This is the "current" symlink, but named properly for wordpress
  desc "Publish theme to wordpress folder"
  task :publish_theme do
    on roles(:web) do
      execute :rm, "-rf", "#{fetch(:wp_folder)}/wp-content/themes/#{fetch(:application)}"
      execute :ln, "-sf", release_path, "#{fetch(:wp_folder)}/wp-content/themes/#{fetch(:application)}"
    end
  end

  desc "Make sure latest bundle is installed"
  task :bundle do
    on roles(:web) do
      execute "cd #{release_path} && bundle install --quiet --without=development"
    end
  end

  desc "Build up theme assets on the server"
  task :build_assets do
    on roles(:web) do
      execute "cd #{release_path} && ./build.rb prod"
    end
  end

  desc "Update assets in wordpress folder"
  task :update_assets do
    on roles(:web) do
      execute "cd #{fetch(:assets_folder)} && git pull -q"
    end
  end

  desc "Update legacy assets in wordpress folder"
  task :update_legacy_assets do
    on roles(:web) do
      execute "cd #{fetch(:legacy_assets_folder)} && git pull -q"
    end
  end

  desc "Update Launch links in wordpress folder"
  task :update_launch_data do
    on roles(:web) do
      execute "cd #{fetch(:launch_data_folder)} && git pull -q"
    end
  end

  desc "Update primo includes in wordpress folder"
  task :update_primo_data do
    on roles(:web) do
      execute "cd #{fetch(:launch_data_folder)} && git pull -q"
    end
  end

  # This is required for a number of third party vendors. See Sue or Curran w/ questions.
  desc "Link legacy find-it image to root"
  task :link_legacy_findit do
    on roles(:web) do
      execute :rm, "-rf", "#{fetch(:wp_folder)}/F.gif"
      execute :ln, "-sf", "#{fetch(:legacy_assets_folder)}/images/findit.gif", "#{fetch(:wp_folder)}/F.gif"
    end
  end

  desc "Clear opcode cache"
  task :clear_opcode_cache do
    if fetch(:stage) == :production
      run_locally do
        execute :sleep, "3"
        execute :curl, "-s", "-H", "'Host: www.library.wisc.edu'", "http://128.104.46.217/clear.php"
        execute :curl, "-s", "-H", "'Host: www.library.wisc.edu'", "http://128.104.46.169/clear.php"
        execute :curl, "-s", "-H", "'Host: www.library.wisc.edu'", "http://128.104.46.168/clear.php"
      end
    end
  end

  desc "Clear cache"
  task :clear_cache do
    if fetch(:stage) == :staging
      run_locally do
        execute :curl, "-s", "-X", "BAN", "http://www-qa.library.wisc.edu/"
      end
    end
    if fetch(:stage) == :production
      run_locally do
        execute :curl, "-s", "-X", "BAN", "http://www.library.wisc.edu/"
      end
    end
  end

  # Exact same as clear cache, but sometimes we have to trigger this
  # after restarting PHP, and capistrano will not run a task more than once.
  desc "Clear cache two"
  task :clear_cache_two do
    if fetch(:stage) == :staging
      run_locally do
        execute :curl, "-s", "-X", "BAN", "http://www-qa.library.wisc.edu/"
      end
    end
    if fetch(:stage) == :production
      run_locally do
        execute :curl, "-s", "-X", "BAN", "http://www.library.wisc.edu/"
      end
    end
  end

  # This will automatically clear the cache as well.
  # and should be called if the header or footer is ever updated.
  desc "Restart php-fpm"
  task :restart_php do
    # Not using native capistrano tasks, because we don't have the read-only servers setup in capistrano
    if fetch(:stage) == :staging
      run_locally do
        execute :ssh, "cmsqsu@libq0005.library.wisc.edu", "'/cms-qa/cmsctl php stop ; /cms-qa/cmsctl php start'"
        execute :ssh, "cmsqsu@libq0028.library.wisc.edu", "'/cms-qa/cmsctl php stop ; /cms-qa/cmsctl php start'"
        execute :ssh, "cmsqsu@libq0029.library.wisc.edu", "'/cms-qa/cmsctl php stop ; /cms-qa/cmsctl php start'"
        execute :sleep, "10"
      end
    end
    if fetch(:stage) == :production
      run_locally do
        execute :ssh, "cmspsu@libp0005.library.wisc.edu", "'/cms-prod/cmsctl php stop ; /cms-prod/cmsctl php start'"
        execute :ssh, "cmspsu@libp0028.library.wisc.edu", "'/cms-prod/cmsctl php stop ; /cms-prod/cmsctl php start'"
        execute :ssh, "cmspsu@libp0029.library.wisc.edu", "'/cms-prod/cmsctl php stop ; /cms-prod/cmsctl php start'"
        execute :sleep, "10"
      end
    end
  end

  # call this to delay the cache clear.
  desc "Clear cache with delay"
  task :clear_cache_delay do
    if fetch(:stage) == :staging
      run_locally do
        execute :sleep, "20"
      end
    end
    if fetch(:stage) == :production
      run_locally do
        execute :sleep, "20"
      end
    end
  end

  # Issues a wget for the entire index from each host
  # this only works on os x due to md5 command.
  desc "Verify Checksum content of index page, restart php if different"
  task :verify_checksums do
    checksums = ["disabled for dev and test"]

    if fetch(:stage) == :staging
      cms_qa = `curl -s -H 'Host: www-qa.library.wisc.edu' http://128.104.46.218/ | md5`
      cms1_qa = `curl -s -H 'Host: www-qa.library.wisc.edu' http://128.104.46.171/ | md5`
      cms2_qa = `curl -s -H 'Host: www-qa.library.wisc.edu' http://128.104.46.170/ | md5`
      cache = `curl -s -H 'Host: www-qa.library.wisc.edu' http://128.104.46.99/ | md5`
      balancer = `curl -s http://www-qa.library.wisc.edu/ | md5`
      checksums = [cms_qa, cms1_qa, cms2_qa, cache, balancer]
    end

    if fetch(:stage) == :production
      cms_prod = `curl -s -H 'Host: www.library.wisc.edu' http://128.104.46.217/ | md5`
      cms1_prod = `curl -s -H 'Host: www.library.wisc.edu' http://128.104.46.169/ | md5`
      cms2_prod = `curl -s -H 'Host: www.library.wisc.edu' http://128.104.46.168/ | md5`
      cache = `curl -s -H 'Host: www.library.wisc.edu' http://128.104.46.38/ | md5`
      balancer = `curl -s http://www.library.wisc.edu/ | md5`
      checksums = [cms_prod, cms1_prod, cms2_prod, cache, balancer]
    end

    if checksums.uniq.size == 1
      puts "Content valid on all servers"
    else
      puts "Warning, content is not the same on all servers"
      invoke 'deploy:restart_php'
    end  
  end


  before :build_assets, :bundle
  after :updated, :build_assets
  after :published, :publish_theme
  after :finishing, :update_assets
  after :finishing, :update_legacy_assets
  after :finishing, :update_launch_data
  after :finishing, :update_primo_data
  after :update_legacy_assets, :link_legacy_findit

  # Clear everything on each deploy.
  after :finished, :clear_cache_delay
  
  # This may land us in an infinite loop, but it looks like capistrano only fires tasks once.
  # Clear opcode cache, delay, clear varnish cache, verify content, restart php if invalid & clear cache again.
  
  # For some reason clearing the opcode cache doesn't always work. As a work-around we're restarting php
  # which is a bad idea... We're checking the checksum content to hopefully minimze the amount of times we
  # have to restart. Sometime, in the future, we should figure out how to fix the opcode cache clearing.
  # perhaps it will be fixed in a newer version of PHP.
  before :clear_cache_delay, :clear_opcode_cache
  after :clear_cache_delay, :clear_cache
  after :clear_cache, :verify_checksums
  
  # Clear the cache after we restart php
  after :restart_php, :clear_cache_two
end
