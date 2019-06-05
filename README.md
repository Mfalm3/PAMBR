# [PAMBR] PHP Android Messages Backup Reader

## What is it
This is a php custom project app that reads android backup messages.

### What is working
At the moment, it is only focussed on xml files from SMS Backup & Restore (com.riteshsahu.smsbackuprestore)

#### Additional info
A redo of an [old project (abandoned)](https://github.com/Mfalm3/PHP-SMSReader) with composer, namespacing and autoloading for the backend and npm, webpack for front-end assets compilation


### How to use?
Requirements

1. Git
2. Composer
3. Node & NPM

1. Clone the repo
 - `$ git clone https://github.com/Mfalm3/PAMBR.git`

2. Install the dependancies
 - `$ composer install`
 - `$ npm install`

3. Open the terminal, cd to PAMBR directory and change the server script to be executable
 - `$ cd /path/to/PAMBBR && chmod +x ./server.sh`

 4. Run the server script
  - `$ ./server.sh`