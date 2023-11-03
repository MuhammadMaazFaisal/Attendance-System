<?php
if ($_POST["action"] == "login") {
    login();
} elseif ($_POST["action"] == "add_employee") {
    add_employee();
} elseif ($_POST["action"] == "edit_employee") {
    edit_employee();
} elseif ($_POST["action"] == "display_employee_data") {
    display_employee_data();
} elseif ($_POST["action"] == "get_employee_data") {
    get_employee_data();
} elseif ($_POST["action"] == "leave_data") {
    leave_data();
} elseif ($_POST["action"] == "get_employees") {
    get_employees();
} elseif ($_POST['action'] == "get_display7") {
    get_display7();
} elseif ($_POST['action'] == "get_display8") {
    get_display8();
} elseif ($_POST['action'] == "get_display9") {
    get_display9();
} elseif ($_POST['action'] == "get_option") {
    get_option();
} elseif ($_POST['action'] == "get_display") {
    get_display();
} elseif ($_POST['action'] == "get_display2") {
    get_display2();
} elseif ($_POST['action'] == "get_display3") {
    get_display3();
} elseif ($_POST['action'] == "get_display4") {
    get_display4();
} elseif ($_POST['action'] == "get_display5") {
    get_display5();
} elseif ($_POST['action'] == "get_display6") {
    get_display6();
} elseif ($_POST["action"] == "leave") {
    leave();
} elseif ($_POST["action"] == "get_data") {
    get_data();
} elseif ($_POST["action"] == "employee_leave_data") {
    employee_leave_data();
} elseif ($_POST["action"] == "all_leave_data") {
    all_leave_data();
} elseif ($_POST["action"] == "calendar") {
    calendar();
} elseif ($_POST["action"] == "logout") {
    logout();
} elseif ($_POST["action"] == "change_password") {
    change_password();
} elseif ($_POST["action"] == "approve") {
    approve();
} elseif ($_POST["action"] == "reject") {
    reject();
} elseif ($_POST["action"] == "get_department") {
    get_department();
} elseif ($_POST["action"] == "get_employees_by_department") {
    get_employees_by_department();
} elseif ($_POST["action"] == "get_all_employees") {
    get_all_employees();
} elseif ($_POST["action"] == "get_monthly_data") {
    get_monthly_data();
} elseif ($_POST["action"] == "adjustment_data") {
    adjustment_data();
} elseif ($_POST["action"] == "all_adjustment_data") {
    all_adjustment_data();
} elseif ($_POST["action"] == "adjustment_form") {
    adjustment_form();
} elseif ($_POST["action"] == "employee_adjustment_data") {
    employee_adjustment_data();
} elseif ($_POST["action"] == "approve_adjustment") {
    approve_adjustment();
} elseif ($_POST["action"] == "reject_adjustment") {
    reject_adjustment();
} elseif ($_POST["action"] == "show_leaves") {
    show_leaves();
} elseif ($_POST["action"] == "show_adjustments") {
    show_adjustments();
} elseif ($_POST["action"] == "get_presents") {
    get_presents();
} elseif ($_POST["action"] == "get_alerts") {
    get_alerts();
} elseif ($_POST["action"] == "add_alert") {
    add_alert();
} elseif ($_POST["action"] == "get_all_alerts") {
    get_all_alerts();
} elseif ($_POST["action"] == "alert_modal") {
    alert_modal();
} elseif ($_POST["action"] == "change_status") {
    change_status();
} elseif ($_POST["action"] == "get_employee_data_by_search") {
    get_employee_data_by_search();
} elseif ($_POST["action"] == "modal") {
    modal();
} elseif ($_POST["action"] == "insert") {
    insert();
} elseif ($_POST["action"] == "result") {
    $fetchData = fetch_data();
    show_data($fetchData);
} elseif ($_POST["action"] == "PrintSetter") {
    PrintSetter();
} elseif ($_POST["action"] == "PrintSetter2") {
    PrintSetter2();
} elseif ($_POST["action"] == "add_hours") {
    add_hours();
} elseif ($_POST["action"] == "absent") {
    absent();
}

function logout()
{
    session_start();
    session_destroy();
    echo "logout";
}

function login()
{
    include "db_connection.php";
    $array = [];
    $user_id = $_POST["user_id"];
    $password = $_POST["password"];
    $user_type = "";

    $sql = "SELECT * FROM `users` WHERE `user_id`='$user_id' AND `password`='$password' AND `user_status`='Active' ";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {

        session_start();
        $_SESSION["status"] = "logged in";

        while ($row = $result->fetch_assoc()) {
            array_push($array, "Login Successfull");
            array_push($array, $row["user_access"]);
            $_SESSION["user_access"] = $row["user_access"];
            $_SESSION["user_id"] = $row["user_id"];
            $_SESSION["user_name"] = $row["employee_name"];
            $_SESSION["department"] = $row["department"];
            $_SESSION["designation"] = $row["designation"];
            $_SESSION["joining_date"] = $row["joining_date"];
            $_SESSION["user_image"] = $row["user_image"];
            $_SESSION["user_status"] = $row["user_status"];
        }
    } else {
        array_push($array, "Login Unsuccessfull");
    }
    echo json_encode($array);
}

function add_employee()
{
    include "db_connection.php";
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf', 'doc', 'ppt'); // valid extensions
    $path = '../uploads/'; // upload directory

    $img = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    // get uploaded file's extension
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    // can upload same image using rand function
    $final_image = rand(1000, 1000000) . $img;
    // check's valid format
    if (in_array($ext, $valid_extensions)) {
        $path = $path . strtolower($final_image);
        if (move_uploaded_file($tmp, $path)) {
            $employee_name = $_POST["employee_name"];
            $gender = $_POST["gender"];
            $designation = $_POST["designation"];
            $department = $_POST["department"];
            $email = $_POST["email"];
            $joining_date = $_POST["joining_date"];
            $qualification = $_POST["qualification"];
            $contact_number = $_POST["contact_number"];
            $cnic = $_POST["cnic"];
            $current_address = $_POST["current_address"];
            $date_of_birth = $_POST["date_of_birth"];
            $martial_status = $_POST["martial_status"];
            $password = $_POST["password"];
            $user_access = $_POST["user_access"];
            $user_shift = $_POST["user_shift"];
            $user_status = $_POST["user_status"];
            $time_in = $_POST["time_in"];
            $time_out = $_POST["time_out"];
            $time_in = date('h:i:sa', strtotime($time_in));
            $time_out = date('h:i:sa', strtotime($time_out));
            // $barcode = $_POST["barcode"];

            $user_id = "ET";

            if ($user_shift == "Full Time") {
                $user_id .= "F";
            } elseif ($user_shift == "Part Time") {
                $user_id .= "P";
            } elseif ($user_shift == "Remote") {
                $user_id .= "R";
            }

            if ($department == "Development") {
                $user_id .= "D";
            } elseif ($department == "HR") {
                $user_id .= "H";
            } elseif ($department == "Graphics") {
                $user_id .= "G";
            } elseif ($department == "Accounts") {
                $user_id .= "A";
            } elseif ($department == "Sales") {
                $user_id .= "S";
            }

            if ($designation == "Sales Executive") {
                $user_id .= "SE";
            } elseif ($designation == "Sales Manager") {
                $user_id .= "SM";
            } elseif ($designation == "Sales Head") {
                $user_id .= "SH";
            } elseif ($designation == "Junior Graphic Designer") {
                $user_id .= "JGD";
            } elseif ($designation == "Senior Graphic Designer") {
                $user_id .= "SGD";
            } elseif ($designation == "Junior Developer") {
                $user_id .= "JD";
            } elseif ($designation == "Senior Developer") {
                $user_id .= "SD";
            } elseif ($designation == "Full Stack Developer") {
                $user_id .= "FSD";
            } elseif ($designation == "HR Executive") {
                $user_id .= "HRE";
            } elseif ($designation == "Accounts Manager") {
                $user_id .= "AM";
            } elseif ($designation == "Accounts Assistant Manager") {
                $user_id .= "AAM";
            }

            $sql = "SELECT LPAD(Count(*),3,'0') FROM `users` WHERE `department` = '$department'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            $count = $row[0];
            if ($count == "000") {
                $count = "001";
            } else {
                $count = (int) $count + 1;
                $count = sprintf("%03d", $count);
                $count = strval($count);
            }
            $user_id .= $count;

            $sql = "INSERT INTO `users`(`user_id`,`employee_name`, `department`, `gender`, `email`, `current_address`, `user_access`, `password`, `designation`, `joining_date`, `qualification`, `contact_number`, `cnic`, `date_of_birth`, `martial_status`,`user_image`,`user_shift`,`user_status`,`time_in`,`time_out`) VALUES('$user_id','$employee_name','$department','$gender','$email','$current_address','$user_access','$password','$designation','$joining_date','$qualification','$contact_number','$cnic','$date_of_birth','$martial_status', '$path','$user_shift','$user_status','$time_in','$time_out')";
            if ($conn->query($sql) === true) {
                echo "Employee Added Successfully";
            } else {
                echo "Employee Could Not Be Added";
            }
        }
    } else {
        echo 'Please Select Valid Image File';
    }
}

