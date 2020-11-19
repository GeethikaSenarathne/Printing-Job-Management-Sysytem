<?php session_start();

$servername = "166.62.8.53";
$username = "misweb1";
$password = "Kiribath@2018";
$dbname = "misweb1";

// Create connection
$conn = mysqli_connect("166.62.8.53", "misweb1", "Kiribath@2018", "misweb1");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$x = 0;
$_SESSION["national_id_or_passport"] = $_POST["national_id_or_passport"];
$x=$_SESSION["national_id_or_passport"];

$sql1 = "SELECT * FROM student WHERE national_id_or_passport = '".$x."'";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
    while($row = $result1->fetch_assoc()) {

	$_SESSION["student_id"] = $row["student_id"];
	$_SESSION["name_with_initial"] = $row["name_with_initial"];
	$_SESSION["full_name"] = $row["full_name"];
	$_SESSION["dob"] = $row["dob"];
	$_SESSION["personal_email"] = $row["personal_email"];
	$_SESSION["mobile_no"] = $row["mobile_no"];
	$_SESSION["home_no"] = $row["home_no"];
	$_SESSION["personal_address"] = $row["personal_address"];

     }
} else {
	$_SESSION["name_with_initial"] = "";
	$_SESSION["full_name"] = "";
	$_SESSION["dob"] = "";
	$_SESSION["personal_email"] = "";
	$_SESSION["mobile_no"] = "";
	$_SESSION["home_no"] = "";
	$_SESSION["personal_address"] = "";
}

$y =0;
$y=$_SESSION["student_id"];

$sql2 = "SELECT * FROM student_education WHERE student_id = '".$y."'";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    while($row = $result2->fetch_assoc()) {

    $_SESSION["degree_title"] = $row["degree_title"];
    $_SESSION["university"] = $row["university"];
    $_SESSION["year_of_award"] = $row["year_of_award"];
    $_SESSION["class_or_gpa"] = $row["class_or_gpa"];
    $_SESSION["study_period"] = $row["study_period"];
    $_SESSION["academic_transcript"] = $row["academic_transcript"];
    $_SESSION["degree_certificate"] = $row["degree_certificate"];

     }
} else {
	$_SESSION["degree_title"] = "";
	$_SESSION["university"] = "";
	$_SESSION["year_of_award"] = "";
	$_SESSION["class_or_gpa"] = "";
	$_SESSION["study_period"] = "";
	$_SESSION["academic_transcript"] = "";
	$_SESSION["degree_certificate"] = "";
}

$sql3 = "SELECT * FROM student_current_employment WHERE student_id = '".$y."'";
$result3 = $conn->query($sql3);

if ($result3->num_rows > 0) {
    while($row = $result3->fetch_assoc()) {

    $_SESSION["work_designation"] = $row["work_designation"];
    $_SESSION["work_organization"] = $row["work_organization"];
    $_SESSION["work_address"] = $row["work_address"];
    $_SESSION["work_from_date"] = $row["work_from_date"];
    $_SESSION["email"] = $row["email"];
    $_SESSION["office_phone"] = $row["office_phone"];
    $_SESSION["job_description"] = $row["job_description"];
    $_SESSION["correspondent_address"] = $row["correspondent_address"];

     }
} else {
	$_SESSION["work_designation"] = "";
	$_SESSION["work_organization"] = "";
	$_SESSION["work_address"] = "";
	$_SESSION["work_from_date"] = "";
	$_SESSION["email"] = "";
	$_SESSION["office_phone"] = "";
	$_SESSION["job_description"] = "";
	$_SESSION["correspondent_address"] = "";
}

$sql4 = "SELECT * FROM student_employment_record WHERE student_id = '".$y."'";
$result4 = $conn->query($sql4);

if ($result4->num_rows > 0) {
    while($row = $result4->fetch_assoc()) {

    $_SESSION["emp_designation"] = $row["emp_designation"];
    $_SESSION["workp_or_emp"] = $row["workp_or_emp"];
    $_SESSION["from_date"] = $row["from_date"];
    $_SESSION["end_date"] = $row["end_date"];

     }
} else {
	$_SESSION["emp_designation"] = "";
	$_SESSION["workp_or_emp"] = "";
	$_SESSION["from_date"] = "";
	$_SESSION["end_date"] = "";
}

$sql5 = "SELECT * FROM student_other_qualification WHERE student_id = '".$y."'";
$result5 = $conn->query($sql5);

if ($result5->num_rows > 0) {
    while($row = $result5->fetch_assoc()) {

    $_SESSION["qualif_or_cert"] = $row["qualif_or_cert"];
    $_SESSION["inst_or_org"] = $row["inst_or_org"];

     }
} else {
	$_SESSION["qualif_or_cert"] = "";
	$_SESSION["inst_or_org"] = "";
}

$sql6 = "SELECT * FROM student_referee WHERE student_id = '".$y."'";
$result6 = $conn->query($sql6);

if ($result6->num_rows > 0) {
    while($row = $result6->fetch_assoc()) {

    $_SESSION["name"] = $row["name"];
    $_SESSION["designation"] = $row["designation"];
    $_SESSION["organization"] = $row["organization"];
    $_SESSION["address"] = $row["address"];
    $_SESSION["organization_email"] = $row["organization_email"];
    $_SESSION["phone"] = $row["phone"];

    $_SESSION["name2"] = $row["name"];
    $_SESSION["designation2"] = $row["designation"];
    $_SESSION["organization2"] = $row["organization"];
    $_SESSION["address2"] = $row["address"];
    $_SESSION["organization_email2"] = $row["organization_email"];
    $_SESSION["phone2"] = $row["phone"];

     }
} else {
	$_SESSION["name"] = "";
	$_SESSION["designation"] = "";
	$_SESSION["organization"] = "";
	$_SESSION["address"] = "";
	$_SESSION["organization_email"] = "";
	$_SESSION["phone"] = "";

	$_SESSION["name2"] = "";
	$_SESSION["designation2"] = "";
	$_SESSION["organization2"] = "";
	$_SESSION["address2"] = "";
	$_SESSION["organization_email2"] = "";
	$_SESSION["phone2"] = "";

}
	 header('Location: instruction.html');

$conn->close();
?>