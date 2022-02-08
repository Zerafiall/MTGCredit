# MTGCredit webapp

## Use 

This is just an webapp I wrote for a game shop that I go to. It insters and retrives data from a database to track users in store credit. 

## Installation

1. Docker, Docker-Compose

2. Set Up .env

Copy the .env-example to .env. Then add a database password to the new .env file 

`cp .env-example .env`

3. Inport Database Tables and Procedures

`docker exec -it mtgcredit-db bash`

`mysql mysql -u root -p`

`CREATE DATABASE mtgcredit;`

`mysql -u root -p mtgcredit < Docs/MTGCredit-Templates.sql `

4. Set up counter username and password

`docker exec -it mtgcredit-php bash /usr/local/bin/php /var/www/html/newuser.php [dbpassword] [newUserName] [newPaswword]`

## Backup Database

Run `docker exec mtgcredit-db bash backupDB.sh`
Ideally add that to scipt and run from cron


## Credit

Thanks goes to some youtubers for teaching and making this easy:
TruthSeekers for setting up docker containers:
    https://www.youtube.com/watch?v=ThpnqYpvnIM
Danni K for teaching enought PHP to build this: 
    https://www.youtube.com/watch?v=gCo6JqGMi30

 "Revoked cert that made it's way into git histoy (oops)
