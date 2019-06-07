-- User TABLE ----------------------------------------
INSERT INTO users (name, email, email_verified_at, password, phone_number, address, remember_token, created_at, updated_at)
VALUES ('Victor Huanqui', 'victor.huanqui@usach.cl', NULL, 'zomato6661', '+56985138116', 'Pedro Lagos 1118', NULL, '2019-06-07 04:40:54', '2019-06-07 04:40:54');

INSERT INTO users (name, email, email_verified_at, password, phone_number, address, remember_token, created_at, updated_at)
VALUES ('Carlos Henrriquez', 'carlos.henrriquez@usach.cl', NULL, 'zomato6662', '+1234567890', 'Usach', NULL, '2019-06-07 04:40:54', '2019-06-07 04:40:54');

INSERT INTO users (name, email, email_verified_at, password, phone_number, address, remember_token, created_at, updated_at)
VALUES ('Maximiliano Orellana', 'max.orellana@usach.cl', NULL, 'zomato6663', '+1234567809', 'Usach', NULL, '2019-06-07 04:40:54', '2019-06-07 04:40:54');

INSERT INTO users (name, email, email_verified_at, password, phone_number, address, remember_token, created_at, updated_at)
VALUES ('Andres F', 'andres.f@usach.cl', NULL, 'zomato6664', '+1234567089', 'Usach', NULL, '2019-06-07 04:40:54', '2019-06-07 04:40:54');


-- Country TABLE ----------------------------------------
INSERT INTO countries (created_at, updated_at, name, code)
VALUES ('2019-06-07 04:40:55', '2019-06-07 04:40:55', 'Chile', 'CH');

INSERT INTO countries (created_at, updated_at, name, code)
VALUES ('2019-06-07 04:40:55', '2019-06-07 04:40:55', 'Argentina', 'AR');


-- City TABLE ----------------------------------------
INSERT INTO cities (created_at, updated_at, name, code)
VALUES ('2019-06-07 04:40:55', '2019-06-07 04:40:55', 'Santiago', 'New');

INSERT INTO cities (created_at, updated_at, name, code)
VALUES ('2019-06-07 04:40:55', '2019-06-07 04:40:55', 'Temuco', 'South');


-- Place TABLE ----------------------------------------
INSERT INTO places (name, address, opening_time, closing_time, average_value, created_at, updated_at)
VALUES ('MacDonalds', 'Alameda 133', '11:00:00', '21:00:00', '4.4', '2019-06-07 04:40:55', '2019-06-07 04:40:55');

INSERT INTO places (name, address, opening_time, closing_time, average_value, created_at, updated_at)
VALUES ('BurgerKing', 'Moneda 1313', '10:00:00', '22:00:00', '4.2', '2019-06-07 04:40:55', '2019-06-07 04:40:55');


-- Comment TABLE ----------------------------------------
INSERT INTO comments (content, value, created_at, updated_at)
VALUES ('I ate a very tasty hamburger, I recommend it.', '4.4', '2019-06-07 04:40:55', '2019-06-07 04:40:55');

INSERT INTO comments (content, value, created_at, updated_at)
VALUES ('I liked the food but the air conditioning did not work.', '4.2', '2019-06-07 04:40:55', '2019-06-07 04:40:55');


-- PaymentMethod TABLE ----------------------------------------
INSERT INTO payment_methods (created_at, updated_at, type, bank)
VALUES ('2019-06-07 04:40:55', '2019-06-07 04:40:55', 'Debit Card', 'Banco de Chile');

INSERT INTO payment_methods (created_at, updated_at, type, bank)
VALUES ('2019-06-07 04:40:55', '2019-06-07 04:40:55', 'Credit Card', 'Banco Estado');


-- PaymentVoucher TABLE ----------------------------------------
INSERT INTO payment_vouchers (amount, date, detail, status, delivery, created_at, updated_at)
VALUES (5990, '2019-06-06', 'None', 0, '2019-06-07 04:40:55', '2019-06-07 04:40:55');

INSERT INTO payment_vouchers (amount, date, detail, status, delivery, created_at, updated_at)
VALUES (4990, '2019-06-07', 'None', 0, '2019-06-07 04:40:55', '2019-06-07 04:40:55');


-- Purchase TABLE ----------------------------------------
INSERT INTO purchases (status, created_at, updated_at)
VALUES (2, '2019-06-07 04:40:55', '2019-06-07 04:40:55');

INSERT INTO purchases (status, created_at, updated_at)
VALUES (1, '2019-06-07 04:40:55', '2019-06-07 04:40:55');


-- Dish TABLE ----------------------------------------
INSERT INTO dishes (name, price, description, category, discount, created_at, updated_at)
VALUES ('Big Mac', 3990, 'Two hamburger with sauce, melted cheese, onion and pickle.', 'Fast food', 0, '2019-06-07 04:40:55', '2019-06-07 04:40:55');

