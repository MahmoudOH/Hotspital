create table department (
  id int primary key auto_increment,
  name varchar(100) unique not null
);
insert into department (name)
values ('Reception'),
  ('Doctors'),
  ('Finance'),
  ('Pharmacist'),
  ('Administration');
create table employee (
  id int primary key auto_increment,
  full_name varchar(100) not null,
  username varchar(100) unique not null,
  pass varchar(100) not null,
  dept_id int,
  FOREIGN KEY (dept_id) REFERENCES department(id)
);

DELIMITER // CREATE TRIGGER encrypt_password BEFORE
INSERT ON employee FOR EACH ROW BEGIN
SET NEW.pass = SHA2(CONCAT('SecretSalt', NEW.pass), 256);
END // DELIMITER;

INSERT INTO employee (full_name, username, pass, dept_id)
VALUES ('John Smith', 'john.smith', 'mypassword1', 1),
  (
    'Michael John',
    'michael.john',
    'password123',
    1
  ),
  ('John Doe', 'john.doe', 'abc123', 2),
  ('Alice Smith', 'alice.smith', 'def456', 2),
  (
    'Michael Johnson',
    'michael.johnson',
    'ghi789',
    2
  ),
  ('Emily Brown', 'emily.brown', 'jkl012', 2),
  ('Daniel Davis', 'daniel.davis', 'mno345', 2),
  ('Olivia Taylor', 'olivia.taylor', 'pqr678', 2),
  ('James Wilson', 'james.wilson', 'stu901', 2),
  (
    'Sophia Anderson',
    'sophia.anderson',
    'vwx234',
    2
  ),
  (
    'Alexander Clark',
    'alexander.clark',
    'yz0123',
    2
  ),
  ('Emma Martinez', 'emma.martinez', '456abc', 2),
  ('Emily Davis', 'emily.davis', 'securepass1', 3),
  (
    'Christopher Lee',
    'christopher.lee',
    'password456',
    3
  ),
  (
    'Jennifer Brown',
    'jennifer.brown',
    'mypassword2',
    4
  ),
  ('Sarah Thompson', 'sarah.thompson', 'abcxyz', 5);
create table medicine (
  id int primary key auto_increment,
  name varchar(100) not null,
  price double(10, 2) not null,
  quantity int not null default 0
);
INSERT INTO medicine (name, price)
VALUES ('Aspirin', 5.99),
  ('Paracetamol', 3.49),
  ('Ibuprofen', 4.99),
  ('Lisinopril', 8.99),
  ('Simvastatin', 10.49),
  ('Metformin', 6.99),
  ('Levothyroxine', 7.99),
  ('Amoxicillin', 9.99),
  ('Atorvastatin', 11.99),
  ('Omeprazole', 7.49),
  ('Cetirizine', 6.49),
  ('Naproxen', 8.49),
  ('Losartan', 9.49),
  ('Fluoxetine', 7.99),
  ('Ciprofloxacin', 10.99),
  ('Metoprolol', 6.49),
  ('Prednisone', 8.99),
  ('Azithromycin', 11.49),
  ('Hydrochlorothiazide', 7.49),
  ('Escitalopram', 9.99);
create table doctor_state (
  id int primary key auto_increment,
  name varchar(100) not null
);
INSERT INTO doctor_state (name)
values ('Available'),
  ('Busy');
create table doc_dept (
  id int primary key auto_increment,
  name varchar(100) unique not null
);
INSERT INTO doc_dept (name)
VALUES ('Cardiology'),
  ('Dermatology'),
  ('Endocrinology'),
  ('Gastroenterology'),
  ('Hematology'),
  ('Neurology');
create table doctor (
  emp_id int primary key,
  state_id int,
  doc_dept_id int,
  FOREIGN KEY (emp_id) REFERENCES employee(id),
  FOREIGN KEY (state_id) REFERENCES doctor_state(id),
  FOREIGN KEY (doc_dept_id) REFERENCES doc_dept(id)
);
INSERT into doctor (emp_id, state_id, doc_dept_id)
values 
  (2, 1, 1),
  (3, 1, 2),
  (4, 1, 3),
  (5, 1, 4),
  (6, 1, 5),
  (7, 1, 6),
  (8, 1, 6),
  (9, 1, 4),
  (10, 1, 5),
  (11, 1, 3);
create table patient (
  id int primary key auto_increment,
  gov_id varchar(9) unique not null CHECK (LENGTH(gov_id) = 9)
);
INSERT INTO patient (gov_id)
VALUES (846509273),
  (362541098),
  (975813246),
  (285410937),
  (701928365),
  (432095718),
  (609821354),
  (123456789),
  (987654321),
  (345678912),
  (768594021),
  (102938475),
  (219384756),
  (645823917),
  (876509134);
CREATE TABLE doctor_patients (
  doctor_id int,
  patient_id int,
  date_discharged DATETIME default null,
  primary key (doctor_id, patient_id),
  FOREIGN KEY (doctor_id) REFERENCES doctor(emp_id),
  FOREIGN KEY (patient_id) REFERENCES patient(id)
);
CREATE TABLE prescription (
  id int primary key auto_increment,
  doctor_id int,
  patient_id int,
  date DATETIME,
  details text,
  paid_at DATETIME default null,
  FOREIGN KEY (doctor_id) REFERENCES doctor(emp_id),
  FOREIGN KEY (patient_id) REFERENCES patient(id)
);
CREATE TABLE prescription_medicine (
  pres_id int,
  med_id int,
  quantity int not null default 1,
  FOREIGN KEY (pres_id) REFERENCES prescription(id),
  FOREIGN KEY (med_id) REFERENCES medicine(id)
);