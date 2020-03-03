# Lloydkwartier webpage

The web page for the school project at the Lloydkwartier

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Install guide
(There will be a fork of the php7-vagrant repo in te future for convenience)

Open https://github.com/antwanvdm/php7-vagrant and follow the install guide there up untill the fifth step and come back.

Now run the following commands in the folder where you want the project to go:
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
