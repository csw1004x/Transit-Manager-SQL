CREATE TABLE transit_system (
	ts_city VARCHAR(20),
    ts_name VARCHAR(20),
    PRIMARY KEY (ts_name, ts_city)
);

CREATE TABLE manager_id1(
	manager_id CHAR(10),
    manager_password VARCHAR(50) NOT NULL,
    first_name VARCHAR(20) NOT NULL,
    last_name VARCHAR(20) NOT NULL,
    date_employed DATE NOT NULL,
    PRIMARY KEY (manager_id)
);

CREATE TABLE manager_id2 (
	date_employed DATE NOT NULL,
    salary INT NOT NULL,
    PRIMARY KEY (date_employed)
);

CREATE TABLE manages (
	manager_id CHAR(10),
    ts_city VARCHAR(20),
    ts_name VARCHAR(20),
    PRIMARY KEY (manager_id, ts_name, ts_city),
    FOREIGN KEY (manager_id) REFERENCES manager_id1(manager_id),
    FOREIGN KEY (ts_name, ts_city) REFERENCES transit_system(ts_name, ts_city)
);

CREATE TABLE tickets1 (
	ticket_id INT,
    expiry_date_time TIMESTAMP NOT NULL,
    zone INT NOT NULL,
    pass_type VARCHAR(20) NOT NULL,
    PRIMARY KEY (ticket_id)
);

CREATE TABLE tickets2 (
	zone INT NOT NULL,
    pass_type VARCHAR(20) NOT NULL,
    price FLOAT NOT NULL,
    PRIMARY KEY (zone, pass_type)
);

CREATE TABLE route2 (
	start_station VARCHAR(30),
    end_station VARCHAR(30), 
    route_length INT DEFAULT 0 NOT NULL,
    PRIMARY KEY (start_station, end_station)
);

CREATE TABLE route3 (
	route_name VARCHAR(5),
    ts_city VARCHAR(20),
    ts_name VARCHAR(20),
    start_station VARCHAR(30) NOT NULL,
    end_station VARCHAR(30) NOT NULL,
    num_vehicles_running INT DEFAULT 0 NOT NULL,
    PRIMARY KEY (route_name),
    FOREIGN KEY (ts_name, ts_city) REFERENCES transit_system(ts_name, ts_city)
);

CREATE TABLE route4 (
	num_vehicles_running INT NOT NULL,
    vehicle_interval INT NOT NULL,
    PRIMARY KEY (num_vehicles_running)
);

CREATE TABLE stops (
	stop_name VARCHAR(30),
    text_code CHAR(10),
    PRIMARY KEY (stop_name)
);

CREATE TABLE goes_through (
	stop_name VARCHAR(30),
    route_name VARCHAR(5),
    PRIMARY KEY (stop_name, route_name),
    FOREIGN KEY (stop_name) REFERENCES stops(stop_name),
    FOREIGN KEY (route_name) REFERENCES route3(route_name)
);

CREATE TABLE vehicle (
	serial_num INT,
    year_produced DATE,
    number_of_seats INT DEFAULT 0 NOT NULL,
    passenger_capacity INT DEFAULT 0 NOT NULL,
    PRIMARY KEY (serial_num)
);

CREATE TABLE uses(
	route_name VARCHAR(5),
    vehicle_num INT,
    PRIMARY KEY (route_name, vehicle_num),
    FOREIGN KEY (route_name) REFERENCES route3(route_name),
    FOREIGN KEY (vehicle_num) REFERENCES vehicle(serial_num)
);

CREATE TABLE subway_vehicles1 (
	serial_num INT,
    train_type VARCHAR(20) NOT NULL,
    PRIMARY KEY (serial_num),
    FOREIGN KEY (serial_num) REFERENCES vehicle(serial_num)
);

CREATE TABLE subway_vehicles2 (
	train_type VARCHAR(20),
    number_of_carts INT DEFAULT 0 NOT NULL,
    PRIMARY KEY (train_type)
);

CREATE TABLE bus_vehicles (
	serial_num INT,
    bus_type VARCHAR(20) NOT NULL,
    PRIMARY KEY (serial_num),
    FOREIGN KEY (serial_num) REFERENCES vehicle(serial_num)
);

