## PHP and webserver
1. PHP Version: 8.1
2. Webserver: I used apache.
## Setting up
Please run `composer update` command in project root folder to download the dependencies and setting up the project. Needless to say that composer must be installed on your local machine.
## DB
1. No database system is used
## Starting The Project
1. In project folder please run `php artisan serve` to run the application. If port 8000 is occupied please change the port number with --port parameter to the command (and for provided api link). <br />
I used <span style="color: green">PostMan</span> to call the api links.
2. http://localhost:8000/api is the link to use. Please remember since this app is using online api's; you system should be online for functionality check
## Running tests
1. Please run `php artisan test` in project root folder to see the test results.
