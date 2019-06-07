-- DROP TABLE password_resets --------------------------------
DROP TABLE IF EXISTS password_resets CASCADE;

-- DROP TABLE migrations -------------------------------------
DROP TABLE IF EXISTS migrations CASCADE;

-- DROP TABLE user_roles -------------------------------------
DROP TABLE IF EXISTS user_roles CASCADE;

-- DROP TABLE user_cities ------------------------------------
DROP TABLE IF EXISTS user_cities CASCADE;

-- DROP TABLE table_reservations -----------------------------
DROP TABLE IF EXISTS table_reservations CASCADE;

-- DROP TABLE permission_roles -------------------------------
DROP TABLE IF EXISTS permission_roles CASCADE;

-- DROP TABLE menu_dishes ------------------------------------
DROP TABLE IF EXISTS menu_dishes CASCADE;

-- DROP TABLE user_registers ---------------------------------
DROP TABLE IF EXISTS user_registers CASCADE;

-- DROP TABLE roles ------------------------------------------
DROP TABLE IF EXISTS roles CASCADE;

-- DROP TABLE tables -----------------------------------------
DROP TABLE IF EXISTS tables CASCADE;

-- DROP TABLE reservations -----------------------------------
DROP TABLE IF EXISTS reservations CASCADE;

-- DROP TABLE menus ------------------------------------------
DROP TABLE IF EXISTS menus CASCADE;

-- DROP TABLE permissions ------------------------------------
DROP TABLE IF EXISTS permissions CASCADE;

-- DROP TABLE ingredients ------------------------------------
DROP TABLE IF EXISTS ingredients CASCADE;

-- DROP TABLE dishes -----------------------------------------
DROP TABLE IF EXISTS dishes CASCADE;

-- DROP TABLE purchases --------------------------------------
DROP TABLE IF EXISTS purchases CASCADE;

-- DROP TABLE payment_vouchers -------------------------------
DROP TABLE IF EXISTS payment_vouchers CASCADE;

-- DROP TABLE payment_methods --------------------------------
DROP TABLE IF EXISTS payment_methods CASCADE;

-- DROP TABLE comments ---------------------------------------
DROP TABLE IF EXISTS comments CASCADE;

-- DROP TABLE places -----------------------------------------
DROP TABLE IF EXISTS places CASCADE;

-- DROP TABLE cities -----------------------------------------
DROP TABLE IF EXISTS cities CASCADE;

-- DROP TABLE countries --------------------------------------
DROP TABLE IF EXISTS countries CASCADE;

-- DROP TABLE users ------------------------------------------
DROP TABLE IF EXISTS users CASCADE;




-- CREATE TABLE users ----------------------------------------
CREATE TABLE users ( 
	id SERIAL NOT NULL,
	name Character Varying( 255 ) NOT NULL,
	email Character Varying( 255 ) NOT NULL,
	email_verified_at Timestamp( 0 ) Without Time Zone,
	password Character Varying( 255 ) NOT NULL,
	phone_number Character Varying( 255 ) NOT NULL,
	address Character Varying( 255 ) NOT NULL,
	remember_token Character Varying( 100 ),
	created_at Timestamp( 0 ) Without Time Zone,
	updated_at Timestamp( 0 ) Without Time Zone,
	PRIMARY KEY ( id ),
	CONSTRAINT users_email_unique UNIQUE( email ) );
 ;
-- -------------------------------------------------------------




-- CREATE TABLE countries ------------------------------------
CREATE TABLE countries ( 
	id SERIAL NOT NULL,
	created_at Timestamp( 0 ) Without Time Zone,
	updated_at Timestamp( 0 ) Without Time Zone,
	name Character Varying( 255 ) NOT NULL,
	code Character Varying( 255 ) NOT NULL,
	PRIMARY KEY ( id ) );
 ;
-- -------------------------------------------------------------




-- CREATE TABLE cities ---------------------------------------
CREATE TABLE cities ( 
	id SERIAL NOT NULL,
	countries_id SERIAL NOT NULL,
	created_at Timestamp( 0 ) Without Time Zone,
	updated_at Timestamp( 0 ) Without Time Zone,
	name Character Varying( 255 ) NOT NULL,
	code Character Varying( 255 ) NOT NULL,
	PRIMARY KEY ( id ));
 ;
 -- CREATE LINK cities_countries_id_foreign -------------------