CREATE TABLE driver2 (
	license_class INT,
    years_of_experience INT,
    insurance_coverage INT DEFAULT 0 NOT NULL,
    PRIMARY KEY (license_class, years_of_experience)
);

CREATE TABLE driver3 (
	employee_id CHAR(10),
    ts_city VARCHAR(20),
    ts_name VARCHAR(20),
    date_employed DATE DEFAULT CURRENT_TIMESTAMP NOT NULL,
    driver_name VARCHAR(30) NOT NULL,
    license_class INT NOT NULL,
    years_of_experience INT NOT NULL,
    PRIMARY KEY (employee_id),
    FOREIGN KEY (ts_name, ts_city) REFERENCES transit_system(ts_name, ts_city)
);

CREATE TABLE driver4 (
    date_employed DATE DEFAULT CURRENT_TIMESTAMP,
    salary INT NOT NULL,
    PRIMARY KEY (date_employed)
);

CREATE TABLE operator1 (
	employee_id CHAR(10),
    control_room_id INT NOT NULL,
    years_of_experience INT NOT NULL,
    ts_city VARCHAR(20),
    ts_name VARCHAR(20),
    operator_name VARCHAR(30) NOT NULL,
    date_employed DATE DEFAULT CURRENT_TIMESTAMP NOT NULL,
    PRIMARY KEY (employee_id),
    FOREIGN KEY (ts_name, ts_city) REFERENCES transit_system(ts_name, ts_city)
);

CREATE TABLE operator2 (
    date_employed DATE DEFAULT CURRENT_TIMESTAMP,
    salary INT NOT NULL,
    PRIMARY KEY (date_employed)
);

CREATE TABLE transit_account (
	account_number INT,
    address VARCHAR(20) NOT NULL,
    phone_number INT NOT NULL,
    email VARCHAR(30) NOT NULL,
    passenger_name VARCHAR(30) NOT NULL,
    ts_city VARCHAR(20),
    ts_name VARCHAR(20),
    PRIMARY KEY (account_number),
    FOREIGN KEY (ts_name, ts_city) REFERENCES transit_system(ts_name, ts_city)
);

CREATE TABLE bus_card (
	card_number INT,
    balance FLOAT DEFAULT 0 NOT NULL,
    card_type VARCHAR(20) NOT NULL,
	transit_account_num INT NOT NULL,
    PRIMARY KEY (card_number),
    FOREIGN KEY (transit_account_num) REFERENCES transit_account(account_number) ON DELETE CASCADE
);

CREATE TABLE offers (
	card_number INT,
    student_num INT,
    institution VARCHAR(50),
    PRIMARY KEY (card_number, student_num, institution),
    FOREIGN KEY (card_number) REFERENCES transit_account(account_number) ON DELETE CASCADE
);

INSERT INTO transit_system (ts_name, ts_city) VALUES
	('Translink', 'Vancouver');

INSERT INTO transit_system (ts_name, ts_city) VALUES
    ('TTC', 'Toronto');

INSERT INTO transit_system (ts_name, ts_city) VALUES
    ('ETS', 'Edmonton');

INSERT INTO transit_system (ts_name, ts_city) VALUES
    ('Montreal Transit', 'Montreal');

INSERT INTO transit_system (ts_name, ts_city) VALUES
    ('Kingston Transit', 'Kingston');
    
INSERT INTO manager_id1 (manager_id, manager_password, first_name, last_name, date_employed) VALUES
	('p0c6v2m7x0', 'password', 'Kim', 'Tran', CURRENT_TIMESTAMP);

INSERT INTO manager_id1 (manager_id, manager_password, first_name, last_name, date_employed) VALUES
    ('f8n7m4s5n5', 'passw0rd', 'Andy', 'Choi', CURRENT_TIMESTAMP);

INSERT INTO manager_id1 (manager_id, manager_password, first_name, last_name, date_employed) VALUES
    ('y8m1o9n4c8', 'p@ssword', 'Lawrence', 'Ma', CURRENT_TIMESTAMP);