INSERT INTO dishes (name, price, description, category, discount, created_at, updated_at)
VALUES ('French fries', 1990, 'French fries.', 'Fast food', 0, '2019-06-07 04:40:55', '2019-06-07 04:40:55');


-- Ingredient TABLE ----------------------------------------
INSERT INTO ingredients (created_at, updated_at, name, type, category)
VALUES ('2019-06-07 04:40:55', '2019-06-07 04:40:55', 'BBQ sauce', 'Sauce', 'Vegetarian');

INSERT INTO ingredients (created_at, updated_at, name, type, category)
VALUES ('2019-06-07 04:40:55', '2019-06-07 04:40:55', 'Potato', 'Vegetable', 'Vegan');


-- Permission TABLE ----------------------------------------
INSERT INTO permissions (created_at, updated_at, name)
VALUES ('2019-06-07 04:40:55', '2019-06-07 04:40:55', 'None');

INSERT INTO permissions (created_at, updated_at, name)
VALUES ('2019-06-07 04:40:55', '2019-06-07 04:40:55', 'Modify user');


-- Menu TABLE ----------------------------------------
INSERT INTO menus (price, discount, category, created_at, updated_at, name)
VALUES (5990, 0, 'Fast food', '2019-06-07 04:40:55', '2019-06-07 04:40:55');

INSERT INTO menus (price, discount, category, created_at, updated_at, name)
VALUES (4990, 0, 'Fast food', '2019-06-07 04:40:55', '2019-06-07 04:40:55');


-- Reservation TABLE ----------------------------------------
INSERT INTO reservations (created_at, updated_at, date, time, allow)
VALUES ('2019-06-07 04:40:55', '2019-06-07 04:40:55', '2019-06-07 05:35:28', '16:00:00', 1);

INSERT INTO reservations (created_at, updated_at, date, time, allow)
VALUES ('2019-06-07 04:40:55', '2019-06-07 04:40:55', '2018-06-07 14:22:46', '20:30:00', 1);


-- Role TABLE ----------------------------------------
INSERT INTO roles (created_at, updated_at, name, description)
VALUES ('2019-06-07 04:40:55', '2019-06-07 04:40:55',  'Admin', 'No restrictions.');

INSERT INTO roles (created_at, updated_at, name, description)
VALUES ('2019-06-07 04:40:55', '2019-06-07 04:40:55',  'Unregistered user', 'Only can order and buy.');


-- UserRegister TABLE ----------------------------------------
INSERT INTO user_registers (created_at, updated_at, actions)
VALUES ('2019-06-07 04:40:55', '2019-06-07 04:40:55',  'GG');

INSERT INTO user_registers (created_at, updated_at, actions)
VALUES ('2019-06-07 04:40:55', '2019-06-07 04:40:55',  'GG');


-- MenuDish TABLE ----------------------------------------
INSERT INTO menu_dishes (created_at, updated_at)
VALUES ('2019-06-07 04:40:55', '2019-06-07 04:40:55');

INSERT INTO menu_dishes (created_at, updated_at)
VALUES ('2019-06-07 04:40:55', '2019-06-07 04:40:55');


-- PermissionRole TABLE ----------------------------------------
INSERT INTO permission_roles (created_at, updated_at)
VALUES ('2019-06-07 04:40:55', '2019-06-07 04:40:55');

INSERT INTO permission_roles (created_at, updated_at)
VALUES ('2019-06-07 04:40:55', '2019-06-07 04:40:55');


-- TableReservation TABLE ----------------------------------------
INSERT INTO table_reservations (created_at, updated_at)
VALUES ('2019-06-07 04:40:55', '2019-06-07 04:40:55');

INSERT INTO table_reservations (created_at, updated_at)
VALUES ('2019-06-07 04:40:55', '2019-06-07 04:40:55');


-- UserCity TABLE ----------------------------------------
INSERT INTO user_cities (created_at, updated_at)
VALUES ('2019-06-07 04:40:55', '2019-06-07 04:40:55');

INSERT INTO user_cities (created_at, updated_at)
VALUES ('2019-06-07 04:40:55', '2019-06-07 04:40:55');


-- UserRole TABLE ----------------------------------------
INSERT INTO user_roles (created_at, updated_at)
VALUES ('2019-06-07 04:40:55', '2019-06-07 04:40:55');

INSERT INTO user_roles (created_at, updated_at)
VALUES ('2019-06-07 04:40:55', '2019-06-07 04:40:55');


-- Migration TABLE ----------------------------------------
INSERT INTO migrations (id, migration, batch)
VALUES ('2019-06-07 04:40:55', '2019-06-07 04:40:55');

INSERT INTO migrations (id, migration, batch)
VALUES ('2019-06-07 04:40:55', '2019-06-07 04:40:55');


-- PaswordReset TABLE ----------------------------------------
INSERT INTO pasword_resets (email, token, created_at)
VALUES ('2019-06-07 04:40:55', '2019-06-07 04:40:55');
INSERT INTO pasword_resets (email, token, created_at)
VALUES ('2019-06-07 04:40:55', '2019-06-07 04:40:55');