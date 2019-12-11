CREATE DATABASE clothing_website collate uft8_bin;
GO

USE clothing_website;
GO

CREATE TABLE account
(
  username char(20) not null primary key,
  pass char(156) not null
);

CREATE TABLE staff_role (
  role_id INT PRIMARY KEY AUTO_INCREMENT,
  role_name text not null
);

CREATE TABLE staff_action (
  action_id INT PRIMARY KEY AUTO_INCREMENT,
  action_name text not null,
  action_code char
(20)
);

CREATE TABLE product_type (
  prod_type_id INT PRIMARY KEY AUTO_INCREMENT,
  prod_name VARCHAR
(256) not null
);

CREATE TABLE size (
  size_id INT PRIMARY KEY AUTO_INCREMENT,
  size_name CHAR
(3) not null UNIQUE
);

CREATE TABLE staff_role_action
(
  role_id INT not null,
  action_id INT not null,
  PRIMARY KEY(role_id, action_id),
  CONSTRAINT fk_ra_role FOREIGN KEY (role_id) REFERENCES staff_role(role_id),
  CONSTRAINT fk_ra_action FOREIGN KEY (action_id) REFERENCES staff_action(action_id)
);

CREATE TABLE customer (
  customer_id INT PRIMARY KEY AUTO_INCREMENT,
  username char
(20) not null,
  customer_name varchar
(256) not null,
  phone char
(10) not null,
  customer_address text,
  CONSTRAINT fk_customer_acc FOREIGN KEY
(username) REFERENCES account
(username)
);

CREATE TABLE staff (
  staff_id INT PRIMARY KEY AUTO_INCREMENT,
  username char
(20) not null,
  role_id INT not null,
  staff_name varchar
(256) not null,
  day_of_birth DATE not null,
  staff_address text,
  phone char
(10) not null,
  started_date DATE not null,
  CONSTRAINT fk_staff_acc FOREIGN KEY
(username) REFERENCES account
(username),
  CONSTRAINT fk_staff_role FOREIGN KEY
(role_id) REFERENCES staff_role
(role_id)
);

CREATE TABLE product (
  product_id INT PRIMARY KEY AUTO_INCREMENT,
  product_name VARCHAR
(256) not null UNIQUE,
  product_type INT not null,
  product_pic VARCHAR
(256),
  product_description text,
  product_calc_unit char
(10),
  product_prize INT not null,
  product_amount INT not null,
  CONSTRAINT fk_product_type FOREIGN KEY
(product_type) REFERENCES product_type
(prod_type_id)
);

CREATE TABLE product_size
(
  product_id INT NOT NULL,
  size_id INT NOT NULL,
  amount INT,
  CONSTRAINT fk_ps_prod FOREIGN KEY (product_id) REFERENCES product(product_id),
  CONSTRAINT fk_ps_size FOREIGN KEY (size_id) REFERENCES size(size_id)
);

CREATE TABLE goods_received_bill (
  bill_id INT PRIMARY KEY AUTO_INCREMENT,
  staff_id INT NOT NULL,
  date_created DATETIME NOT NULL,
  bill_status CHAR
(10) NOT NULL,
  CONSTRAINT fk_grb_staff FOREIGN KEY
(staff_id) REFERENCES staff
(staff_id)
);

CREATE TABLE received_bill_details
(
  bill_id INT NOT NULL,
  product_id INT NOT NULL,
  amount INT NOT NULL,
  PRIMARY KEY(bill_id, product_id),
  CONSTRAINT fk_rbd_bill FOREIGN KEY (bill_id) REFERENCES goods_received_bill(bill_id),
  CONSTRAINT fk_rbd_product FOREIGN KEY (product_id) REFERENCES product(product_id)
);

CREATE TABLE invoice (
  invoice_id INT PRIMARY KEY AUTO_INCREMENT,
  date_created DATETIME NOT NULL,
  customer_id INT NOT NULL,
  invoice_status CHAR
(20),
  CONSTRAINT fk_invoice_customer FOREIGN KEY
(customer_id) REFERENCES customer
(customer_id)
);

CREATE TABLE invoice_details
(
  invoice_id INT NOT NULL,
  product_id INT NOT NULL,
  amount INT NOT NULL,
  PRIMARY KEY(invoice_id, product_id),
  CONSTRAINT fk_invdetail_invoice FOREIGN KEY (invoice_id) REFERENCES invoice(invoice_id),
  CONSTRAINT fk_invdetail_product FOREIGN KEY (product_id) REFERENCES product(product_id)
);

INSERT INTO account
VALUES
  ("admin", "12345");

INSERT INTO staff_role
  (role_name)
VALUES
  ("admin");
INSERT INTO staff_role
  (role_name)
VALUES
  ("staff");

INSERT INTO staff_action
  (action_name, action_code)
VALUES
  ("Create Account", "CREATE_ACC");
INSERT INTO staff_action
  (action_name, action_code)
VALUES
  ("Edit Account", "EDIT_ACC");
INSERT INTO staff_action
  (action_name, action_code)
VALUES
  ("Delete Account", "DEL_ACC");
INSERT INTO staff_action
  (action_name, action_code)
VALUES
  ("Edit role", "EDIT_ROLE");
INSERT INTO staff_action
  (action_name, action_code)
VALUES
  ("Delete role", "DEL_ROLE");
INSERT INTO staff_action
  (action_name, action_code)
VALUES
  ("Create product", "CREATE_PROD");
INSERT INTO staff_action
  (action_name, action_code)
VALUES
  ("Edit product", "EDIT_PROD");
INSERT INTO staff_action
  (action_name, action_code)
VALUES
  ("Delete Product", "DEL_PROD");
INSERT INTO staff_action
  (action_name, action_code)
VALUES
  ("Print Bill", "PRINT_BILL");
INSERT INTO staff_action
  (action_name, action_code)
VALUES
  ("Create good received bill Management", "CREATE_GRB");
INSERT INTO staff_action
  (action_name, action_code)
VALUES
  ("Edit good received bill Management", "EDIT_GRB");
INSERT INTO staff_action
  (action_name, action_code)
VALUES
  ("Delete good received bill Management", "DEL_GRB");

INSERT INTO staff_role_action
VALUES
  (1, 1);
INSERT INTO staff_role_action
VALUES
  (1, 2);
INSERT INTO staff_role_action
VALUES
  (1, 3);
INSERT INTO staff_role_action
VALUES
  (1, 4);
INSERT INTO staff_role_action
VALUES
  (1, 5);
INSERT INTO staff_role_action
VALUES
  (1, 6);
INSERT INTO staff_role_action
VALUES
  (1, 7);
INSERT INTO staff_role_action
VALUES
  (1, 8);
INSERT INTO staff_role_action
VALUES
  (1, 9);
INSERT INTO staff_role_action
VALUES
  (1, 10);
INSERT INTO staff_role_action
VALUES
  (1, 11);
INSERT INTO staff_role_action
VALUES
  (1, 12);

INSERT INTO size
  (size_name)
VALUES
  ('S');
INSERT INTO size
  (size_name)
VALUES
  ('M');
INSERT INTO size
  (size_name)
VALUES
  ('L');
INSERT INTO size
  (size_name)
VALUES
  ('XL');
INSERT INTO size
  (size_name)
VALUES
  ('XXL');

INSERT INTO product_type
  (prod_name)
VALUES
  ('Áo');
INSERT INTO product_type
  (prod_name)
VALUES
  ('Quần');
INSERT INTO product_type
  (prod_name)
VALUES
  ('Váy / Đầm');