function edit_employee()
{
    include "db_connection.php";
    if ($_FILES['image']['name'] != "") {
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf', 'doc', 'ppt'); // valid extensions
        $path = '../uploads/'; // upload directory
        $img = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        // get uploaded file's extension
        $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
        // can upload same image using rand function
        $final_image = rand(1000, 1000000) . $img;
        // check's valid format
        if (in_array($ext, $valid_extensions)) {
            $path = $path . strtolower($final_image);
            if (move_uploaded_file($tmp, $path)) {
                $user_id = $_POST["user_id"];
                $employee_name = $_POST["employee_name"];
                $gender = $_POST["gender"];
                $designation = $_POST["designation"];
                $department = $_POST["department"];
                $email = $_POST["email"];
                $joining_date = $_POST["joining_date"];
                $qualification = $_POST["qualification"];
                $contact_number = $_POST["contact_number"];
                $cnic = $_POST["cnic"];
                $current_address = $_POST["current_address"];
                $date_of_birth = $_POST["date_of_birth"];
                $martial_status = $_POST["martial_status"];
                $password = $_POST["password"];
                $user_access = $_POST["user_access"];
                $user_status = $_POST["user_status"];
                $time_in = $_POST["time_in"];
                $time_out = $_POST["time_out"];
                $time_in = date('h:i:sa', strtotime($time_in));
                $time_out = date('h:i:sa', strtotime($time_out));
                // $barcode = $_POST["barcode"];

                $sql = "UPDATE `users` SET `employee_name`='$employee_name',`department`='$department',`gender`='$gender',`email`='$email',`current_address`='$current_address',`user_access`='$user_access',`password`='$password',`designation`='$designation',`joining_date`='$joining_date',`qualification`='$qualification',`contact_number`='$contact_number',`cnic`=' $cnic',`date_of_birth`='$date_of_birth',`martial_status`='$martial_status',`user_image`='$path',`time_in`='$time_in',`time_out`='$time_out',`user_status`='$user_status' WHERE `user_id`='$user_id'";
                if ($conn->query($sql) === true) {
                    echo "Employee details updated successfully";
                } else {
                    echo "Employee details could not be updated, Please try again later";
                }
            }
        } else {
            echo 'invalid';
        }
    } else {
        $user_id = $_POST["user_id"];
        $employee_name = $_POST["employee_name"];
        $gender = $_POST["gender"];
        $designation = $_POST["designation"];
        $department = $_POST["department"];
        $email = $_POST["email"];
        $joining_date = $_POST["joining_date"];
        $qualification = $_POST["qualification"];
        $contact_number = $_POST["contact_number"];
        $cnic = $_POST["cnic"];
        $current_address = $_POST["current_address"];
        $date_of_birth = $_POST["date_of_birth"];
        $martial_status = $_POST["martial_status"];
        $password = $_POST["password"];
        $user_access = $_POST["user_access"];
        $user_status = $_POST["user_status"];
        $time_in = $_POST["time_in"];
        $time_out = $_POST["time_out"];
        $time_in = date('h:i:sa', strtotime($time_in));
        $time_out = date('h:i:sa', strtotime($time_out));
        // $barcode = $_POST["barcode"];

        $sql = "UPDATE `users` SET `employee_name`='$employee_name',`department`='$department',`gender`='$gender',`email`='$email',`current_address`='$current_address',`user_access`='$user_access',`password`='$password',`designation`='$designation',`joining_date`='$joining_date',`qualification`='$qualification',`contact_number`='$contact_number',`cnic`=' $cnic',`date_of_birth`='$date_of_birth',`martial_status`='$martial_status',`time_in`='$time_in',`time_out`='$time_out',`user_status`='$user_status' WHERE `user_id`='$user_id'";
        if ($conn->query($sql) === true) {
            echo "Employee details updated successfully";
        } else {
            echo "Employee details could not be updated, Please try again later";
        }
    }
}

function display_employee_data()
{
    include "db_connection.php";
    $employee_id = $_POST["employee_id"];
    $sql = "SELECT * FROM `users` where `user_id`='$employee_id'";
    $result = mysqli_query($conn, $sql);
    $array = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Convert time_in and time_out to the required format
            $row['time_in'] = date("H:i:s", strtotime($row['time_in'])); // Assuming time_in is in 12-hour format
            $row['time_out'] = date("H:i:s", strtotime($row['time_out'])); // Assuming time_out is in 12-hour format

            array_push($array, $row);
        }
    } else {
        echo "0 results";
    }

    // Do not perform time conversion here; send the time values as they are
    echo json_encode($array);
}


function get_employee_data()
{
    include "db_connection.php";
    $sql = "SELECT `user_id`,`employee_name`,`department`,`designation`,`user_status` FROM `users` where `department`!='Administration'";
    $result = mysqli_query($conn, $sql);
    $array = [];
    $array2 = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($array, $row["user_id"]);
            array_push($array, $row["employee_name"]);
            array_push($array, $row["department"]);
            array_push($array, $row["designation"]);
            array_push($array, $row["user_status"]);
            array_push($array2, $array);
            $array = [];
        }
    } else {
        echo "0 results";
    }
    echo json_encode($array2);
}

function all_leave_data()
{
    include "db_connection.php";
    $date = $_POST["date"];
    $sql = "SELECT * FROM `leaves` where `date`='$date' and `status`='Pending'";
    $result = mysqli_query($conn, $sql);
    $array = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_array()) {
            array_push($array, $row);
        }
    } else {
        array_push($array, "No data found");
    }

    echo json_encode($array);
}