INSERT INTO manager_id1 (manager_id, manager_password, first_name, last_name, date_employed) VALUES
    ('o2k3g5f7j3', 'p@ssw0rd', 'Terrence', 'Stones', TO_DATE('121820', 'MMDDYY'));

INSERT INTO manager_id1 (manager_id, manager_password, first_name, last_name, date_employed) VALUES
    ('n2b9k3n5b1', 'notapassword', 'John', 'Diaz', TO_DATE('093021', 'MMDDYY'));

INSERT INTO manager_id2 (date_employed, salary) VALUES
	(CURRENT_TIMESTAMP, 70000);

INSERT INTO manager_id2 (date_employed, salary) VALUES
    (TO_DATE('121820', 'MMDDYY'), 50000);

INSERT INTO manager_id2 (date_employed, salary) VALUES
    (TO_DATE('093021', 'MMDDYY'), 55000);

INSERT INTO manager_id2 (date_employed, salary) VALUES
    (CURRENT_TIMESTAMP, 45000);

INSERT INTO manager_id2 (date_employed, salary) VALUES
    (CURRENT_TIMESTAMP, 65000);
    
INSERT INTO manages (manager_id, ts_name, ts_city) VALUES
	('p0c6v2m7x0', 'Translink', 'Vancouver');

INSERT INTO manages (manager_id, ts_name, ts_city) VALUES
    ('f8n7m4s5n5', 'Translink', 'Vancouver');

INSERT INTO manages (manager_id, ts_name, ts_city) VALUES
    ('y8m1o9n4c8', 'Translink', 'Vancouver');

INSERT INTO manages (manager_id, ts_name, ts_city) VALUES
    ('o2k3g5f7j3', 'Translink', 'Vancouver');

INSERT INTO manages (manager_id, ts_name, ts_city) VALUES
    ('n2b9k3n5b1', 'Kingston Transit', 'Kingston');
    
INSERT INTO tickets1 (ticket_id, expiry_date_time, zone, pass_type) VALUES
	(1, CURRENT_TIMESTAMP, 1, 'Adult');

INSERT INTO tickets1 (ticket_id, expiry_date_time, zone, pass_type) VALUES
    (2, CURRENT_TIMESTAMP, 1, 'Adult');

INSERT INTO tickets1 (ticket_id, expiry_date_time, zone, pass_type) VALUES
    (3, CURRENT_TIMESTAMP, 3, 'Adult');

INSERT INTO tickets1 (ticket_id, expiry_date_time, zone, pass_type) VALUES
    (4, CURRENT_TIMESTAMP, 2, 'Compass Card');

INSERT INTO tickets1 (ticket_id, expiry_date_time, zone, pass_type) VALUES
    (5, CURRENT_TIMESTAMP, 3, 'Concession');
    
INSERT INTO tickets2 (zone, pass_type, price) VALUES
	(1, 'Adult', 3.05);

INSERT INTO tickets2 (zone, pass_type, price) VALUES
    (1, 'Concession', 2.00);

INSERT INTO tickets2 (zone, pass_type, price) VALUES
    (1, 'Compass Card', 2.45);

INSERT INTO tickets2 (zone, pass_type, price) VALUES
    (2, 'Adult', 4.35);

INSERT INTO tickets2 (zone, pass_type, price) VALUES
    (2, 'Compass Card', 3.35);

INSERT INTO route2 (start_station, end_station, route_length) VALUES
	('168 St', 'Surrey Central Station', 14);

INSERT INTO route2 (start_station, end_station, route_length) VALUES
	('Joyce Station', 'UBC Exchange', 18);

INSERT INTO route2 (start_station, end_station, route_length) VALUES
    ('Commercial Broadway Station', 'UBC Exchange', 40);

INSERT INTO route2 (start_station, end_station, route_length) VALUES
    ('Metrotown Station', 'UBC Exchange', 48);

INSERT INTO route2 (start_station, end_station, route_length) VALUES
    ('Langley Centre', 'Surrey Central Station', 29);

INSERT INTO route2 (start_station, end_station, route_length) VALUES
    ('Vaughan Metropolitan Centre', 'Finch', 29);

