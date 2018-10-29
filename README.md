# Bridge
Bridge, is an online evaluation platform that allows the candidate to be evaluated by multiple people. It is the unified software for two roles that are candidate and reviewer. It gives the candidate the power to get reviewed by different people and make their profile stronger. It allows the candidate to upload its profile on the portal and can view the ratings, suggestions and comments from the reviewers. So obviously, this system allows the reviewer to search, view, rate and comment on the candidates' profile. Also, this system stores locations of users based on IP address.

## Getting Started

This software requires Apache server, SQL and PHP v.5 or above

### Prerequisites

For installing all (Apache server, SQL and PHP) in one go, refer the below links<br/>

For Windows:
```  
  Install WAMP server from http://www.wampserver.com/en/
```
For ubuntu
  ```
   Follow steps for LAMP server from https://websiteforstudents.com/installing-apache2-mariadb-on-ubuntu-16-04-17-10-18-04-with-php-7-2-support-lamp/
  ```

### Installing

Clone or Download in zip the project and follow the below steps:
```
After Downloading

1) Create Database named as bridge in Mysql
2) Make changes in 'conn.php' file (update username and password of MySQL server and/or any other chages according to your system)
3) Update the value in the 'uploadFilePath' variable in 'login.php' file. (The uploaded resume by candidates will get stored in that location in server) 
4) Update Google API key for recaptcha API
```
## Author
   Akshay Kokane (akshaykokane.com)<br/>
   Email: contact@akshaykokane.com




