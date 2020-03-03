# Lloydkwartier webpage

The web page for the school project at the Lloydkwartier

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Install guide
(There will be a fork of the [php7-vagrant](https://github.com/koen-benne/Lloydkwartier-webpage) repo in te future for convenience)

* Install [Virtualbox](https://www.virtualbox.org/wiki/Downloads) (needed to provide a 
virtual machine)
* Install [Vagrant](https://www.vagrantup.com/) (easy base for development environments)
* For Windows users, install [Git](https://git-scm.com/download/win)
* Install 2 plugins for vagrant, **nugrant** for .vagrantuser support & **hostmanager** to 
support a nice development URL instead of your IP (for Windows you can use 'Git bash')

    ```
    vagrant plugin install vagrant-hostmanager
    vagrant plugin install nugrant
    ```


Now run the following commands in the folder where you want the project to go using either git bash (windows) or terminal (mac/linux):
(The folder should not contain a folder called Lloydkwartier-webpage)

    ```
    # Clone this repository
    git clone https://github.com/koen-benne/Lloydkwartier-webpage.git
    ...
    # Navigate to folder
    cd Lloydkwartier-webpage
    ...
    # Clone php7-vagrant repository
    git clone https://github.com/antwanvdm/php7-vagrant.git
    ...
    # Move files from php7-vagrant to Lloydkwartier-webpage
    mv ./php7-vagrant/_scripts ./php7-vagrant/Vagrantfile ./
    ...
    # Remove php7-vagrant
    rm -r /php7-vagrant
    ...
    # Create the .vagrantuser file (and check them afterwards.)
    # BEWARE: Currently needs a manual path fix on Windows!!
    ./_scripts/create_vagrantuser_file.sh
    ...
    # Run initialize.sh
    ./initialize.sh
    ...
    # Up the project (enter password in process for changing hosts file)
    vagrant up
    ```