INSERT INTO route2 (start_station, end_station, route_length) VALUES
    ('Pearson Airport', 'Kennedy', 29);

INSERT INTO route2 (start_station, end_station, route_length) VALUES
    ('Shephard Yonge', 'Don Mills', 29);
    
INSERT INTO route3 (route_name, ts_name, ts_city, start_station, end_station, num_vehicles_running) VALUES
	('337', 'Translink', 'Vancouver', '168 St', 'Surrey Central Station', 3);

INSERT INTO route3 (route_name, ts_name, ts_city, start_station, end_station, num_vehicles_running) VALUES
    ('R4', 'Translink', 'Vancouver', 'Joyce Station', 'UBC Exchange', 29);

INSERT INTO route3 (route_name, ts_name, ts_city, start_station, end_station, num_vehicles_running) VALUES
    ('99B', 'Translink', 'Vancouver', 'Commercial Broadway Station', 'UBC Exchange', 20);

INSERT INTO route3 (route_name, ts_name, ts_city, start_station, end_station, num_vehicles_running) VALUES
    ('49', 'Translink', 'Vancouver', 'Metrotown Station', 'UBC Exchange', 34);

INSERT INTO route3 (route_name, ts_name, ts_city, start_station, end_station, num_vehicles_running) VALUES
    ('502', 'Translink', 'Vancouver', 'Langley Centre', 'Surrey Central Station', 9);

INSERT INTO route3 (route_name, ts_name, ts_city, start_station, end_station, num_vehicles_running) VALUES
    ('1', 'TTC', 'Toronto', 'Vaughan Metropolitan Centre', 'Finch', 14);

INSERT INTO route3 (route_name, ts_name, ts_city, start_station, end_station, num_vehicles_running) VALUES
    ('2', 'TTC', 'Toronto', 'Pearson Airport', 'Kennedy', 21);

INSERT INTO route3 (route_name, ts_name, ts_city, start_station, end_station, num_vehicles_running) VALUES
    ('4', 'TTC', 'Toronto', 'Shephard Yonge', 'Don Mills', 10);
    
INSERT INTO route4 (num_vehicles_running, vehicle_interval) VALUES
	(3, 30);

INSERT INTO route4 (num_vehicles_running, vehicle_interval) VALUES
    (29, 4);

INSERT INTO route4 (num_vehicles_running, vehicle_interval) VALUES
    (20, 5);

INSERT INTO route4 (num_vehicles_running, vehicle_interval) VALUES
    (34, 5);

INSERT INTO route4 (num_vehicles_running, vehicle_interval) VALUES
	(9, 15);

INSERT INTO route4 (num_vehicles_running, vehicle_interval) VALUES
    (34, 5);

INSERT INTO route4 (num_vehicles_running, vehicle_interval) VALUES
	(9, 15);

INSERT INTO route4 (num_vehicles_running, vehicle_interval) VALUES
	(14, 5);

INSERT INTO route4 (num_vehicles_running, vehicle_interval) VALUES
	(21, 3);

INSERT INTO route4 (num_vehicles_running, vehicle_interval) VALUES
	(10, 10);
    
INSERT INTO stops (stop_name, text_code) VALUES
	('UBC Exchange', '12349 R4');

INSERT INTO stops (stop_name, text_code) VALUES
    ('Joyce Station', '38217 R4');

INSERT INTO stops (stop_name, text_code) VALUES
    ('Metrotown Station', '43816 49');

INSERT INTO stops (stop_name, text_code) VALUES
    ('Guildford Exchange', '48890 337');

INSERT INTO stops (stop_name, text_code) VALUES
    ('Langley Centre', '68046 502');
    
INSERT INTO goes_through (stop_name, route_name) VALUES
	('UBC Exchange', 'R4');

INSERT INTO goes_through (stop_name, route_name) VALUES
    ('Joyce Station', 'R4');

INSERT INTO goes_through (stop_name, route_name) VALUES
    ('Metrotown Station', 'R4');

INSERT INTO goes_through (stop_name, route_name) VALUES
    ('Guildford Exchange', 'R4');

INSERT INTO goes_through (stop_name, route_name) VALUES
    ('Langley Centre', 'R4');

