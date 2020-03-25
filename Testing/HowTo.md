**Mac OS/X**
1. Navigate to Testing directory
2. Execute ./phpunit --bootstrap load.php tests

**Windows**


**Writing test cases**
- Follow documentation [here](https://phpunit.readthedocs.io/en/9.0/writing-tests-for-phpunit.html)
- Be sure to include the actual file and any other dependencies at the top of the test file using proper syntax -> ```require_once SRC . "path to file with no leading /"```
- Name the file```name of file to be tested``` + ```Test.php``` and place this file in the ```tests``` folder
..* e.g. testing verify.php would yield VerifyTest.php