function leave_data()
{
    include "db_connection.php";

    $array = [];

    $sql2 = "SELECT COUNT(leave_id) FROM `leaves`";
    $result2 = mysqli_query($conn, $sql2);
    if ($result2->num_rows > 0) {
        while ($row = $result2->fetch_assoc()) {
            array_push($array, $row['COUNT(leave_id)']);
        }
    } else {
        array_push($array, 0);
    }

    $sql3 = "SELECT COUNT(leave_id) FROM `leaves` where status='Approved'";
    $result3 = mysqli_query($conn, $sql3);
    if ($result3->num_rows > 0) {
        while ($row = $result3->fetch_assoc()) {
            array_push($array, $row['COUNT(leave_id)']);
        }
    } else {
        array_push($array, 0);
    }

    $sql4 = "SELECT COUNT(leave_id) FROM `leaves` where status='Pending'";
    $result4 = mysqli_query($conn, $sql4);
    if ($result4->num_rows > 0) {
        while ($row = $result4->fetch_assoc()) {
            array_push($array, $row['COUNT(leave_id)']);
        }
    } else {
        array_push($array, 0);
    }

    $sql5 = "SELECT COUNT(leave_id) FROM `leaves` where status='Rejected'";
    $result5 = mysqli_query($conn, $sql5);
    if ($result5->num_rows > 0) {
        while ($row = $result5->fetch_assoc()) {
            array_push($array, $row['COUNT(leave_id)']);
        }
    } else {
        array_push($array, 0);
    }

    echo json_encode($array);
}

function employee_leave_data()
{
    include "db_connection.php";
    $array = [];
    $sql5 = "SELECT * FROM `leaves` where employee_name='$_POST[employee_name]'";
    $result5 = mysqli_query($conn, $sql5);
    if ($result5->num_rows > 0) {
        while ($row = $result5->fetch_assoc()) {
            array_push($array, $row);
        }
    } else {
        array_push($array, "No leaves applied");
    }

    echo json_encode($array);
}

function get_employees()
{
    include "db_connection.php";
    $sql = "SELECT COUNT(*) FROM `users` where `user_id`!='admin'";
    $result = mysqli_query($conn, $sql);
    $array = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($array, $row['COUNT(*)']);
        }
    } else {
        array_push($array, 0);
    }
    $sql1 = "SELECT COUNT(*) FROM `users` where `user_status`='Active' and `user_id`!='admin'";
    $result1 = mysqli_query($conn, $sql1);
    if ($result1->num_rows > 0) {
        while ($row = $result1->fetch_assoc()) {
            array_push($array, $row['COUNT(*)']);
        }
    } else {
        array_push($array, 0);
    }

    echo json_encode($array);
}

function get_display7()
{
    include "db_connection.php";

    $sql = "SELECT * FROM `signin` WHERE Name='Ashar Habib'";
    $result = mysqli_query($conn, $sql);
    $array = [];
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {

            array_push($array, $row['Status']);
        };
        echo json_encode($array);
    };
}

function get_display8()
{
    include "db_connection.php";
    $ID = $_POST['month1'];
    $year = $_POST['year1'];
    $user_id = $_POST['user_id'];

    $sql = "SELECT * FROM `signin` WHERE Date LIKE'$ID%'AND Date LIKE'%$year' AND user_id='$user_id' AND `attendance`!='-' ";
    $result = mysqli_query($conn, $sql);
    $ok = "";
    $array = [];

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $new_row = [];
            $row['Date'] = substr($row['Date'], 4, 2);
            array_push($new_row, $row['Date']);
            array_push($new_row, $row['attendance']);
            array_push($array, $new_row);
        };
    }
    echo json_encode($array);
};

function get_display9()
{
    include "db_connection.php";
    $year = $_POST['c'];

    $sql = "SELECT * FROM `signin` WHERE Date LIKE'%$year'  ";
    $result = mysqli_query($conn, $sql);
    $ok = "";
    $array = [];

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {

            array_push($array, $row['Status']);
        };
    };
    echo json_encode($array);
}

function get_option()
{
    include "db_connection.php";
    $sql = "SELECT id,Name FROM employee ";
    $result = mysqli_query($conn, $sql);
    $ok = "";
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {

            $ok .= "<option value='" . $row['Name'] . "'>" . $row['Name'] . "</option>";
        }
        echo $ok;
    } else {
        echo "0 results";
    }
}

function get_display()
{
    include "db_connection.php";
    $ID = $_POST['b'];
    $sql = "SELECT * FROM employee  ";
    $result = mysqli_query($conn, $sql);
    $ok = "";
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {

            $ok .= "<tr><td>" . $row['id'] . "</td>
           <td>" . $row['Name'] . "</td>
           <td>" . $row['designation'] . "</td>
           <td>" . '<button type="button" id=' . $row['id'] . ' class="btn btn-dark" onclick="funco(this.id)">View Report</button>' . "</td>
           ";
            $ok .= "</tr>";
        }
        echo $ok;
    } else {
        echo "0 results";
    }
}

function get_display2()
{
    include "db_connection.php";
    $ID = $_POST['b'];
    $sql = "SELECT * FROM signin  ";
    $result = mysqli_query($conn, $sql);
    $ok = "";
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {

            $ok .= "<tr>
               <td>" . $row['Signin'] . "</td>
               <td>" . $row['Date'] . "</td>
               <td>" . $row['Signin'] . "</td>
               <td>" . $row['Signout'] . "</td>
               <td>" . $row['Status'] . "</td>
               <td>" . $row['Signout_Status'] . "</td>";

            $ok .= "</tr>";
        }
        echo $ok;
    } else {
        echo "0 results";
    }
}

function get_display3()
{
    include "db_connection.php";
    $ID = $_POST['b'];

    $sql = "SELECT * FROM `signin` WHERE Date LIKE'$ID%' and '2023%';  ";
    $result = mysqli_query($conn, $sql);
    $ok = "";
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {

            $ok .= "<tr>
                 <td>" . $row['Name'] . "</td>
                 <td>" . $row['Date'] . "</td>
                 <td>" . $row['Signin'] . "</td>
                 <td>" . $row['Signout'] . "</td>
                 <td>" . $row['attendance'] . "</td>";

            $ok .= "</tr>";
        }
        echo $ok;
    } else {
        echo "0 results";
    }
}

function get_display4()
{
    include "db_connection.php";
    $year = $_POST['c'];

    $sql = "SELECT * FROM `signin` WHERE Date LIKE'%$year';  ";
    $result = mysqli_query($conn, $sql);
    $ok = "";
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {

            $ok .= "<tr>
                   <td>" . $row['Name'] . "</td>
                   <td>" . $row['Date'] . "</td>
                   <td>" . $row['Signin'] . "</td>
                   <td>" . $row['Signout'] . "</td>
                   <td>" . $row['attendance'] . "</td>";

            $ok .= "</tr>";
        }
        echo $ok;
    } else {
        echo "0 results";
    }
}

