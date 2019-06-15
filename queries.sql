CREATE DATABASE db;
USE db;
-- database with required fields for the php xml generation

CREATE TABLE departments(
	department_id INT PRIMARY KEY, 
	department_name VARCHAR(100), 
	department_description VARCHAR(100),
	department_lead VARCHAR(100)
);

CREATE TABLE employees(
	employee_id INT NOT NULL AUTO_INCREMENT,
	employee_department VARCHAR(100),
	employee_name VARCHAR(100), 
	employee_address VARCHAR(100), 
	employee_phone INT, 
	employee_email VARCHAR(100), 
	employee_type VARCHAR(100),
	PRIMARY KEY (employee_id)
);

-- dummy data
INSERT INTO departments values(1, "Research and Development", "To discover new tech which will make your life easier.", "");
INSERT INTO departments values(2, "Marketing", "To convey our ideas to you by showcasing our products.", "");
INSERT INTO departments values(3, "Human Resource Department", "Our Hire and Fire Department to oversee our employees", "");
INSERT INTO departments values(4, "Mobile Development", "Products for mobile Devices (IOS and Android).", "Pranaya Pradhan");
INSERT INTO departments values(5, "Web Development", "Department to create Websites and web stuffs.", "Anu Bajracharya");

INSERT INTO employees (employee_department, employee_name, employee_address, employee_phone, employee_email, employee_type) 
values("Research and Development", "Rajat Shrestha", "Samakhushi", 986312634, "kasudyy@gmail.com", "Researcher");
INSERT INTO employees (employee_department, employee_name, employee_address, employee_phone, employee_email, employee_type) 
values("Research and Development", "Tejan Malla", "Koteswor", 986312634, "tejan@gmail.com", "Developer");
INSERT INTO employees (employee_department, employee_name, employee_address, employee_phone, employee_email, employee_type) 
values("Research and Development", "Nikolas Shrestha", "Tokyo", 986312634, "niko@gmail.com", "Jr. Developer");
INSERT INTO employees (employee_department, employee_name, employee_address, employee_phone, employee_email, employee_type) 
values("Marketing", "Sonya Khadka", "Maitidevi", 9863122342, "sonya@gmail.com", "Marketing Girl");
INSERT INTO employees (employee_department, employee_name, employee_address, employee_phone, employee_email, employee_type) 
values("Marketing", "Sagar Shakya", "Koteswor", 986312634, "sagar@gmail.com", "Marketing Boy");
INSERT INTO employees (employee_department, employee_name, employee_address, employee_phone, employee_email, employee_type) 
values("Human Resource Department", "Reisa Shakya", "Samakhushi", 986312634, "rrr@gmail.com", "HR Manager");
INSERT INTO employees (employee_department, employee_name, employee_address, employee_phone, employee_email, employee_type) 
values("Mobile Development", "George Maharjan", "Pepsicola", 986312634, "george@gmail.com", "Kotlin Developer");
INSERT INTO employees (employee_department, employee_name, employee_address, employee_phone, employee_email, employee_type) 
values("Web Development", "Aastha Pradhan", "Patan", 986312634, "aastha@gmail.com", "Front End Developer");
INSERT INTO employees (employee_department, employee_name, employee_address, employee_phone, employee_email, employee_type) 
values("Web Development", "Anu Bajracharya", "Thamel", 986312634, "", "UI/UX Designer");
INSERT INTO employees (employee_department, employee_name, employee_address, employee_phone, employee_email, employee_type) 
values("Mobile Development", "Pranaya Pradhan", "Thamel", 986312634, "", "Project Manager");
INSERT INTO employees (employee_department, employee_name, employee_address, employee_phone, employee_email, employee_type) 
values("Web Development", "Subkshya Pradhan", "Pepsicola", 986312634, "", "Back End Developer");