***Mac OS/X***
1. Navigate to Testing directory
2. Execute ./phpunit --bootstrap load.php tests

***Windows***
1. Instructions may be the same as on mac but I'm not sure, so orion try testing this

***Writing test cases***
- Follow documentation [here](https://phpunit.readthedocs.io/en/9.0/writing-tests-for-phpunit.html)
- Be sure to include the actual file and any other dependencies at the top of the test file using proper syntax -> ```require_once SRC . "path to file with no leading /"```
- Name the file```name of file to be tested``` + ```Test.php``` and place this file in the ```tests``` folder
- e.g. testing verify.php would yield VerifyTest.php


***Sample Information***
1. Please create all this info prior to running test suite
2. Use test.sql in the create folder to build the test user. Reference info can be found below


1. Test User
..* First Name: Test-First
..* Last Name: Test-Last
..* Email: test@youlendtome.com
..* Username: test
..* Password: Test1234
..* Phone: 0000000000

3. Test Credit card (via PMA)
- number: 0000000000000000
- exp_month: 1
- exp_year: 2024
- cvv: 123
- user_ID: **FIND USER ID OF THE TEST USER AND USE THAT ID HERE**

4. Test Item (via new item page)
- Log in as test user and create this item