function get_display5()
{
    include "db_connection.php";
    // $year = $_POST['c'];

    $sql = "SELECT * FROM `users`";
    $result = mysqli_query($conn, $sql);
    $ok = "<option value='12'>" . 'Employee id' . "</option>";
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {

            $ok .= "<option value='" . $row['employee_name'] . "'>" . $row['user_id'] . "</option>";
        }
        echo $ok;
    } else {
        echo "0 results";
    }
}

function get_display6()
{

    include "db_connection.php";
    $employee_id = $_POST['employee_id'];
    $month = $_POST['month'];
    $year = $_POST['year'];

    $sql = "SELECT * FROM `signin` WHERE `user_id`='$employee_id' AND `Date` LIKE'%, $year' AND `Date` LIKE'$month,%'";

    $result = mysqli_query($conn, $sql);
    $ok = "";
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {

            $ok .= "<tr>
                       <td>" . $row['Date'] . "</td>
                       <td>" . $row['Signin'] . "</td>
                       <td>" . $row['Status'] . "</td>
                       <td>" . $row['Signout'] . "</td>
                       <td>" . $row['Signout_Status'] . "</td>
                       <td>" . $row['attendance'] . "</td>
                       <td>" . $row['hours'] . "</td>";


            $ok .= "</tr>";
        }
        echo $ok;
    } else {
        echo "<tr>
                <td colspan='6'>No Records Found</td>
            </tr>";
    }
}

function leave()
{
    include 'db_connection.php';

    $array = [];
    $form_type = $_POST['form_type'];
    $start_time = $_POST['from'];
    $end_time = $_POST['to'];
    $reason = $_POST['reason'];
    $date = date('d/m/Y');
    $time = $_POST['time'];
    $minutes = $_POST['minutes'];
    $employee_name = $_POST['employee_name'];
    $user_id = $_POST['user_id'];
    $status = 'Pending';
    $duration = "";

    if ($form_type == "full_day") {
        $form_type = "Full Day";
    } elseif ($form_type == "half_day") {
        $form_type = "Half Day";
    } elseif ($form_type == "short") {
        $form_type = "Short";
    }

    if ($form_type == "Short" || $form_type == "Half Day") {
        $duration = $time . ":" . $minutes . "  " . "hours/minutes";
    } else {
        $start_time = date('d/m/Y', strtotime($start_time));
        $end_time = date('d/m/Y', strtotime($end_time));
        $duration = $time . "  " . "day";
    }

    $sql = "INSERT INTO `leaves`(`leave_type`, `start_time`, `end_time`, `reason`,`date`,`duration`, `status`, `employee_name`,`user_id`) VALUES ('$form_type','$start_time','$end_time','$reason','$date','$duration','$status','$employee_name','$user_id')";
    if ($conn->query($sql) === true) {
        echo "Leave Applied Successfully";
    } else {
        echo "Leave Not Applied";
    }
}

function get_data()
{
    include 'db_connection.php';
    $employee_name = $_POST['employee_name'];
    $sql = "SELECT * FROM `leaves` where `employee_name`='$employee_name' ORDER BY `leave_id` DESC Limit 1";
    $result = $conn->query($sql);
    $array = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($array, $row["start_time"]);
            array_push($array, $row["end_time"]);
            array_push($array, $row["reason"]);
            array_push($array, $row["leave_type"]);
            array_push($array, $row["duration"]);
        }
        echo json_encode($array);
    } else {
        echo json_encode($array);
    }
}

function calendar()
{
    $ok = "2022";
    $year = $_POST['year'];
    $month = $_POST['month'];
    date_default_timezone_set('Asia/Tokyo');
    $ym = ($year . '-' . $month);

    // Check format
    $timestamp = strtotime($ym . '-01');
    if ($timestamp === false) {
        $ym = date('Y-m');
        $timestamp = strtotime($ym . '-01');
    }

    $today = date('Y-m-j', time());
    $html_title = date('Y / m', $timestamp);
    $prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp) - 1, 1, date('Y', $timestamp)));
    $next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp) + 1, 1, date('Y', $timestamp)));

    $day_count = date('t', $timestamp);
    $str = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));
    $weeks = array();
    $week = '';
    $week .= str_repeat('<td></td>', $str);

    for ($day = 1; $day <= $day_count; $day++, $str++) {

        $date = $ym . '-' . $day;

        if ($today == $date) {
            $week .= '<td class="today">' . $day;
        } else {
            $week .= '<td>' . $day;
        }
        $week .= '</td>';

        // End of the week OR End of the month
        if ($str % 7 == 6 || $day == $day_count) {

            if ($day == $day_count) {
                // Add empty cell
                $week .= str_repeat('<td></td>', 6 - ($str % 7));
            }

            $weeks[] = '<tr>' . $week . '</tr>';

            // Prepare for new week
            $week = '';
        }
    }
    $array = [];
    echo json_encode($weeks);
}

function change_password()
{
    include 'db_connection.php';
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $user_id = $_POST['user_id'];
    $sql0 = "SELECT * FROM `users` WHERE `user_id`='$user_id' AND `password`='$old_password'";
    $result0 = mysqli_query($conn, $sql0);
    if ($result0->num_rows > 0) {
        while ($row = $result0->fetch_assoc()) {
            $old_password = $row['password'];
        }
    } else {
        echo "Old Password is Incorrect";
        return;
    }
    $sql = "Update `users` SET `password`='$new_password' WHERE `user_id`='$user_id'";
    if ($conn->query($sql) == true) {
        echo "Password Changed Successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
}

function approve()
{
    include 'db_connection.php';
    $leave_id = $_POST['leave_id'];
    $sql = "Update `leaves` SET `status`='Approved' WHERE `leave_id`='$leave_id'";
    if ($conn->query($sql) == true) {
        echo "Approved";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
}

function reject()
{
    include 'db_connection.php';
    $leave_id = $_POST['leave_id'];
    $sql = "Update `leaves` SET `status`='Rejected' WHERE `leave_id`='$leave_id'";
    if ($conn->query($sql) == true) {
        echo "Rejected";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
}

function get_department()
{
    include "db_connection.php";
    $sql = "SELECT DISTINCT(`department`) FROM `users` where `department`!='Administration'";
    $result = mysqli_query($conn, $sql);
    $array = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($array, $row["department"]);
        }
    } else {
        echo "0 results";
    }
    echo json_encode($array);
}

function get_employees_by_department()
{
    include "db_connection.php";
    $department = $_POST["department"];
    $sql = "SELECT * FROM `users` where `department`='$department' and `department`!='Administration'";
    $result = mysqli_query($conn, $sql);
    $array = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($array, $row);
        }
    } else {
        echo "0 results";
    }
    echo json_encode($array);
}

function get_all_employees()
{
    include "db_connection.php";
    $sql = "SELECT * FROM `users` where `department`!='Administration'";
    $result = mysqli_query($conn, $sql);
    $array = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($array, $row);
        }
    } else {
        echo "0 results";
    }
    echo json_encode($array);
}

