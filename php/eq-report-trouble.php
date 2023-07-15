<?php
require_once '../core/init.php';

if (isset($_POST['action'])) {
    $action = trim(addslashes(htmlspecialchars($_POST['action'])));
    if ($action == "loadTable") {
        $sql_load_data_trouble = "SELECT * FROM eq_report_trouble ORDER BY id DESC";
        $data_export = [];
        if ($db->num_rows($sql_load_data_trouble)) {
            foreach ($db->fetch_assoc($sql_load_data_trouble, 0) as $data_trouble) {
                $data_export[] = array(
                    "ids" => $data_trouble['id'],
                    "err_date_times" => $data_trouble["err_date_time"],
                    "running_hours" => $data_trouble["running_hour"],
                    "line_names" => $data_trouble["line_name"],
                    "machine_names" => $data_trouble["machine_name"],
                    "err_problems" => substr($data_trouble["err_problem"], 0, 50),
                    "err_analysis" => substr($data_trouble["err_analysis"], 0, 50),
                    "treatment_methods" => substr($data_trouble["treatment_method"], 0, 100),
                    "lossTime" => floor(abs(strtotime($data_trouble['running_hour']) - strtotime($data_trouble['err_date_time'])) / 60) . " min"
                );
            }
        }
        echo json_encode($data_export);
    } elseif ($action == "showModal") {
        $id = trim(addslashes(htmlspecialchars($_POST['ids'])));
        $sql_load_data_trouble_id = "SELECT * FROM eq_report_trouble WHERE id='$id'";
        if ($db->num_rows($sql_load_data_trouble_id)) {
            echo json_encode($db->fetch_assoc($sql_load_data_trouble_id, 1));
        } else
            echo '{}';
    } elseif ($action == 'loadInfo') {
        $sql_load_line = "SELECT * FROM `line` ORDER BY stt ASC";
        $sql_load_machine = "SELECT * FROM `sf_machine_list` WHERE machine_pc='0' OR machine_pc='1' ORDER BY id_no ASC";
        $data_export = [];
        if ($db->num_rows($sql_load_line)) {
            foreach ($db->fetch_assoc($sql_load_line, 0) as $dataLine) {
                $data_export[0][] = $dataLine['line_name'];
            }
        }
        if ($db->num_rows($sql_load_machine)) {
            foreach ($db->fetch_assoc($sql_load_machine, 0) as $dataMachine) {
                $data_export[1][] = $dataMachine['machine_name'];
            }
        }
        echo json_encode($data_export);
    } elseif ($action == 'addTrouble') {
        $imagesUp = $_FILES['fileUpload'];
        $imgComment = $_POST['imgComment']; //note của ảnh

        $lineName = trim(addslashes(htmlspecialchars($_POST['lineName'])));
        $machineName = trim(addslashes(htmlspecialchars($_POST['machineName'])));
        $machineMaker = trim(addslashes(htmlspecialchars($_POST['machineMaker'])));
        $machineModel = trim(addslashes(htmlspecialchars($_POST['machineModel'])));
        $machineSerial = trim(addslashes(htmlspecialchars($_POST['machineSerial'])));
        $dateErr = trim(addslashes(htmlspecialchars($_POST['dateErr'])));
        $dateOK = trim(addslashes(htmlspecialchars($_POST['dateOK'])));
        $err_problem = trim(addslashes(htmlspecialchars($_POST['err_problem'])));
        $err_analysis = trim(addslashes(htmlspecialchars($_POST['err_analysis'])));
        $treatment_method = trim(addslashes(htmlspecialchars($_POST['treatment_method'])));
        $pro_coun = trim(addslashes(htmlspecialchars($_POST['pro_coun'])));
        $lg_coun = trim(addslashes(htmlspecialchars($_POST['lg_coun'])));
        //xử lý lưu ảnh
        foreach ($imagesUp['name'] as $name => $value) {
            $path_file = '../pages/EQ Report/images/' . preg_replace('/[^a-zA-Z0-9_%\[().\]]/s', '', $date_current) . $name . preg_replace('/[^a-zA-Z0-9_%\[().\]]/s', '', stripslashes($imagesUp['name'][$name]));
            $source_file = $imagesUp['tmp_name'][$name];
            move_uploaded_file($source_file, $path_file); // Upload file
            echo json_encode($path_file);
        }
    }
}
