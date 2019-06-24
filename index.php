<?php 
require_once 'config.php';
class culqiclass{
    public function inscripcion_pago($callback=false){
        include_once APP.DS.'Requests-Culqi/library/Requests.php';
        Requests::register_autoloader();
        include_once APP.DS.'culqi.php';
        $culqi = new Culqi\Culqi(array('api_key' => SECRET_KEY_CULQI_TEST));
        // Creamos Cargo a una tarjeta
        //$id_plan=$_POST["id_plan"];
        //$plan_detail = $this->getplans(true,array("id"=>$id_plan));
        $plan_detail = array("precio"=>100,"nombre"=>"geral");
        //$email_token= $_POST["email_token"];
        $email_token = "pomasantos149@gmail.com";
        $token= $_POST["token"];
        $data = array(
            "amount" => ($plan_detail["precio"]."00"),
            "capture" => true,
            "currency_code" => "PEN",
            "description" => $plan_detail["nombre"],
            "email" => $email_token,
            "installments" => 0,
            "source_id" => $token,
        );
        /*
            "antifraud_details" => array(
                "address_city" => "LIMA",
                "country_code" => "PE",
                "first_name" => $nombre,
                "last_name" => $apellido,
            ),*/
        $charge = $culqi->Charges->create($data);
        /*[type] => venta_exitosa
            [code] => AUT0000
            [merchant_message] => La operación de venta ha sido autorizada exitosamente
            [user_message] => Su compra ha sido exitosa.*/
        if ($charge) {
            $response = json_decode(json_encode($charge),true)["outcome"];
            if ($callback) {
                return $response;
            }else {
                echo json_encode(array("data"=>$response,"resultado"=>true));
            }
        }else{
            echo json_encode(array("resultado"=>false));
        }
    }
}
$cls = new culqiclass();
$xd = $cls->inscripcion_pago();

?>