function get_monthly_data()
{
    include "db_connection.php";
    $month = $_POST['month'];
    $year = $_POST['year'];
    $employee_id = $_POST['employee_id'];
    $array = [];

    $sql20 = "SELECT count(attendance) FROM `signin` WHERE `user_id`='$employee_id' AND `Date` LIKE'%, $year' AND `Date` LIKE'$month,%' AND `attendance`='Present' or `attendance`='Absent' ";
    $result20 = mysqli_query($conn, $sql20);
    if ($result20->num_rows > 0) {
        while ($row = $result20->fetch_assoc()) {
            array_push($array, $row['count(attendance)']);
        }
    } else {
        array_push($array, 0);
    }

    $sql6 = "SELECT count(attendance) FROM `signin` WHERE `user_id`='$employee_id' AND `Date` LIKE'%, $year' AND `Date` LIKE'$month,%' AND `attendance`='Present'";
    $result2 = mysqli_query($conn, $sql6);
    if ($result2->num_rows > 0) {
        while ($row = $result2->fetch_assoc()) {
            array_push($array, $row['count(attendance)']);
        }
    } else {
        array_push($array, 0);
    }

    $sql = "SELECT count(attendance) FROM `signin` WHERE `user_id`='$employee_id' AND `Date` LIKE'%, $year' AND `Date` LIKE'$month,%' AND `attendance`='Absent'";
    $result1 = mysqli_query($conn, $sql);
    if ($result1->num_rows > 0) {
        while ($row = $result1->fetch_assoc()) {
            array_push($array, $row['count(attendance)']);
        }
    } else {
        array_push($array, 0);
    }

    $sql7 = "SELECT * FROM `signin` WHERE `user_id`='$employee_id' AND `Date` LIKE'%, $year' AND `Date` LIKE'$month,%' AND `attendance`='Present'";
    $result7 = mysqli_query($conn, $sql7);
    $total = 0;
    if ($result7->num_rows > 0) {
        while ($row = $result7->fetch_assoc()) {
            if ($row['Signin'] < "06:00:00am") {
                $time_in = strtotime("11/1/2011 " . $row['Signin']);
                $time_out = strtotime("11/2/2011 " . $row['Signout']);
            } else {
                $time_in = strtotime($row['Signin']);
                $time_out = strtotime($row['Signout']);
            }
            $diff = $time_out - $time_in;
            $total += $diff;
        }

        $hours = floor($total / 3600);
        $mins = floor(($total % 3600) / 60);
        array_push($array, "$hours hours $mins minutes");
    } else {
        array_push($array, "0 hours");
    }

    $sql10 = "SELECT count(employee_name) FROM `leaves` WHERE `user_id`='$employee_id' AND `Date` LIKE'%, $year' AND `Date` LIKE'$month,%' AND `status`='Approved'";
    $result10 = mysqli_query($conn, $sql10);
    if ($result10->num_rows > 0) {
        while ($row = $result10->fetch_assoc()) {
            array_push($array, $row['count(employee_name)']);
        }
    } else {
        array_push($array, 0);
    }

    array_push($array, (2 - $array[4]));

    $sql8 = "SELECT * FROM `users` WHERE `user_id`='$employee_id'";
    $result8 = mysqli_query($conn, $sql8);
    $official_diff = 0;
    if ($result8->num_rows > 0) {
        while ($row = $result8->fetch_assoc()) {
            $official_timeIn = $row['time_in'];
            if ($row['time_out'] < "06:00:00am") {
                $official_timeOut = strtotime("11/2/2011 " . $row['time_out']);
                $official_timeIn = strtotime("11/1/2011 " . $row['time_in']);
                $official_diff = $official_timeOut - $official_timeIn;
            } else {
                $official_timeOut = $row['time_out'];
                $official_timeIn = strtotime($official_timeIn);
                $official_timeOut = strtotime($official_timeOut);
                $official_diff = abs($official_timeOut - $official_timeIn);
            }
        }
    }
    $official_diff = $official_diff * $array[0];
    if ($official_diff < $total) {
        $official_diff = $total - $official_diff;
        $official_hours = (int)floor($official_diff / 3600);
        $official_mins = (int)floor($official_diff / 60 % 60);
        $official_time = $official_hours . " hours " . $official_mins . " minutes";
        array_push($array, $official_time);
    } else {
        array_push($array, "0 hours 0 minutes");
    }


    echo json_encode($array);
}

function adjustment_data()
{
    include "db_connection.php";

    $array = [];

    $sql2 = "SELECT COUNT(adjustment_id) FROM `adjustment`";
    $result2 = mysqli_query($conn, $sql2);
    if ($result2->num_rows > 0) {
        while ($row = $result2->fetch_assoc()) {
            array_push($array, $row['COUNT(adjustment_id)']);
        }
    } else {
        array_push($array, 0);
    }

    $sql3 = "SELECT COUNT(adjustment_id) FROM `adjustment` where status='Approved'";
    $result3 = mysqli_query($conn, $sql3);
    if ($result3->num_rows > 0) {
        while ($row = $result3->fetch_assoc()) {
            array_push($array, $row['COUNT(adjustment_id)']);
        }
    } else {
        array_push($array, 0);
    }

    $sql4 = "SELECT COUNT(adjustment_id) FROM `adjustment` where status='Pending'";
    $result4 = mysqli_query($conn, $sql4);
    if ($result4->num_rows > 0) {
        while ($row = $result4->fetch_assoc()) {
            array_push($array, $row['COUNT(adjustment_id)']);
        }
    } else {
        array_push($array, 0);
    }

    $sql5 = "SELECT COUNT(adjustment_id) FROM `adjustment` where status='Rejected'";
    $result5 = mysqli_query($conn, $sql5);
    if ($result5->num_rows > 0) {
        while ($row = $result5->fetch_assoc()) {
            array_push($array, $row['COUNT(adjustment_id)']);
        }
    } else {
        array_push($array, 0);
    }

    echo json_encode($array);
}

function all_adjustment_data()
{
    include "db_connection.php";
    $date = $_POST["date"];
    $sql = "SELECT * FROM `adjustment` where `requested_on`='$date' and `status`='Pending'";
    $result = mysqli_query($conn, $sql);
    $array = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_array()) {
            array_push($array, $row);
        }
    } else {
        array_push($array, "No data found");
    }
    $employee_id = $array[0][1];

    $sql2 = "SELECT employee_name FROM `users` where `user_id`='$employee_id'";
    $result2 = mysqli_query($conn, $sql2);
    if ($result2->num_rows > 0) {
        while ($row = $result2->fetch_assoc()) {
            $array[0]["employee_name"] = $row['employee_name'];
        }
    } else {
        array_push($array, "No data found");
    }

    echo json_encode($array);
}

