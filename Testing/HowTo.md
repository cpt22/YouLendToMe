## Mac OS/X
1. Navigate to Testing directory
2. Execute ./phpunit --bootstrap load.php tests

## Windows
1. Instructions may be the same as on mac but I'm not sure, so orion try testing this

## Writing test cases
- Follow documentation [here](https://phpunit.readthedocs.io/en/9.0/writing-tests-for-phpunit.html)
- Be sure to include the actual file and any other dependencies at the top of the test file using proper syntax -> ```require_once SRC . "path to file with no leading /"```
- Name the file```name of file to be tested``` + ```Test.php``` and place this file in the ```tests``` folder
- e.g. testing verify.php would yield VerifyTest.php


## Sample Information
- Please create all this info prior to running test suite
- Use test.sql in the create folder to build the test user. Reference info can be found below


1. Test User
  * first_name: Test-First
  * last_name: Test-Last
  * email: test@youlendtome.com
  * username: test
  * password: Test1234
  * phone: 0000000000

2. Test Address
  * line1: test1
  * line2: test2
  * city: testcity
  * state: teststate
  * zipcode: 10101
  * user_ID: UNKNOWN

3. Test Credit card (via PMA)
  * number: 0000000000000000
  * exp_month: 1
  * exp_year: 2024
  * cvv: 123
  * user_ID: **FIND USER ID OF THE TEST USER AND USE THAT ID HERE**

4. Test Item (via new item page)
  * title: "test title"
  * description: "test description"
  * listed: 1
  * borrowed: 1
  * zipcode: 10101
  * rate: 180.00
  * start_date: "2020-05-05"
  * end_date: "2020-06-06"
  * category: 6
  * owner_ID: UNKNOWN
  * deleted: 1
  * ID: "f6f6f6f6f6"

5. Test Image
  * filename: thisisatestimage
  * item_ID: "f6f6f6f6f6"

6. Test Borrows
  * user_ID: UNKNOWN
  * item_ID: "f6f6f6f6f6"
  * start_date: "2020-05-15"
  * end_date: "2020-05-20"
