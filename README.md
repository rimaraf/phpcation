# PHPcation - a user authentication system

Hello and welcome to my little user authentication project, that I have named PHPcation. PHPcation began as a part of a bigger project I build for a web technology course, where I needed a user authentication system that keept my web application hidden from unauthorized visitors. It was fun doing, and I thought that I might as well carve that "hide my web page from non-registered visitors" part out as a stand-alone system, that I've shared here.

At this time, the system still needs some work and polish (don't let the "UI" hurt your eyes). But the fundamentals like user creation, login and logout works. Next up is functionality like: 

- Reset of user passwords by mail (the database needs to be expanded with tokens for this).
- Ability for the user to request an automated removal of an account and the associated data. 
- Auto redirect of successfully created users to the protected landing page. 
- General security hardening.
- Mobile support.
- Love for the UI.
- And probably more to come...

### Important files

##### config.php
In here is the needed database informations, that you have to change to fit your environment.

##### authenticate.php
Require this file in any web-faced file that you want to keep "hidden" unless the user is authenticated.