INSERT INTO goes_through (stop_name, route_name) VALUES
	('UBC Exchange', '49');

INSERT INTO goes_through (stop_name, route_name) VALUES
    ('Joyce Station', '49');

INSERT INTO goes_through (stop_name, route_name) VALUES
    ('Metrotown Station', '49');

INSERT INTO goes_through (stop_name, route_name) VALUES
    ('Guildford Exchange', '49');

INSERT INTO goes_through (stop_name, route_name) VALUES
    ('Langley Centre', '49');

INSERT INTO goes_through (stop_name, route_name) VALUES
    ('Guildford Exchange', '337');

INSERT INTO goes_through (stop_name, route_name) VALUES
    ('UBC Exchange', '99B');
    
INSERT INTO vehicle (serial_num, year_produced, number_of_seats, passenger_capacity) VALUES
	(1, TO_DATE('2017', 'YYYY'), 34, 48);

INSERT INTO vehicle (serial_num, year_produced, number_of_seats, passenger_capacity) VALUES
    (2, TO_DATE('2015', 'YYYY'), 32, 39);

INSERT INTO vehicle (serial_num, year_produced, number_of_seats, passenger_capacity) VALUES
    (3, TO_DATE('1998', 'YYYY'), 20, 29);

INSERT INTO vehicle (serial_num, year_produced, number_of_seats, passenger_capacity) VALUES
    (4, TO_DATE('2019', 'YYYY'), 50, 61);

INSERT INTO vehicle (serial_num, year_produced, number_of_seats, passenger_capacity) VALUES
    (5, TO_DATE('2015', 'YYYY'), 32, 39);

INSERT INTO vehicle (serial_num, year_produced, number_of_seats, passenger_capacity) VALUES
	(6, TO_DATE('2017', 'YYYY'), 50, 90);

INSERT INTO vehicle (serial_num, year_produced, number_of_seats, passenger_capacity) VALUES
    (7, TO_DATE('2015', 'YYYY'), 50, 80);

INSERT INTO vehicle (serial_num, year_produced, number_of_seats, passenger_capacity) VALUES
    (8, TO_DATE('2009', 'YYYY'), 30, 45);

INSERT INTO vehicle (serial_num, year_produced, number_of_seats, passenger_capacity) VALUES
    (9, TO_DATE('2019', 'YYYY'), 70, 100);

INSERT INTO vehicle (serial_num, year_produced, number_of_seats, passenger_capacity) VALUES
    (10, TO_DATE('2015', 'YYYY'), 50, 80);
    
INSERT INTO uses (route_name, vehicle_num) VALUES
	('R4', 1);

INSERT INTO uses (route_name, vehicle_num) VALUES
    ('49', 1);

INSERT INTO uses (route_name, vehicle_num) VALUES
    ('337', 3);

INSERT INTO uses (route_name, vehicle_num) VALUES
    ('502', 2);

INSERT INTO uses (route_name, vehicle_num) VALUES
    ('99B', 5);
    
INSERT INTO subway_vehicles1 (serial_num, train_type) VALUES
	(6, 'Mark I');

INSERT INTO subway_vehicles1 (serial_num, train_type) VALUES
    (7, 'Mark I');

INSERT INTO subway_vehicles1 (serial_num, train_type) VALUES
    (8, 'Mark IV');

INSERT INTO subway_vehicles1 (serial_num, train_type) VALUES
    (9, 'Mark II');

INSERT INTO subway_vehicles1 (serial_num, train_type) VALUES
    (10, 'Mark IV');
    
INSERT INTO subway_vehicles2 (train_type, number_of_carts) VALUES
	('Mark I', 3);

INSERT INTO subway_vehicles2 (train_type, number_of_carts) VALUES
    ('Mark II', 3);

INSERT INTO subway_vehicles2 (train_type, number_of_carts) VALUES
    ('Mark III', 4);

INSERT INTO subway_vehicles2 (train_type, number_of_carts) VALUES
    ('Mark IV', 6);

INSERT INTO subway_vehicles2 (train_type, number_of_carts) VALUES
    ('Mark X', 7);
    