ALTER TABLE cities
	ADD CONSTRAINT cities_countries_id_foreign FOREIGN KEY ( countries_id )
	REFERENCES countries ( id ) MATCH SIMPLE
	ON DELETE Cascade
	ON UPDATE Cascade;
-- -------------------------------------------------------------




-- CREATE TABLE places ---------------------------------------
CREATE TABLE places ( 
	id SERIAL NOT NULL,
	users_id SERIAL NOT NULL,
	name Character Varying( 255 ) NOT NULL,
	address Character Varying( 255 ) NOT NULL,
	opening_time Time( 0 ) Without Time Zone NOT NULL,
	closing_time Time( 0 ) Without Time Zone NOT NULL,
	average_value Double Precision NOT NULL,
	created_at Timestamp( 0 ) Without Time Zone,
	updated_at Timestamp( 0 ) Without Time Zone,
	PRIMARY KEY ( id ) );
 ;
-- CREATE LINK places_users_id_foreign -----------------------
ALTER TABLE places
	ADD CONSTRAINT places_users_id_foreign FOREIGN KEY ( users_id )
	REFERENCES users ( id ) MATCH SIMPLE
	ON DELETE Cascade
	ON UPDATE Cascade;
-- -------------------------------------------------------------




-- CREATE TABLE comments -------------------------------------
CREATE TABLE comments ( 
	id SERIAL NOT NULL,
	places_id SERIAL NOT NULL,
	users_id SERIAL NOT NULL,
	content Character Varying( 255 ) NOT NULL,
	value Integer NOT NULL,
	created_at Timestamp( 0 ) Without Time Zone,
	updated_at Timestamp( 0 ) Without Time Zone,
	PRIMARY KEY ( id ) );
 ;
 -- CREATE LINK comments_users_id_foreign ---------------------
ALTER TABLE comments
	ADD CONSTRAINT comments_users_id_foreign FOREIGN KEY ( users_id )
	REFERENCES users ( id ) MATCH SIMPLE
	ON DELETE Cascade
	ON UPDATE Cascade;
-- -------------------------------------------------------------




-- CREATE TABLE payment_methods ------------------------------
CREATE TABLE payment_methods ( 
	id SERIAL NOT NULL,
	users_id SERIAL NOT NULL,
	created_at Timestamp( 0 ) Without Time Zone,
	updated_at Timestamp( 0 ) Without Time Zone,
	type Character Varying( 20 ) NOT NULL,
	bank Character Varying( 64 ) NOT NULL,
	PRIMARY KEY ( id ) );
 ;
 -- CREATE LINK payment_methods_users_id_foreign --------------
ALTER TABLE payment_methods
	ADD CONSTRAINT payment_methods_users_id_foreign FOREIGN KEY ( users_id )
	REFERENCES users ( id ) MATCH SIMPLE
	ON DELETE Cascade
	ON UPDATE Cascade;
-- -------------------------------------------------------------




-- CREATE TABLE payment_vouchers -----------------------------
CREATE TABLE payment_vouchers ( 
	id SERIAL NOT NULL,
	payment_methods_id SERIAL NOT NULL,
	amount Integer NOT NULL,
	date Date NOT NULL,
	detail Character Varying( 40 ) NOT NULL,
	status Integer NOT NULL,
	delivery Boolean NOT NULL,
	created_at Timestamp( 0 ) Without Time Zone,
	updated_at Timestamp( 0 ) Without Time Zone,
	PRIMARY KEY ( id ) );
 ;
 -- CREATE LINK payment_vouchers_payment_methods_id_foreign ---
ALTER TABLE payment_vouchers
	ADD CONSTRAINT payment_vouchers_payment_methods_id_foreign FOREIGN KEY ( payment_methods_id )
	REFERENCES payment_methods ( id ) MATCH SIMPLE
	ON DELETE Cascade
	ON UPDATE Cascade;
-- -------------------------------------------------------------




-- CREATE TABLE purchases ------------------------------------
CREATE TABLE purchases ( 
	id SERIAL NOT NULL,
	payment_vouchers_id SERIAL NOT NULL,
	users_id SERIAL NOT NULL,
	status Integer NOT NULL,
	created_at Timestamp( 0 ) Without Time Zone,
	updated_at Timestamp( 0 ) Without Time Zone,
	PRIMARY KEY ( id ) );
 ;
