## Setup
- Install Wampserver as described here: `https://blog.templatetoaster.com/how-to-install-wamp/`
- Starting the server: Choose the Wamp icon from the taskbar and select `Start All Services`
- Install Visual Studio Code as the IDE of choice.

## Deployment
- The project cannot be run directly in the browser because it is a PHP project and PHP files need to be compiled on the server-side. This means that the project has to be deployed (copied) on Wampserver.
In order to deploy the project on Wampserver you need to do the following:
- Copy the root application folder (taskboard) with all the associated files under www folder of Wampserver.
- www folder can be found in the wamp64 installation folder
    - C:\wamp64\www\taskboard
- The Wampserver can be restared, but its not always neccessary.
- Open a web browser and go to http://localhost/taskboard. This will run the project, compile PHP and open the front-end side of it in the browser.