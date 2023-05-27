<?php
class DbHelper
{
    private $conn;
    function createDbConnection()
    {
        try {
            $this->conn = mysqli_connect("localhost", "root", "", "hospitalmangment");
        } catch (Exception $error) {
            echo $error->getMessage();
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    function authUser($username, $password)
    {
        $username = $this->conn->real_escape_string($username);
        $password = $this->conn->real_escape_string($password);

        $sql = "SELECT * FROM employee as e, department as d WHERE e.dept_id = d.id AND username = '$username' AND pass = SHA2(CONCAT('SecretSalt', '$password'), 256);";
        $result = $this->conn->query($sql);

        if ($result->num_rows == 1) {
            // Authentication successful
            return $result->fetch_assoc(); // Return the user details as an associative array
        } else {
            // Authentication failed
            return null;
        }
    }


    function getAllPatients()
    {
        $patients = [];

        try {
            $sql = "SELECT * FROM patient;";
            $result = $this->conn->query($sql);

            if ($result === false) {
                echo "Error: " . $this->conn->error;
            } else {
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $patient = [
                            "id" => $row["id"],
                            "gov_id" => $row["gov_id"]
                        ];

                        $patients[] = $patient;
                    }
                } else {
                    echo "No rows found.";
                }
            }

            // $this->conn->close();
        } catch (Exception $error) {
            echo $error->getMessage();
        }

        return $patients;
    }

    function getAllDocDpts()
    {
        $doc_depts = [];

        try {
            $sql = "SELECT * FROM doc_dept;";
            $result = $this->conn->query($sql);

            if ($result === false) {
                echo "Error: " . $this->conn->error;
            } else {
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $patient = [
                            "id" => $row["id"],
                            "name" => $row["name"]
                        ];

                        $doc_depts[] = $patient;
                    }
                } else {
                    echo "No rows found.";
                }
            }

            // $this->conn->close();
        } catch (Exception $error) {
            echo $error->getMessage();
        }

        return $doc_depts;
    }

    function getAllDoctors(){
        $doctors = [];

        try {
            $sql = "select * from doctor as d, employee as e, doctor_state as ds, doc_dept as dd where d.emp_id = e.id AND d.state_id= ds.id and d.doc_dept_id = dd.id AND d.state_id = 1;";
            $result = $this->conn->query($sql);

            if ($result === false) {
                echo "Error: " . $this->conn->error;
            } else {
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $doctor = [
                            "id" => $row["id"],
                            "emp_id" => $row["emp_id"],
                            "full_name" => $row["full_name"],
                            "doc_dept_id" => $row["doc_dept_id"]
                        ];

                        $doctors[] = $doctor;
                    }
                } else {
                    echo "No rows found.";
                }
            }

            // $this->conn->close();
        } catch (Exception $error) {
            echo $error->getMessage();
        }

        return $doctors;
    }

    function insertPatient($patient, $doctor){
        try {
            $sql = "INSERT INTO doctor_patients (doctor_id, patient_id) VALUES ($doctor, $patient);";

            $result = $this->conn->query($sql);

            if ($result === false) {
                return "Error";
            } else {
                return "Success";
            }

        }catch (Exception $error) {
            return $error->getMessage();
        }
    }

}
?>