-- CREATE LINK purchases_users_id_foreign --------------------
ALTER TABLE purchases
	ADD CONSTRAINT purchases_users_id_foreign FOREIGN KEY ( users_id )
	REFERENCES users ( id ) MATCH SIMPLE
	ON DELETE Cascade
	ON UPDATE Cascade;
-- CREATE LINK purchases_payment_vouchers_id_foreign ---------
ALTER TABLE purchases
	ADD CONSTRAINT purchases_payment_vouchers_id_foreign FOREIGN KEY ( payment_vouchers_id )
	REFERENCES payment_vouchers ( id ) MATCH SIMPLE
	ON DELETE Cascade
	ON UPDATE Cascade;
-- -------------------------------------------------------------




-- CREATE TABLE dishes ---------------------------------------
CREATE TABLE dishes ( 
	id SERIAL NOT NULL,
	purchases_id SERIAL NOT NULL,
	name Character Varying( 32 ) NOT NULL,
	price Integer NOT NULL,
	description Text NOT NULL,
	category Character Varying( 20 ) NOT NULL,
	discount Integer NOT NULL,
	created_at Timestamp( 0 ) Without Time Zone,
	updated_at Timestamp( 0 ) Without Time Zone,
	PRIMARY KEY ( id ) );
 ;
-- CREATE LINK dishes_purchases_id_foreign -------------------
ALTER TABLE dishes
	ADD CONSTRAINT dishes_purchases_id_foreign FOREIGN KEY ( purchases_id )
	REFERENCES purchases ( id ) MATCH SIMPLE
	ON DELETE Cascade
	ON UPDATE Cascade;
-- -------------------------------------------------------------




-- CREATE TABLE ingredients ----------------------------------
CREATE TABLE ingredients ( 
	id SERIAL NOT NULL,
	dishes_id SERIAL NOT NULL,
	created_at Timestamp( 0 ) Without Time Zone,
	updated_at Timestamp( 0 ) Without Time Zone,
	name Character Varying( 20 ) NOT NULL,
	type Character Varying( 20 ) NOT NULL,
	category Character Varying( 20 ) NOT NULL,
	PRIMARY KEY ( id ) );
 ;
-- CREATE LINK ingredients_dishes_id_foreign -----------------
ALTER TABLE ingredients
	ADD CONSTRAINT ingredients_dishes_id_foreign FOREIGN KEY ( dishes_id )
	REFERENCES dishes ( id ) MATCH SIMPLE
	ON DELETE Cascade
	ON UPDATE Cascade;
-- -------------------------------------------------------------




-- CREATE TABLE permissions ----------------------------------
CREATE TABLE permissions ( 
	id SERIAL NOT NULL,
	created_at Timestamp( 0 ) Without Time Zone,
	updated_at Timestamp( 0 ) Without Time Zone,
	name Character Varying( 255 ) NOT NULL,
	PRIMARY KEY ( id ) );
 ;
-- -------------------------------------------------------------




-- CREATE TABLE menus ----------------------------------------
CREATE TABLE menus ( 
	id SERIAL NOT NULL,
	places_id SERIAL NOT NULL,
	purchases_id SERIAL NOT NULL,
	price Integer NOT NULL,
	discount Integer NOT NULL,
	category Character Varying( 20 ) NOT NULL,
	created_at Timestamp( 0 ) Without Time Zone,
	updated_at Timestamp( 0 ) Without Time Zone,
	PRIMARY KEY ( id ) );
 ;
 -- CREATE LINK menus_purchases_id_foreign --------------------
ALTER TABLE menus
	ADD CONSTRAINT menus_purchases_id_foreign FOREIGN KEY ( purchases_id )
	REFERENCES purchases ( id ) MATCH SIMPLE
	ON DELETE Cascade
	ON UPDATE Cascade;
-- CREATE LINK menus_places_id_foreign -----------------------
ALTER TABLE menus
	ADD CONSTRAINT menus_places_id_foreign FOREIGN KEY ( places_id )
	REFERENCES places ( id ) MATCH SIMPLE
	ON DELETE Cascade
	ON UPDATE Cascade;
-- -------------------------------------------------------------




-- CREATE TABLE reservations ---------------------------------
CREATE TABLE reservations ( 
	id SERIAL NOT NULL,
	users_id SERIAL NOT NULL,
	created_at Timestamp( 0 ) Without Time Zone,
	updated_at Timestamp( 0 ) Without Time Zone,
	date Timestamp( 0 ) Without Time Zone NOT NULL,
	time Time( 0 ) Without Time Zone NOT NULL,
	allow Boolean NOT NULL,
	PRIMARY KEY ( id ) );
 ;
 -- CREATE LINK reservations_users_id_foreign -----------------
