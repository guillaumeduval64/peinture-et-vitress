set :application, "yourpostship"
set :domain,      "#{application}.com"
set :deploy_to,   "/var/www/#{domain}"
set :app_path,    "app"

set :repository,  "#{domain}:/guillaumeduval64/#{application}.git"
set :scm,         :git
# Or: `accurev`, `bzr`, `cvs`, `darcs`, `subversion`, `mercurial`, `perforce`, or `none`

set :model_manager, "doctrine"
# Or: `propel`

role :web,        domain                         # Your HTTP server, Apache/etc
role :app,        domain, :primary => true       # This may be the same as your `Web` server

set  :keep_releases,  3

# Be more verbose by uncommenting the following line
# logger.level = Logger::MAX_LEVEL





set :serverName,   "sg111.servergrove.com" # The server's hostname
set :repository,   "file:///path/to/your/local/project/repo"

set :domain,      "yourpostship.com"
set :deploy_to,   "/var/www/vhosts/yourpostship.com/symfony_projects/" # Remote location where the project will be stored
ssh_options[:port] = "22123"

set :scm,         :git
set :deploy_via,  :rsync_with_remote_cache
set :user,        "yourpost"

# Roles
role :web,        domain
role :app,        domain
role :db,         domain, :primary => true

set  :keep_releases,  3 # The number of releases which will remain on the server
set  :use_sudo,       false

# Update vendors during the deploy
set :update_vendors, true

# Set some paths to be shared between versions
set :shared_files,    ["app/config/parameters.ini"]
set :shared_children, [app_path + "/logs", web_path + "/uploads", "vendor"]