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
    }
}