function approve_adjustment()
{
    include 'db_connection.php';
    $adjustment_id = $_POST['adjustment_id'];
    $sql = "Update `adjustment` SET `status`='Approved' WHERE `adjustment_id`='$adjustment_id'";
    if ($conn->query($sql) == true) {
        echo "Approved";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
}

function reject_adjustment()
{
    include 'db_connection.php';
    $adjustment_id = $_POST['adjustment_id'];
    $sql = "Update `adjustment` SET `status`='Rejected' WHERE `adjustment_id`='$adjustment_id'";
    if ($conn->query($sql) == true) {
        echo "Rejected";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
}

function adjustment_form()
{
    include 'db_connection.php';
    $array = [];
    $employee_id = $_POST['employee_id'];
    $employee_name = $_POST['employee_name'];
    $adjustment_type = $_POST['adjustment_type'];
    $adjustment_date = date("d/m/Y", strtotime($_POST['adjustment_date']));
    $adjustment_reason = $_POST['adjustment_reason'];
    $requested_on = date("d/m/Y");
    $sql = "INSERT INTO `adjustment`(`user_id`, `adjustment_type`, `adjustment_date`, `adjustment_reason`, `requested_on`,`status`,`employee_name`) VALUES ('$employee_id','$adjustment_type','$adjustment_date','$adjustment_reason','$requested_on','Pending','$employee_name')";
    if ($conn->query($sql) == true) {
        array_push($array, "success");
    } else {
        array_push($array, "Error: " . $sql . "<br>" . $db->error);
    }
    echo json_encode($array);
}

function employee_adjustment_data()
{
    include "db_connection.php";
    $array = [];
    $sql5 = "SELECT * FROM `adjustment` where `user_id`='$_POST[employee_id]'";
    $result5 = mysqli_query($conn, $sql5);
    if ($result5->num_rows > 0) {
        while ($row = $result5->fetch_assoc()) {
            array_push($array, $row);
        }
    } else {
        array_push($array, "No adjustments applied");
    }

    echo json_encode($array);
}

function show_leaves()
{
    include "db_connection.php";

    $sql = "SELECT * FROM `leaves` where `status`='Pending' ORDER BY leave_id DESC LIMIT 10";
    $result = mysqli_query($conn, $sql);
    $array = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_array()) {
            array_push($array, $row);
        }
    } else {
        array_push($array, "No data found");
    }

    echo json_encode($array);
}

function show_adjustments()
{
    include "db_connection.php";

    $sql = "SELECT * FROM `adjustment` where `status`='Pending' ORDER BY adjustment_id DESC LIMIT 10";
    $result = mysqli_query($conn, $sql);
    $array = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_array()) {
            array_push($array, $row);
        }
    } else {
        array_push($array, "No data found");
    }

    echo json_encode($array);
}

function get_presents()
{
    include "db_connection.php";
    $month1 = $_POST['month1'];
    $year1 = $_POST['year1'];
    $user_id = $_POST['user_id'];
    $array = [];
    $sql = "SELECT `Status`,`Signout_Status` FROM `signin` WHERE `attendance`='Present' AND `Date` LIKE'$month1%'AND `Date` LIKE'%$year1' AND `Status`!='Welcome Back' AND `user_id`='$user_id'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($array, $row);
        }
    } else {
        array_push($array, 0);
    }
    echo json_encode($array);
}

function get_alerts()
{
    include "db_connection.php";
    $user_id = $_POST['user_id'];
    $array = [];
    $sql1 = "SELECT COUNT(*) FROM `alert` WHERE `user_id`='$user_id' AND `read_status`='unread'";
    $result1 = mysqli_query($conn, $sql1);
    if ($result1->num_rows > 0) {
        while ($row = $result1->fetch_assoc()) {
            array_push($array, $row['COUNT(*)']);
        }
    } else {
        array_push($array, "No data found");
    }
    $sql = "SELECT * FROM `alert` WHERE `user_id`='$user_id' AND `read_status`='unread' ORDER BY `a_id` DESC LIMIT 10";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($array, $row);
        }
    } else {
        array_push($array, "No data found");
    }
    echo json_encode($array);
}

function add_alert()
{
    include "db_connection.php";
    $array = [];
    $a_message = $_POST['a_message'];
    $a_title = $_POST['a_title'];
    $date = date("d/m/Y");
    $sql1 = "SELECT `user_id` FROM `users` WHERE `user_access`='Employee' AND `user_status`='Active';
    ";

    // Execute the first query to get user IDs
    $result1 = mysqli_query($conn, $sql1);

    if ($result1) {
        $array[0] = "success"; // Update the status only once if the query is successful
        while ($row = $result1->fetch_assoc()) {
            $user_id = $row['user_id'];
            $sql = "INSERT INTO `alert`(`user_id`,`a_title`, `a_message`,`read_status`,`a_date`) VALUES ('$user_id','$a_title','$a_message','unread','$date')";
            if ($conn->query($sql) != true) {
                // If the insert query fails, update the error message
                $array[0] = "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    } else {
        $array[0] = "Error: " . $sql1 . "<br>" . $conn->error;
    }

    echo json_encode($array);
}


function get_all_alerts()
{
    include "db_connection.php";
    $array = [];

    $sql = "SELECT `a_message`, `a_date`, `a_title` FROM `alert` GROUP BY `a_message`, `a_date`, `a_title`";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($array, $row);
        }
    }
    echo json_encode($array);
}


function alert_modal()
{
    include "db_connection.php";
    $array = [];
    $a_id = $_POST['id'];
    $sql = "SELECT * FROM `alert` WHERE `a_id`='$a_id'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($array, $row);
        }
    }
    echo json_encode($array);
}

function change_status()
{
    include "db_connection.php";
    $a_id = $_POST['id'];
    $sql = "UPDATE `alert` SET `read_status`='read' WHERE `a_id`='$a_id'";
    if ($conn->query($sql) == true) {
        $array[0] = "success";
    } else {
        $array[0] = "Error: " . $sql . "<br>" . $db->error;
    }
    echo json_encode($array);
}

function get_employee_data_by_search()
{
    include "db_connection.php";
    $user_id = $_POST['employee_id'];

    $sql = "SELECT `user_id`,`employee_name`,`department`,`designation`,`user_status` FROM `users` WHERE `user_id`='$user_id' and `department`!='Administration'";
    $result = mysqli_query($conn, $sql);
    $array = [];
    $array2 = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($array, $row["user_id"]);
            array_push($array, $row["employee_name"]);
            array_push($array, $row["department"]);
            array_push($array, $row["designation"]);
            array_push($array, $row["user_status"]);
            array_push($array2, $array);
            $array = [];
        }
    } else {
        array_push($array2, "0 results");
    }
    echo json_encode($array2);
}

function modal()
{
    include "db_connection.php";
    $ID = $_POST['id'];

    $sql = "SELECT * FROM `signin` where `user_id`='$ID' ORDER BY auto DESC LIMIT 1";

    $result = mysqli_query($conn, $sql);
    $array = [];
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {

            array_push($array, $row['user_id'], $row['Name'], $row['Signin'], $row['Signout'], $row['Date'], $row['Status'], $row['activity']);
        };
    };
    $sql2 = "SELECT user_image FROM `users` where `user_id`='$ID'";

    $result2 = mysqli_query($conn, $sql2);
    $array2 = [];
    if ($result2->num_rows > 0) {
        // output data of each row
        while ($row = $result2->fetch_assoc()) {

            array_push($array2, $row['user_image']);
        };
    };
    array_push($array, $array2);
    echo json_encode($array);
}

