# Lloydkwartier webpage

The web page for the school project at the Lloydkwartier

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Install guide
(There will be a fork of the php7-vagrant repo in te future for convenience)

Open https://github.com/antwanvdm/php7-vagrant and follow the install guide there up untill the fifth step and come back.

Now run the following commands:

```
# Clone the repositories (after navigating to your dev folder)
git clone https://github.com/antwanvdm/php7-vagrant.git
git clone https://github.com/koen-benne/Lloydkwartier-webpage.git
...
# Remove unnecessary files
cd Lloydkwartier-webpage
rm -rf .git LICENSE public .gitignore README.md
cd ..
...
# Move files from php7-vagrant to Lloydkwartier-webpage
mv ~/php7-vagrant/* ~/Lloydkwartier-webpage/
...
# Create the .vagrantuser file (and check them afterwards.)
# BEWARE: Currently needs a manual path fix on Windows!!
./Lloydkwartier-webpage/_scripts/create_vagrantuser_file.sh
...
# Run initialize.sh
./Lloydkwartier-webpage/initialize.sh
...
# Up the project (enter password in process for changing hosts file)
vagrant up
```
