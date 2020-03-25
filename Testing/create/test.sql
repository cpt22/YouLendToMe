-- Create Test user
INSERT INTO users (first_name, last_name, email, username, password, phone_number) VALUES ('Test-First', 'Test-Last', 'test@youlendto.me', 'test', '$2y$10$pYNyNQRW8A6qvXJB6aVkDOvh2O1v8p44Jl4Kp8/yaSrriITTFyzzO', 0000000000);
SET @userID = LAST_INSERT_ID();
-- Create test user's credit card
INSERT INTO credit_cards (number, exp_month, exp_year, cvv, user_ID) VALUES ('0000000000000000', 01, 2024, 123, @userID);
-- Create test user's address
INSERT INTO addresses (line1, line2, city, state, zipcode, user_ID) VALUES ('test1', 'test2', 'testcity', 'teststate', 10101, @userID);
-- Create test item
SET @itemID = "f6f6f6f6f6"
INSERT INTO items (title, description, listed, borrowed, location, rate, start_date, end_date, category, owner_ID, deleted) VALUES ('test title', 'test description', 1, 1, 60093, 280.00, '2020-05-05', '2020-06-06', 1, @userID, 6, @itemID);
-- Create test image
INSERT INTO images (filename, item_ID) VALUES ('thisisatestimage', @itemID);
-- Create test borrows
INSERT INTO borrows (user_ID, item_ID, start_date, end_date) VALUES (@userID, @itemID, '2020-05-15', '2020-05-20');

-- Implement test tokens later
