# school-management-system
## About
This is a school managemnet system(SMS) that can be used to manage secondary schools. This has been coded to work as a desktop application without connecting to the internet. It was coded with PHP mostly as part of my projects to build up my portfolios
in PHP language. The project is for admins only but i intend on adding logins for other users in future. The admin has exclusive rights of the entire application.The admin can;
1.  CRUD on students, teachers, staff, hostels, roles.
    * Adding a new student, staff member, hostel, role
    * Manage/edit an existing student, staff member, hostel and roles
    * Delete existing student, staff and roles
2.  Set/Change user settings
    * Change the school name
    * Change user login details
    * Change school details like phone number, email, mision and vision
    * Update the admin photo

**Credential** | **Value**
------------ | -------------
**Username** | Administrator
**Password** | Alpha

## Technologies used in this project;
* `PHP` - I used the PHP language as the main language for this project together with javascript for the frontend and the backend due to the ease in their operability. No frameworks were used for PHP but for javascript, i used jquery for ajax requests being sent to database and getting back the response to populate the DOM
* `javascript/jquery/ajax` - This was used for making the application more dynamic, for things like button clicks. Jquery was used for dom selection while ajax was used for sending requests to database and getting response without page refresh. All scripts are in the subfolder, admin/scripts. These have also been used to create the side navigation bar for the project.
* `PHP desktop` - PHP Desktop is an open source project founded by Czarek Tomczak in 2012 to provide a way for developing native desktop GUI applications using web technologies such as PHP, HTML5, JavaScript and SQLite. For the download, check this link 
  <a href='https://github.com/cztomczak/phpdesktop' target='_blank'>here</a> under the downloads heading.
* `Inno setup compiler` - Inno Setup is a free script-driven installation system software for creating Windows app installer. I used this after project completion to compile the whole project and create the .exe file which can then be used as an installation file in another users computer. The download can be found <a href='https://jrsoftware.org/isdl.php' target='_blank'>here.</a>
*  `DB Browser(SQLite)` - I used this as a database to hold the data. I chose this since it is a serverless database and portable, so it can be carried alongside the application without having to install XAMMP or other servers.
*  `SQL` - This, i used to query the database and create a seamless connection between the application frontend and the backend.
*  `CSS` - For the frontend, i used bootstrap offline for dynamics of the application. For icons, i used the fontawesome icons which i downloaded and used locally. The css sheet for bootstrap is the <a href = 'admin/styles/bootstrap.min.css'>bootstrap.min.css</a>. For fontawesome, i used the <a href="admin/styles/CSS/all.css">all.css</a>  style sheet and the <a href='/admin/styles/webfonts'>webfonts folder</a>. My custom CSS is in <a href='admin/styles/styles.css'>this file</a>.

### Folder structure
* `Admin` - This is the main folder and contains all the project files. Each folder is a section of the application; more like a module. The folder called shared, contains common files used by all modules.The config.php file is the backend file that starts the session in each module. 
* `settings.json` - The settings.json file contains the phpdesktop configurations to be used by the application. The setings have been changed and are different from the original settings.json file.

### Installation procedure
This project was meant to be utilised as a desktop application running without servers. Too install, the project, you can run inno setup to generate the setup.exe file.Then run the setup file as an administrator on your PC. To use the application on the internet, install a server of choice, then open the application.
>  Installation using XAMMP - Using XAMPP as a server, copy the entire project inside the htdocs folder and launch it on a browser. For more info, contact me via email.
