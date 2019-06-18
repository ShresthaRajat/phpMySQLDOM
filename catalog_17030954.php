<?php
	//Creating connection to the database
	$conn = new mysqli("localhost", "root", "", "catalog_17030954");
	
	//Checking Connection to continue or to terminate
	if ($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}
	
	// Intilizing xml structure
	$xml = new DomDocument('1.0','utf-8');
	$xml ->formatOutput=true;

	// Adding stylesheet reference
	$css = $xml->createProcessingInstruction('xml-stylesheet', 'type="text/css" href="catalog_17030954.css"');
	$xml->appendChild($css);

	// Adding root element
	$company = $xml->createElement("company");
	$xml->appendChild($company);
	
	// Company Details and CEO info
	$company_details=$xml->createElement("company_details");
	$company->appendChild($company_details);
	$company_url=$xml->createElement("company_url", "www.BlazingComet.com");
	$company_name=$xml->createElement("company_name", "Blazing Comet Corp.");
	$company_location=$xml->createElement("company_location", "Kathmandu");
	$company_logo=$xml->createElement("company_logo");
	$company_details->appendChild($company_url);
	$company_details->appendChild($company_name);
	$company_details->appendChild($company_location);
	$company_phone_number=$xml->createElement("company_phone_number", "9842998738");
	$company_details->appendChild($company_phone_number);
	$company_phone_number=$xml->createElement("company_phone_number", "9842998711");
	$company_details->appendChild($company_phone_number);
	$company_details->appendChild($company_logo);
	$ceo=$xml->createElement("ceo");
	$company->appendChild($ceo);
	$ceo->appendChild($xml->createElement("ceo_name", "Rajat Shrestha"));
	$ceo->appendChild($xml->createElement("ceo_phone", "982749823"));
	$ceo->appendChild($xml->createElement("ceo_address", "Samakhushi"));

	
	// Adding Departments 
	$company_departments=$xml->createElement("departments");
	$company->appendChild($company_departments);

	$department_information_sql = "SELECT * FROM departments";
	$query_department_information_sql = $conn->query($department_information_sql);

	while ($row_dept = mysqli_fetch_assoc($query_department_information_sql)){
		if ($row_dept["department_id"] == 1 ) {
			$company_sub_departments=$xml->createElement("sub_departments");
			$company_departments->appendChild($company_sub_departments);
			$company_departments_supervisor=$xml->createElement("supervisor", "CEO");
			$company_sub_departments->appendChild($company_departments_supervisor);
		}
		elseif ($row_dept["department_id"] == 4) {
			$company_sub_departments=$xml->createElement("sub_departments");
			$company_departments->appendChild($company_sub_departments);
			$company_departments_supervisor=$xml->createElement("supervisor", "Project Manager");
			$company_sub_departments->appendChild($company_departments_supervisor);
		}
		$company_department=$xml->createElement("department");
		$company_department->setAttribute("department_id",$row_dept["department_id"]);
		if( $row_dept["department_lead"] != "") {
			$company_department->setAttribute("team_lead", $row_dept["department_lead"]);
		}
		$company_sub_departments->appendChild($company_department);

		$dept_name=$xml->createElement("department_name", $row_dept["department_name"]);			
		$dept_description=$xml->createElement("department_description", $row_dept["department_description"]);

		$company_department->appendChild($dept_name);
		$company_department->appendChild($dept_description);

		// Adding brief employee description in their respective departments
		$employees_information_sql = "SELECT * FROM employees";
		$query_employees_information_sql = $conn->query($employees_information_sql);

		$company_department_employees=$xml->createElement("emps");
		$company_department->appendChild($company_department_employees);
		while ($row_emp = mysqli_fetch_assoc($query_employees_information_sql)){
			if ($row_dept["department_name"] == $row_emp["employee_department"]) {
				if($row_dept["department_lead"] == $row_emp["employee_name"]){
					$emp=$xml->createElement("led");
					$company_department_employees->appendChild($emp);
				}
				else{
					$emp=$xml->createElement("emp");
					$company_department_employees->appendChild($emp);
				}
				$name = $row_emp["employee_name"];
				$first_name = trim(strtok($name, ' '));

				$emp_name=$xml->createElement("emp_name", $first_name);
				$emp->appendChild($emp_name);
				$emp_type=$xml->createElement("emp_type", $row_emp["employee_type"]);
				$emp->appendChild($emp_type);
			}
		}
	}

	// Adding Detailed Employees
	$employees_information_sql = "SELECT * FROM employees";
	$query_employees_information_sql = $conn->query($employees_information_sql);

	$company_employees=$xml->createElement("employees");
	$company->appendChild($company_employees);
	while ($row = mysqli_fetch_assoc($query_employees_information_sql)){
		$company_employee=$xml->createElement("employee");
		$company_employee->setAttribute("employee_department",$row["employee_department"]);
		$company_employees->appendChild($company_employee);

		$employee_name=$xml->createElement("employee_name", $row["employee_name"]);		
		$employee_address=$xml->createElement("employee_address", $row["employee_address"]);	
		$employee_phone=$xml->createElement("employee_phone", $row["employee_phone"]);
		
		
		$employee_type=$xml->createElement("employee_type", $row["employee_type"]);
		$employee_department=$xml->createElement("employee_department", $row["employee_department"]);
		

		$company_employee->appendChild($employee_name);
		$company_employee->appendChild($employee_address);
		$company_employee->appendChild($employee_phone);
		if($row["employee_email"] != ""){
			$employee_email=$xml->createElement("employee_email", $row["employee_email"]);
			$company_employee->appendChild($employee_email);
		}
		
		$company_employee->appendChild($employee_type);
		$company_employee->appendChild($employee_department);
	}	

	echo "<xmp>" . $xml->saveXML() . "</xmp>";
	$xml->save('catalog_17030954.xml');
	//save XML as a file
?>


																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																		