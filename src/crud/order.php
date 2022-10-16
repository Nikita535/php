<?php
$requestMethod = $_SERVER["REQUEST_METHOD"];
header('Content-Type: application/json');
$con = new mysqli("MYSQL", "user", "password", "appDB");
$answer = array();
switch ($requestMethod) {
    case 'GET':
        if (empty(isset($_GET['id']))) {
            $result = $con->query("SELECT * FROM `order`;");
            while ($row = $result->fetch_assoc()) {
                $answer[] = $row;
            }
        } else {
            $query_result = $con->query("SELECT * FROM `order` WHERE ID = " . $_GET['id'] . ";");
            $result = $query_result->fetch_row();
            $answer = $result;
        }
        if (!empty($result)) {
            http_response_code(200);
            echo json_encode($answer);
        } else {
            http_response_code(204);
        }
        break;
    case 'POST':
        $json = file_get_contents('php://input');
        $order = json_decode($json);
        if (!empty($order->{'name'}) && !empty($order->{'description'}) && !empty($order->{'price'})) {
            $name = $order->{'name'};
            $description = $order->{'description'};
            $price = $order->{'price'};
            $query_result = $con->query("SELECT * FROM `order` WHERE name='" . $name . "'");
            if (!empty($result)) {
                http_response_code(409);
            } else {
                $stmt = $con->prepare("INSERT INTO `order` (name, description, price) VALUES (?, ?, ?)");
                $stmt->bind_param('sss', $name, $description, $price);
                $stmt->execute();
                http_response_code(201);
            }
        } else {
            http_response_code(422);
        }

        break;
    case 'PUT':
        $json = file_get_contents('php://input');
        $order = json_decode($json);
        if (!empty($order->{'name'}) && !empty($order->{'price'})&& !empty($order->{'description'})) {
            if (empty(isset($_GET['id']))) {
                http_response_code(422);
            } else {
                $query_result = $con->query("SELECT * FROM `order` WHERE ID='" . $_GET['id'] . "'");
                $result = $query_result->fetch_row();
                if (!empty($result)) {
                    $query_result = $con->query("SELECT * FROM `order` WHERE name='" . $order->{'name'} . "' AND ID!='" . $_GET['id'] . "'");
                    $result = $query_result->fetch_row();
                    if (!empty($result)) {
                        http_response_code(409);
                    } else {
                        $con->query("UPDATE `order` SET name='" . $order->{'name'} . "', price='" . $order->{'price'} . "' WHERE ID='" . $_GET['id'] . "'");
                        http_response_code(200);
                    }
                } else {
                    http_response_code(204);
                }
            }
        } else {
            http_response_code(422);
        }
        break;
    case 'DELETE':
        if (empty(isset($_GET['id']))) {
            http_response_code(422);
        } else {
            $query_result = $con->query("SELECT * FROM `order` WHERE ID='" . $_GET['id'] . "'");
            $result = $query_result->fetch_row();
            if (!empty($result)) {
                $query_result = $con->query("DELETE FROM `order` WHERE ID='" . $_GET['id'] . "'");
                http_response_code(204);
            } else {
                http_response_code(204);
            }
        }
        break;
    default:
        http_response_code(405);
        break;
}
?>