ALTER TABLE reservations
	ADD CONSTRAINT reservations_users_id_foreign FOREIGN KEY ( users_id )
	REFERENCES users ( id ) MATCH SIMPLE
	ON DELETE Cascade
	ON UPDATE Cascade;
-- -------------------------------------------------------------




-- CREATE TABLE tables ---------------------------------------
CREATE TABLE tables ( 
	id SERIAL NOT NULL,
	places_id SERIAL NOT NULL,
	created_at Timestamp( 0 ) Without Time Zone,
	updated_at Timestamp( 0 ) Without Time Zone,
	capacity Integer NOT NULL,
	code Character Varying( 255 ) NOT NULL,
	taken Boolean NOT NULL,
	PRIMARY KEY ( id ) );
 ;
 -- CREATE LINK tables_places_id_foreign ----------------------
ALTER TABLE tables
	ADD CONSTRAINT tables_places_id_foreign FOREIGN KEY ( places_id )
	REFERENCES places ( id ) MATCH SIMPLE
	ON DELETE Cascade
	ON UPDATE Cascade;
-- -------------------------------------------------------------




-- CREATE TABLE roles ----------------------------------------
CREATE TABLE roles ( 
	id SERIAL NOT NULL,
	created_at Timestamp( 0 ) Without Time Zone,
	updated_at Timestamp( 0 ) Without Time Zone,
	name Character Varying( 255 ) NOT NULL,
	description Text NOT NULL,
	PRIMARY KEY ( id ) );
 ;
-- -------------------------------------------------------------




-- CREATE TABLE user_registers -------------------------------
CREATE TABLE user_registers ( 
	id SERIAL NOT NULL,
	users_id SERIAL NOT NULL,
	created_at Timestamp( 0 ) Without Time Zone,
	updated_at Timestamp( 0 ) Without Time Zone,
	actions Text NOT NULL,
	PRIMARY KEY ( id ) );
 ;
-- CREATE LINK user_registers_users_id_foreign ---------------
ALTER TABLE user_registers
	ADD CONSTRAINT user_registers_users_id_foreign FOREIGN KEY ( users_id )
	REFERENCES users ( id ) MATCH SIMPLE
	ON DELETE Cascade
	ON UPDATE Cascade;
-- -------------------------------------------------------------




-- CREATE TABLE menu_dishes ----------------------------------
CREATE TABLE menu_dishes ( 
	id SERIAL NOT NULL,
	menus_id SERIAL NOT NULL,
	dishes_id SERIAL NOT NULL,
	created_at Timestamp( 0 ) Without Time Zone,
	updated_at Timestamp( 0 ) Without Time Zone,
	PRIMARY KEY ( id ) );
 ;
 -- CREATE LINK menu_dishes_dishes_id_foreign -----------------
ALTER TABLE menu_dishes
	ADD CONSTRAINT menu_dishes_dishes_id_foreign FOREIGN KEY ( dishes_id )
	REFERENCES dishes ( id ) MATCH SIMPLE
	ON DELETE Cascade
	ON UPDATE Cascade;
-- CREATE LINK menu_dishes_menus_id_foreign ------------------
ALTER TABLE menu_dishes
	ADD CONSTRAINT menu_dishes_menus_id_foreign FOREIGN KEY ( menus_id )
	REFERENCES menus ( id ) MATCH SIMPLE
	ON DELETE Cascade
	ON UPDATE Cascade;
-- -------------------------------------------------------------




-- CREATE TABLE permission_roles -----------------------------
CREATE TABLE permission_roles ( 
	id SERIAL NOT NULL,
	permissions_id SERIAL NOT NULL,
	roles_id SERIAL NOT NULL,
	created_at Timestamp( 0 ) Without Time Zone,
	updated_at Timestamp( 0 ) Without Time Zone,
	PRIMARY KEY ( id ) );
 ;
-- CREATE LINK permission_roles_roles_id_foreign -------------
ALTER TABLE permission_roles
	ADD CONSTRAINT permission_roles_roles_id_foreign FOREIGN KEY ( roles_id )
	REFERENCES roles ( id ) MATCH SIMPLE
	ON DELETE Cascade
	ON UPDATE Cascade;
