/*****************************************
* Create the team5_ACME_database
*****************************************/
DROP DATABASE IF EXISTS team5_ACME_database;
CREATE DATABASE team5_ACME_database;
USE team5_ACME_database;  -- MySQL command

-- Creates the my_employees table.
CREATE TABLE my_employees (
  email       VARCHAR(255)      NOT NULL,
  password    VARCHAR(255)   	NOT NULL,
  first_name  VARCHAR(255) 		NOT NULL,
  last_name   VARCHAR(255) 		NOT NULL,
  address	  VARCHAR(20)	    NOT NULL,
  PRIMARY KEY (email)
);

-- Creates the my_projects table.
CREATE TABLE my_projects (
  project_ID	  INT           NOT NULL  AUTO_INCREMENT,
  project_name    VARCHAR(255)  NOT NULL,
  PRIMARY KEY (project_ID)
);

-- Creates the my_cost_categories table.
CREATE TABLE my_cost_categories (
  cc_ID	     INT              NOT NULL  AUTO_INCREMENT,
  cc_name    VARCHAR(255)     NOT NULL,
  PRIMARY KEY (cc_ID)
);

-- Create the users and grant privileges to those users.
CREATE USER kermit@localhost
IDENTIFIED BY 'sesame';

GRANT SELECT, INSERT, DELETE, UPDATE
ON my_employees
TO kermit@localhost
IDENTIFIED BY 'sesame';

GRANT SELECT, INSERT, DELETE, UPDATE
ON my_projects
TO kermit@localhost
IDENTIFIED BY 'sesame';

GRANT SELECT, INSERT, DELETE, UPDATE
ON my_cost_categories
TO kermit@localhost
IDENTIFIED BY 'sesame';