INSERT INTO bus_vehicles (serial_num, bus_type) VALUES
	(1, 'Enviro500');

INSERT INTO bus_vehicles (serial_num, bus_type) VALUES
    (2, 'Enviro500');

INSERT INTO bus_vehicles (serial_num, bus_type) VALUES
    (3, 'Trident III');

INSERT INTO bus_vehicles (serial_num, bus_type) VALUES
    (4, 'LFS');

INSERT INTO bus_vehicles (serial_num, bus_type) VALUES
    (5, 'Enviro500');
    
INSERT INTO driver2 (license_class, years_of_experience, insurance_coverage) VALUES
	(2, 2 , 9);

INSERT INTO driver2 (license_class, years_of_experience, insurance_coverage) VALUES
    (2, 6, 2);

INSERT INTO driver2 (license_class, years_of_experience, insurance_coverage) VALUES
    (4, 0, 0);

INSERT INTO driver2 (license_class, years_of_experience, insurance_coverage) VALUES
    (1, 5, 10);

INSERT INTO driver2 (license_class, years_of_experience, insurance_coverage) VALUES
    (1, 2, 13);

INSERT INTO driver2 (license_class, years_of_experience, insurance_coverage) VALUES
    (1, 30, 100);

INSERT INTO driver2 (license_class, years_of_experience, insurance_coverage) VALUES
    (4, 2, 2);

INSERT INTO driver2 (license_class, years_of_experience, insurance_coverage) VALUES
    (2, 30, 80);

INSERT INTO driver2 (license_class, years_of_experience, insurance_coverage) VALUES
    (4, 5, 8);

INSERT INTO driver2 (license_class, years_of_experience, insurance_coverage) VALUES
    (2, 5, 8);
    
INSERT INTO driver3 (employee_id, ts_name, ts_city, date_employed, driver_name, license_class, years_of_experience) VALUES
	('i3n5m3h8d2', 'Translink', 'Vancouver', CURRENT_TIMESTAMP, 'Tom Holland', 2, 2);

INSERT INTO driver3 (employee_id, ts_name, ts_city, date_employed, driver_name, license_class, years_of_experience) VALUES
    ('i3n5m3n6n1', 'Translink', 'Vancouver', TO_DATE('121820', 'MMDDYY'), 'Chris Ronald', 2, 6);

INSERT INTO driver3 (employee_id, ts_name, ts_city, date_employed, driver_name, license_class, years_of_experience) VALUES
    ('n4m3g4b1u5', 'Translink', 'Vancouver', TO_DATE('051921', 'MMDDYY'), 'John Maguire', 4, 0);

INSERT INTO driver3 (employee_id, ts_name, ts_city, date_employed, driver_name, license_class, years_of_experience) VALUES
    ('h1m3n8p1n4', 'Translink', 'Vancouver', TO_DATE('090920', 'MMDDYY'), 'Virgil Anderson', 1, 5);

INSERT INTO driver3 (employee_id, ts_name, ts_city, date_employed, driver_name, license_class, years_of_experience) VALUES
    ('n3m1m9v6y4', 'Translink', 'Vancouver', TO_DATE('100919', 'MMDDYY'), 'Mike Eriksen', 1, 2);

INSERT INTO driver3 (employee_id, ts_name, ts_city, date_employed, driver_name, license_class, years_of_experience) VALUES
    ('n3m1m8v6y4', 'Translink', 'Vancouver', TO_DATE('010101', 'MMDDYY'), 'Beyonce Knowles', 1, 30);

INSERT INTO driver3 (employee_id, ts_name, ts_city, date_employed, driver_name, license_class, years_of_experience) VALUES
    ('n3m1m7v6y4', 'Translink', 'Vancouver', TO_DATE('070122', 'MMDDYY'), 'Dwayne Johnson', 4, 2);

INSERT INTO driver3 (employee_id, ts_name, ts_city, date_employed, driver_name, license_class, years_of_experience) VALUES
    ('n3m1a9v6y4', 'Translink', 'Vancouver', TO_DATE('080105', 'MMDDYY'), 'Taylor Swift', 4, 30);

