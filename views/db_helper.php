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


}
?>