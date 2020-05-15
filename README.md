Requirements:

This project contains the app and has been built by using symfony 5 and Vue.js for managing the frontend.

Docker is required for executing the app. Please read the README.md at https://github.com/naikok/symfony-dockerized first for executing and being able to mount and run this app.

Testing:

For executing testing and cover this app we are using sqlite. 
For runing the tests, remember to access to the container from the symfony-dockerized folder:

Go to the symfony-dockerized folder and type:

sudo sh accesscontainer.sh 

You are in docker container, you can type: ./vendor/bin/phpunit tests