function insert()
{

    include 'db_connection.php';
    $array = [];

    $ID = $_POST['id'];

    $sql = "SELECT * FROM `users` where `user_id`='$ID'";
    $query = mysqli_query($conn, $sql) or die("Query Unsuccessful");
    $str = "";

    while ($row = mysqli_fetch_assoc($query)) {

        $str = "{$row['employee_name']}";
    }
    array_push($array, $str);

    date_default_timezone_set("Asia/karachi");
    $name = $str;

    $sign_in = date("h:i:sa");
    $date = date("n, j, Y");
    $emp_time = "";
    $query = mysqli_query($conn, $sql) or die("Query Unsuccessful");

    $row = mysqli_fetch_assoc($query);
    $emp_time = $row['time_in'];

    if ($sign_in > $emp_time) {
        $status = 'On Time';
    } else {
        $status = "On Time";
    }

    $activity = "";
    $curr_date = "";
    array_push($array, $sign_in);
    $sql2 = "SELECT * FROM `signin` WHERE Name='$name'  ORDER BY auto DESC LIMIT 1;";
    $result = mysqli_query($conn, $sql2);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $activity = $row["activity"];
            $curr_date = $row["Date"];
            array_push($array, null);
        }
    }
    $emp_timeout = '';
    $query = mysqli_query($conn, $sql) or die("Query Unsuccessful");

    $row = mysqli_fetch_assoc($query);
    $emp_timeout = $row['time_out'];


    if ($activity == "Signed in") {

        // If signout time is before signin time, it means the signout is on the next day

        // Insert the calculated hours into the signin table
        // $sql_hours = "UPDATE `signin` SET `hours`='$hours' WHERE Name='$name' ORDER BY auto DESC LIMIT 1;";
        // $result = mysqli_query($conn, $sql_hours);
        if ($emp_timeout < '04:00:00am' && $sign_in > "06:00:00pm") {
            $day1 = '11,01,2022 ';
            $day2 = '11,02,2022 ';
            $new_signin = $day1 . $sign_in;
            $new_timeout = $day2 . $emp_timeout;

            if ($new_signin < $new_timeout) {
                $status1 = 'Hours Completed';
            } else {
                $status1 = 'Hours Completed';
            }
        } else {
            if ($sign_in < $emp_timeout) {

                array_push($array, $sign_in);
                array_push($array, $emp_timeout);

                $status1 = 'Hours Completed';
            } else {
                $status1 = 'Hours Completed';
            }
        }

        $sql = "UPDATE `signin` SET `activity`='Signed Out',`Signout_Status`='$status1' WHERE Name='$name' ORDER BY auto DESC LIMIT 1;";
        $result = mysqli_query($conn, $sql);

        $sql4 = "UPDATE `signin` SET `Signout`='$sign_in' WHERE Name='$name' order by auto desc limit 1";
        $result = mysqli_query($conn, $sql4);
    } elseif ($activity == "Signed Out" && $curr_date == $date) {
        $sql = "INSERT INTO `signin`(`user_id`, `Name`,`Signin`, `Status`,`Signout_Status`, `Signout`,`activity`,`Date`,`attendance`,`hours`) VALUES ('$ID','$name','$sign_in','Welcome Back','-','','Signed in','$date','-','')";
        // $sql5="SELECT * FROM 'signin' where "

        $result = mysqli_query($conn, $sql);
    } else {

        $sql = "INSERT INTO `signin`( `user_id`,`Name`,`Signin`, `Status`, `Signout_Status`, `Signout`,`activity`,`Date`,`attendance`,`hours`) VALUES ('$ID','$name','$sign_in','$status','-','','Signed in','$date','Present','')";
        // $sql5="SELECT * FROM 'signin' where "

        $result = mysqli_query($conn, $sql);
        $sql1 = "SELECT STATUS FROM `signin` WHERE Name='$name'  ORDER BY auto DESC LIMIT 1;";

        $result = mysqli_query($conn, $sql1);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($array, $row["STATUS"]);
            }
        }
    }

    // if ($activity == "Signed in" and $date == $curr_date and $sign_in >= "09:00:00pm") {

    //     $emparr = [];
    //     $sqlll = "SELECT * FROM `users` where user_status='Active'";
    //     $query = mysqli_query($conn, $sqlll) or die("Query Unsuccessful");
    //     while ($row = mysqli_fetch_assoc($query)) {

    //         $empnames = "{$row['employee_name']}";
    //         array_push($emparr, $empnames);
    //     }
    //     //
    //     $dailyarr = [];
    //     $sqo = "SELECT * FROM `signin` WHERE  Date='$date'";
    //     $query5 = mysqli_query($conn, $sqo) or die("Query Unsuccessful");
    //     while ($row = mysqli_fetch_assoc($query5)) {

    //         $dailynames = "{$row['user_id']}";
    //         array_push($dailyarr, $dailynames);
    //     }
    //     //   array_push($array,$dailyarr);
    //     $b = array_diff($emparr, $dailyarr);
    //     array_push($array, $b);
    //     $arrayLength = count($b);
    //     $i = 0;
    //     $absenties = '';
    //     while ($i < $arrayLength) {

    //         $absenties = $b[$i];
    //         $sql69 = "INSERT INTO `signin`(`user_id`,`Name`,`Signin`,`Status`,`Signout_Status`,`Signout`,`activity`,`Date`,`attendance`,`hours`) VALUES ('$ID','$absenties','$sign_in','Welcome Back','-','-','Signed in','$date','Absent','')";
    //         $query6 = mysqli_query($conn, $sql69) or die("Query Unsuccessful");
    //         $i++;
    //     }
    // }

    echo json_encode($array);
}

