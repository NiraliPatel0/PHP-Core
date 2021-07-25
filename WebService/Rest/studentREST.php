<?php
class Student
{
    # send student details. param: student id, return: array, if any exception return false
    function getStudent($id)
    {
        try {
            $pattern = '/^\d+$/';
            if (preg_match($pattern, $id) != 1) {
                return false;
            }

            /*You can Add DB */
            $arr = array(
                1 => array(
                    "Name" => "Sita Patel",
                    "Age" => 12
                ),
                2 => array(
                    "Name" => "Nirali Patel",
                    "Age" => 15
                ),
                3 => array(
                    "Name" => "Drasti Desai",
                    "Age" => 13
                ),
            );

            /**Find student data & return */
            foreach ($arr as $k => $v) {
                if ($k == $id) {
                    return $v;
                }
            }
            # default return false
            return false;
            
        } catch (Exception $e) {
            return false;
        }
    }
}

/*Required view parameter for post*/

if (isset($_POST['VIEW'])) {
    $id = $_POST['ID'];

    $obj = new Student();
    # call get student method
    $data = $obj->getStudent($id);

    if ($data) {
        # send json data with response code 200
        echo json_encode($data);
        header("HTTP/1.0 200");
    } else {
        # send response code 404 error as response
        header("HTTP/1.0 404 Not Found");
        die();
    }
}

/*Required view parameter for GET*/
if (isset($_GET['VIEW'])) {
    $id = $_GET['ID'];

    $obj = new Student();
    # call get student method
    $data = $obj->getStudent($id);

    if ($data) {
        echo json_encode($data);
        header("HTTP/1.0 200");
    } else {
        # send response code 404 error as response
        header("HTTP/1.0 404 Not Found");
        die();
    }
}
