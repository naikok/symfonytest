Requirements:

This project contains the app and has been built by using symfony 5.

Docker is required for executing the app. Please read the doc at https://github.com/naikok/symfony-dockerized/edit/master/README.md first for executing and being able to mount and run this app.

Testing:

For executing testing and cover this app we are using sqlite. 
For runing the tests, remember to access to the container from the symfony-dockerized folder by sudo sh accesscontainer.sh and once you are in docker container, you can type: ./vendor/bin/phpunit tests