INSERT INTO driver3 (employee_id, ts_name, ts_city, date_employed, driver_name, license_class, years_of_experience) VALUES
    ('n3m169v6y4', 'Translink', 'Vancouver', TO_DATE('061017', 'MMDDYY'), 'Michelle Obama', 4, 5);

INSERT INTO driver3 (employee_id, ts_name, ts_city, date_employed, driver_name, license_class, years_of_experience) VALUES
    ('n341m9v6y4', 'Translink', 'Vancouver', TO_DATE('051017', 'MMDDYY'), 'Ariana Grande', 2, 5);
    
INSERT INTO driver4 (date_employed, salary) VALUES
	(CURRENT_TIMESTAMP, 30000);

INSERT INTO driver4 (date_employed, salary) VALUES
    (TO_DATE('121820', 'MMDDYY'), 40000);

INSERT INTO driver4 (date_employed, salary) VALUES
    (TO_DATE('051921', 'MMDDYY'), 35000);

INSERT INTO driver4 (date_employed, salary) VALUES
    (TO_DATE('090920', 'MMDDYY'), 40000);

INSERT INTO driver4 (date_employed, salary) VALUES
    (TO_DATE('100919', 'MMDDYY'), 45000);

INSERT INTO driver4 (date_employed, salary) VALUES
    (TO_DATE('010101', 'MMDDYY'), 250000);

INSERT INTO driver4 (date_employed, salary) VALUES
    (TO_DATE('070122', 'MMDDYY'), 32500);

INSERT INTO driver4 (date_employed, salary) VALUES
    (TO_DATE('080105', 'MMDDYY'), 150000);

INSERT INTO driver4 (date_employed, salary) VALUES
    (TO_DATE('051017', 'MMDDYY'), 100000);

INSERT INTO driver4 (date_employed, salary) VALUES
    (TO_DATE('061017', 'MMDDYY'), 100000);

    
INSERT INTO operator1 (employee_id, control_room_id, years_of_experience, ts_name, ts_city, operator_name, date_employed) VALUES
	('poida35423', 1, 0, 'Translink', 'Vancouver', 'James Mann', CURRENT_TIMESTAMP);

INSERT INTO operator1 (employee_id, control_room_id, years_of_experience, ts_name, ts_city, operator_name, date_employed) VALUES
    ('pvpiq69498', 1, 3, 'Translink', 'Vancouver', 'John Dias', TO_DATE('121820', 'MMDDYY'));

INSERT INTO operator1 (employee_id, control_room_id, years_of_experience, ts_name, ts_city, operator_name, date_employed) VALUES
    ('pasdp45198', 1, 0, 'Translink', 'Vancouver', 'John Leno', TO_DATE('061823', 'MMDDYY'));

INSERT INTO operator1 (employee_id, control_room_id, years_of_experience, ts_name, ts_city, operator_name, date_employed) VALUES
    ('pefjn81534', 1, 2, 'Translink', 'Vancouver', 'Martin De Jong', TO_DATE('090920', 'MMDDYY'));

INSERT INTO operator1 (employee_id, control_room_id, years_of_experience, ts_name, ts_city, operator_name, date_employed) VALUES
    ('qioca48902', 4, 1, 'Translink', 'Vancouver', 'Sergei Jovic', TO_DATE('011922', 'MMDDYY'));
    
INSERT INTO operator2(date_employed, salary) VALUES
	(CURRENT_TIMESTAMP, 40000);

INSERT INTO operator2(date_employed, salary) VALUES
    (TO_DATE('121820', 'MMDDYY'), 50000);

INSERT INTO operator2(date_employed, salary) VALUES
    (TO_DATE('061823', 'MMDDYY'), 41000);

INSERT INTO operator2(date_employed, salary) VALUES
    (TO_DATE('090920', 'MMDDYY'), 80000);

INSERT INTO operator2(date_employed, salary) VALUES
    (TO_DATE('011922', 'MMDDYY'), 48100);
    
INSERT INTO transit_account (account_number, address, phone_number, email, passenger_name, ts_name, ts_city) VALUES
	(1, '3419 Coronation St', 8127782, 'js@gmail.com', 'John Stones', 'Translink', 'Vancouver');