-- CREATE LINK permission_roles_permissions_id_foreign -------
ALTER TABLE permission_roles
	ADD CONSTRAINT permission_roles_permissions_id_foreign FOREIGN KEY ( permissions_id )
	REFERENCES permissions ( id ) MATCH SIMPLE
	ON DELETE Cascade
	ON UPDATE Cascade;
-- -------------------------------------------------------------




-- CREATE TABLE table_reservations ---------------------------
CREATE TABLE table_reservations ( 
	id SERIAL NOT NULL,
	created_at Timestamp( 0 ) Without Time Zone,
	updated_at Timestamp( 0 ) Without Time Zone,
	tables_id SERIAL NOT NULL,
	reservations_id SERIAL NOT NULL,
	PRIMARY KEY ( id ) );
 ;
 -- CREATE LINK table_reservations_reservations_id_foreign ----
ALTER TABLE table_reservations
	ADD CONSTRAINT table_reservations_reservations_id_foreign FOREIGN KEY ( reservations_id )
	REFERENCES reservations ( id ) MATCH SIMPLE
	ON DELETE Cascade
	ON UPDATE Cascade;
-- CREATE LINK table_reservations_tables_id_foreign ----------
ALTER TABLE table_reservations
	ADD CONSTRAINT table_reservations_tables_id_foreign FOREIGN KEY ( tables_id )
	REFERENCES tables ( id ) MATCH SIMPLE
	ON DELETE Cascade
	ON UPDATE Cascade;
-- -------------------------------------------------------------




-- CREATE TABLE user_cities ----------------------------------
CREATE TABLE user_cities ( 
	id SERIAL NOT NULL,
	cities_id SERIAL NOT NULL,
	users_id SERIAL NOT NULL,
	created_at Timestamp( 0 ) Without Time Zone,
	updated_at Timestamp( 0 ) Without Time Zone,
	PRIMARY KEY ( id ) );
 ;
-- CREATE LINK user_cities_users_id_foreign ------------------
ALTER TABLE user_cities
	ADD CONSTRAINT user_cities_users_id_foreign FOREIGN KEY ( users_id )
	REFERENCES users ( id ) MATCH SIMPLE
	ON DELETE Cascade
	ON UPDATE Cascade;
-- CREATE LINK user_cities_cities_id_foreign -----------------
ALTER TABLE user_cities
	ADD CONSTRAINT user_cities_cities_id_foreign FOREIGN KEY ( cities_id )
	REFERENCES cities ( id ) MATCH SIMPLE
	ON DELETE Cascade
	ON UPDATE Cascade;
-- -------------------------------------------------------------




-- CREATE TABLE user_roles -----------------------------------
CREATE TABLE user_roles ( 
	id SERIAL NOT NULL,
	roles_id SERIAL NOT NULL,
	users_id SERIAL NOT NULL,
	created_at Timestamp( 0 ) Without Time Zone,
	updated_at Timestamp( 0 ) Without Time Zone,
	PRIMARY KEY ( id ) );
 ;
 -- CREATE LINK user_roles_users_id_foreign -------------------
ALTER TABLE user_roles
	ADD CONSTRAINT user_roles_users_id_foreign FOREIGN KEY ( users_id )
	REFERENCES users ( id ) MATCH SIMPLE
	ON DELETE Cascade
	ON UPDATE Cascade;
-- CREATE LINK user_roles_roles_id_foreign -------------------
ALTER TABLE user_roles
	ADD CONSTRAINT user_roles_roles_id_foreign FOREIGN KEY ( roles_id )
	REFERENCES roles ( id ) MATCH SIMPLE
	ON DELETE Cascade
	ON UPDATE Cascade;
-- -------------------------------------------------------------




-- CREATE TABLE migrations -----------------------------------
CREATE TABLE migrations ( 
	id Integer NOT NULL,
	migration Character Varying( 255 ) NOT NULL,
	batch Integer NOT NULL,
	PRIMARY KEY ( id ) );
 ;
-- -------------------------------------------------------------




-- CREATE TABLE password_resets ------------------------------
CREATE TABLE password_resets ( 
	email Character Varying( 255 ) NOT NULL,
	token Character Varying( 255 ) NOT NULL,
	created_at Timestamp( 0 ) Without Time Zone );
 ;
-- CREATE INDEX password_resets_email_index ------------------
CREATE INDEX password_resets_email_index ON password_resets USING btree( email Asc NULLS Last );
-- -------------------------------------------------------------