function add_hours()
{
    include 'db_connection.php';
    $array = [];

    $ID = $_POST['a'];

    $sql = "SELECT * FROM `signin` where `user_id`='$ID'";
    $query = mysqli_query($conn, $sql) or die("Query Unsuccessful");
    $str1 = "";
    $str2 = "";
    $str3 = "";
    $str4 = "";

    while ($row = mysqli_fetch_assoc($query)) {

        $str1 = "{$row['Signin']}";
        $str2 = "{$row['Signout']}";
        $str3 = "{$row['activity']}";
        $str4 = "{$row['user_id']}";
    }
    array_push($array, $str1);
    array_push($array, $str2);
    array_push($array, $str3);
    array_push($array, $str4);


    date_default_timezone_set("Asia/karachi");
    $sign_in = $str1;
    $sign_out = $str2;
    $activity = $str3;
    $user_id = $str4;



    if ($activity == "Signed Out" && $ID != "ETPDJD001" && $ID != "ETPDJD003" && $ID != "ETPDJD004" && $ID != "ETPSSM005" && $ID == "$user_id") {

        date_default_timezone_set('Asia/karachi'); // Replace 'Your_Timezone' with your actual timezone

        $today = date("Y-m-d");
        $signin_time = DateTime::createFromFormat('Y-m-d H:i:s', $today . ' ' . date("H:i:s", strtotime($sign_in)));
        $signout_time = DateTime::createFromFormat('Y-m-d H:i:s', $today . ' ' . date("H:i:s", strtotime($sign_out)));
        if ($signout_time < $signin_time) {
            // Add 24 hours to the signout time
            $signout_time->modify('+1 day');
        }
        $interval = $signin_time->diff($signout_time);
        $hours = $interval->format('%h:%i:%s');
        $sql4 = "UPDATE `signin` SET `hours`='$hours' where `user_id`='$ID'";
        $result = mysqli_query($conn, $sql4);
        if ($result) {
            echo "Hours updated successfully.";
        } else {
            echo "Failed to update hours: " . mysqli_error($conn);
        }

        if ($hours < "7:0:0" && $hours > "5:0:0") {
            $sql5 = "UPDATE `signin` SET `Signout_Status`='Early going' where `user_id`='$ID'";
            $result = mysqli_query($conn, $sql5);
        } else if ($hours < "5:0:0" && $activity == "Signed Out") {
            $sql6 = "UPDATE `signin` SET `Signout_Status`='Half day' where `user_id`='$ID'";
            $result = mysqli_query($conn, $sql6);
        } else if ($hours > "8:0:0" && $activity == "Signed Out") {
            $sql7 = "UPDATE `signin` SET `Signout_Status`='Over Time' where `user_id`='$ID'";
            $result = mysqli_query($conn, $sql7);
        }
        $result = mysqli_query($conn, $sql5);
        if ($result) {
            echo "Hours updated successfully.";
        } else {
            echo "Failed to update hours: " . mysqli_error($conn);
        }
    } else if ($activity == "Signed Out" && $ID == "$user_id") {
        date_default_timezone_set('Asia/karachi'); // Replace 'Your_Timezone' with your actual timezone

        $today = date("Y-m-d");
        $signin_time = DateTime::createFromFormat('Y-m-d H:i:s', $today . ' ' . date("H:i:s", strtotime($sign_in)));
        $signout_time = DateTime::createFromFormat('Y-m-d H:i:s', $today . ' ' . date("H:i:s", strtotime($sign_out)));
        if ($signout_time < $signin_time) {
            // Add 24 hours to the signout time
            $signout_time->modify('+1 day');
        }
        $interval = $signin_time->diff($signout_time);
        $hours = $interval->format('%h:%i:%s');
        $sql4 = "UPDATE `signin` SET `hours`='$hours' where `user_id`='$ID'";
        $result = mysqli_query($conn, $sql4);
        if ($result) {
            echo "Hours updated successfully.";
        } else {
            echo "Failed to update hours: " . mysqli_error($conn);
        }

        if ($hours < "6:0:0" && $hours > "5:0:0") {
            $sql5 = "UPDATE `signin` SET `Signout_Status`='Early going' where `user_id`='$ID'";
            $result = mysqli_query($conn, $sql5);
        } else if ($hours < "4:0:0" && $activity == "Signed Out") {
            $sql6 = "UPDATE `signin` SET `Signout_Status`='Half day' where `user_id`='$ID'";
            $result = mysqli_query($conn, $sql6);
        } else if ($hours > "7:0:0" && $activity == "Signed Out") {
            $sql7 = "UPDATE `signin` SET `Signout_Status`='Over Time' where `user_id`='$ID'";
            $result = mysqli_query($conn, $sql7);
        }
        $result = mysqli_query($conn, $sql5);
        if ($result) {
            echo "Hours updated successfully.";
        } else {
            echo "Failed to update hours: " . mysqli_error($conn);
        }
    }
}


function absent()
{
    include 'db_connection.php';

    $array = array();

    // Check if the current time is after 12 am (midnight)
    
    date_default_timezone_set("Asia/Karachi");
    $current_time = date("H:i:s");
    $date = date("n, j, Y", strtotime("-1 day"));
    


    if (strtotime($current_time) >= strtotime("00:00:00") && strtotime($current_time) < strtotime("12:00:00")) {
        $getRecordQuery = "SELECT u.`user_id`, u.`employee_name`
            FROM `users` AS u
            WHERE u.`user_status` = 'Active' AND u.`user_access` = 'Employee'
            AND NOT EXISTS (
                SELECT 1
                FROM `signin` AS s
                WHERE u.`user_id` = s.`user_id`
                AND s.`Date` = '$date'
            )";


        $query_users = mysqli_query($conn, $getRecordQuery) or die("Query Unsuccessful");

        while ($row = mysqli_fetch_assoc($query_users)) {
            $user_id1 = $row['user_id'];
            $employee_name1 = $row['employee_name'];
            $previous_date = date("n, j, Y", strtotime("-1 day"));

            $sql69 = "INSERT INTO `signin`(`user_id`,`Name`,`Signin`,`Status`,`Signout_Status`,`Signout`,`activity`,`Date`,`attendance`,`hours`) VALUES ('$user_id1','$employee_name1','-','-','-','-','-','$previous_date','Absent','-')";
            $result = mysqli_query($conn, $sql69);

            if ($result) {
                echo "Absent record inserted successfully for employees who entered after 12 am.";
            } else {
                echo "Failed to insert absent record: " . mysqli_error($conn);
            }
        }
    }
}


function fetch_data()
{
    include "db_connection.php";
    $id = $_POST["a"];
    $name = '';
    $sql = "SELECT * FROM `users` WHERE `user_id`='$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $name .= $row['employee_name'];
        }
    } else {
        echo "0 results";
    }

    date_default_timezone_set("Asia/karachi");
    $date = date("n, j, Y");

    $query = "SELECT * from `signin` where `Date`='$date'";
    $exec = mysqli_query($conn, $query);
    if (mysqli_num_rows($exec) > 0) {
        $row = mysqli_fetch_all($exec, MYSQLI_ASSOC);
        return $row;
    } else {
        return $row = [];
    }
}

function show_data($fetchData)
{

    echo '<thead class=" container bg-primary">
        <tr>
            <th>S.N</th>
            <th>Full Name</th>
            <th>Sign in</th>
            <th>Sign out</th>
            <th>Status</th>
            <th>Signout Status</th>
            <th>Activity</th>
            <th>Date</th>
        </tr>
        </thead>';

    if (count($fetchData) > 0) {
        $sn = 1;
        echo '<tbody>';
        foreach ($fetchData as $data) {

            echo " <tr>
          <td>" . $sn . "</td>
          <td>" . $data['Name'] . "</td>

          <td>" . $data['Signin'] . "</td>
          <td>" . $data['Signout'] . "</td>
          <td>" . $data['Status'] . "</td>
          <td>" . $data['Signout_Status'] . "</td>
          <td>" . $data['activity'] . "</td>
          <td>" . $data['Date'] . "</td>

   </tr>";

            $sn++;
        }
        echo '</tbody>';
    } else {

        echo "<tr>
        <td colspan='7'>No Data Found</td>
       </tr>";
    }
    echo "</table>";
}

// function PrintSetter()
// {
//     include "db_connection.php";

//     error_reporting(E_ALL);
//     ini_set('display_errors', 1);

//     $array = array();
//     $getRecordQuery = "SELECT * FROM `users` WHERE `user_id`='ETPDJD003'";

//     $getRecordStatement = $pdo->prepare($getRecordQuery);


//     if ($getRecordStatement->execute()) {
//         $array = $getRecordStatement->fetchAll(PDO::FETCH_ASSOC);
//         echo json_encode($array, true);
//         die;
//     }
// }

function PrintSetter()
{
    include "db_connection.php";

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $array = array();


    $user_id = $_POST["employee_id"];

    $getRecordQuery = "SELECT `user_id`,`employee_name` FROM `users` WHERE `user_id`='$user_id'";

    $result = mysqli_query($conn, $getRecordQuery);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $array[] = $row;
        }
        echo json_encode($array, true);
    } else {
        echo "Query error: " . mysqli_error($con);
    }
}

function PrintSetter2()
{
    include "db_connection.php";

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $array = array();


    $user_id = $_POST["user_id"];

    $getRecordQuery = "SELECT `user_id`,`employee_name` FROM `users` WHERE `user_id`='$user_id'";

    $result = mysqli_query($conn, $getRecordQuery);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $array[] = $row;
        }
        echo json_encode($array, true);
    } else {
        echo "Query error: " . mysqli_error($con);
    }
}