INSERT INTO transit_account (account_number, address, phone_number, email, passenger_name, ts_name, ts_city) VALUES
    (2, '9083 123 Ave', 9081381, 'ld@gmail.com', 'Luis Diaz', 'Translink', 'Vancouver');

INSERT INTO transit_account (account_number, address, phone_number, email, passenger_name, ts_name, ts_city) VALUES
    (3, '13248 23 Ave', 5640894, 'pf@gmail.com', 'Phil Foden', 'Translink', 'Vancouver');

INSERT INTO transit_account (account_number, address, phone_number, email, passenger_name, ts_name, ts_city) VALUES
    (4, '13229 23 Ave', 1980210, 'mr@gmail.com', 'Marcus Rashford', 'Translink', 'Vancouver');

INSERT INTO transit_account (account_number, address, phone_number, email, passenger_name, ts_name, ts_city) VALUES
    (5, '14392 Oak St', 1370919, 'mm@gmail.com', 'Mason Mount', 'Translink', 'Vancouver');

INSERT INTO transit_account (account_number, address, phone_number, email, passenger_name, ts_name, ts_city) VALUES
	(6, '231 Potato st', 1111111, 'xd@gmail.com', 'Bob Shows', 'Translink', 'Vancouver');

INSERT INTO transit_account (account_number, address, phone_number, email, passenger_name, ts_name, ts_city) VALUES
    (7, '111 Eleven Ave', 2222222, 'ee@gmail.com', 'John Doe', 'Translink', 'Vancouver');

INSERT INTO transit_account (account_number, address, phone_number, email, passenger_name, ts_name, ts_city) VALUES
    (8, '935 Group Ave', 1151115, 'asdasd@gmail.com', 'Ludwig Maxis', 'Translink', 'Vancouver');

INSERT INTO transit_account (account_number, address, phone_number, email, passenger_name, ts_name, ts_city) VALUES
    (9, '1932 Royal Ave', 4215212, 'rjo@gmail.com', 'Robert Oppenheimer', 'TTC', 'Toronto');

INSERT INTO transit_account (account_number, address, phone_number, email, passenger_name, ts_name, ts_city) VALUES
    (10, '1231 Test Ave', 9753123, 'ae@gmail.com', 'Albert Einstein', 'TTC', 'Toronto');
    
INSERT INTO bus_card (card_number, balance, card_type, transit_account_num) VALUES
	(1, 0, 'Adult', 1);

INSERT INTO bus_card (card_number, balance, card_type, transit_account_num) VALUES
    (2, 5.90, 'Child', 2);

INSERT INTO bus_card (card_number, balance, card_type, transit_account_num) VALUES
    (3, 300.10, 'Adult', 3);

INSERT INTO bus_card (card_number, balance, card_type, transit_account_num) VALUES
    (4, 4.10, 'Adult', 4);

INSERT INTO bus_card (card_number, balance, card_type, transit_account_num) VALUES
    (5, 12.70, 'Adult', 5);

INSERT INTO bus_card (card_number, balance, card_type, transit_account_num) VALUES
    (6, 9.2, 'Child', 6);

INSERT INTO bus_card (card_number, balance, card_type, transit_account_num) VALUES
    (7, 1, 'Accessibility', 7);

INSERT INTO bus_card (card_number, balance, card_type, transit_account_num) VALUES
    (8, 42.2, 'Senior', 8);

INSERT INTO bus_card (card_number, balance, card_type, transit_account_num) VALUES
    (9, 32.1, 'Senior', 9);

INSERT INTO bus_card (card_number, balance, card_type, transit_account_num) VALUES
    (10, 9, 'Accessibility', 10);

    
INSERT INTO offers (card_number, student_num, institution) VALUES
	(1, 21938470, 'University of British Columbia');

INSERT INTO offers (card_number, student_num, institution) VALUES
    (2, 54069408, 'University of British Columbia');

INSERT INTO offers (card_number, student_num, institution) VALUES
    (3, 35804083, 'Langara College');

INSERT INTO offers (card_number, student_num, institution) VALUES
    (4, 68468405, 'Simon Fraser University');