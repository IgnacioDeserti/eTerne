<?php

namespace App\Http\Controllers;

use Decidir\Token\TokenResponse;
use Illuminate\Support\Facades\Request;
use Decidir\Exception\AllowValue;


class PaymentController extends Controller
{
    public function processPayment(Request $request)
    {
        $keys_data = array(
            'public_key' => 'e9cdb99fff374b5f91da4480c8dca741',
            'private_key' => '92b71cf711ca41f78362a7134f87ff65'
        );

        $ambient = "test"; //valores posibles: "test" , "prod" o "qa"
        $connector = new \Decidir\Connector($keys_data, $ambient, "", "", "SDK-PHP");
        $data = array(
            "card_number" => "4509790112684851",
            "card_expiration_month" => "12",
            "card_expiration_year" => "30",
            "card_holder_name" => "Barb",
            "card_holder_birthday" => "24071990",
            "card_holder_door_number" => 505,
            "security_code" => "123",
            "card_holder_identification" => array(
                "type" => "dni",
                "number" => "29123456"
            )
        );

        $response = $connector->token()->token($data);
        $respuesta = new TokenResponse($data);

        $respuesta->setId($response->get('id', null));
        $respuesta->setStatus($response->get('status', null));
        $respuesta->setCardNumberLength($response->get('card_number_length', null));
        $respuesta->setDateCreated($response->get('date_created', null));
        $respuesta->setBin($response->get('bin', null));
        $respuesta->setLastFourDigits($response->get('last_four_digits', null));
        $respuesta->setSecurityCodeLength($response->get('security_code_length', null));
        $respuesta->setExpirationMonth($response->get('expiration_month', null));
        $respuesta->setExpirationYear($response->get('expiration_year', null));
        $respuesta->setDateDue($response->get('date_due', null));
        $cardHolder = $response->get('cardholder', null);
        $respuesta->setType($cardHolder['identification']['type']);
        $respuesta->setNumber($cardHolder['identification']['number']);
        $respuesta->setName($cardHolder['name']);
    }

    public function index(){
        return redirect("vendor\decidir2\php-sdk\\resources\\ejemplo_completo\index.php");
    }
}
