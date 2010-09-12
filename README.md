Installation
============

1. Add this plugin to your project as Git submodules:

          $ git submodule add git://github.com/dator/sfHttpAuthPlugin.git plugins/sfHttpAuthPlugin


  2. Add this plugin to your ProjectConfiguration file:

          // config/ProjectConfiguration.class.php
          public function setup()
          {
              $this->enablePlugins(array(
                  // ...
                  'sfHttpAuthPlugin',
                  // ...
              ));
          }
          
  3. edit your app.yml file

          // apps/frontend/config/app.yml
          all:
            auth:
              realm:      Password Required # The message
              username:   LOGIN # The password
              password:   PASSWD # The password

