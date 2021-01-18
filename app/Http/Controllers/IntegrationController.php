<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IntegrationController extends Controller
{
    public function showData()
    {
        // $test = $this->get("https://reqres.in/api/register", []);
        $response = Http::get('https://reqres.in/api/register');
        return $this->customResponse($response->json(), $response->status());
    }

    public function pushRegister(Request $request)
    {
        // $test = $this->get("https://reqres.in/api/register", []);
        $response = Http::post('https://reqres.in/api/register',[
            $request
        ]);
        return $this->customResponse($response->json(), $response->status());
    }

    public function pushLogin(Request $request)
    {
        $response = Http::post('https://reqres.in/api/login',[
            $request
        ]);
        return $this->customResponse($response->json(), $response->status());
    }

    public function customResponse($message = 'success', $status = 200)
    {
        return response(['status' =>  $status, 'message' => $message], $status);
    }

    public function filterData() {
        $data = array(
            "status" => 1,
            "message" => "Sukses",
            "data" => array(
                "system_message" => "SUCCESS",
                "response" => array(
                    "additionaldata" => array(),
                    "billdetails" => array(
                        array(
                            "adminfee" => "0.0",
                            "billid" => "8",
                            "currency" => "360",
                            "title" => "TELKOMSEL 50rb - 50.149",
                            "totalamount" => "50149.00",
                            "descriptions" => null,
                            "body" => array(
                                "DENOM" => 50000
                            )
                        ),
                        array(
                            "adminfee" => "0.0",
                            "billid" => "9",
                            "currency" => "360",
                            "title" => "TELKOMSEL 75rb - 74.050",
                            "totalamount" => "74050.00",
                            "descriptions" => null,
                            "body" => array(
                                "DENOM" => 75000
                            )
                        ),
                        array(
                            "adminfee"=> "0.0",
                            "billid"=> "10",
                            "currency" => "360",
                            "title" => "TELKOMSEL 100rb - 98.264",
                            "totalamount" => "98264.00",
                            "descriptions" => null,
                            "body" => array(
                                "DENOM" => 100000
                            )
                        ),
                        array(
                            "adminfee" => "0.0",
                            "billid" => "11",
                            "currency" => "360",
                            "title" => "TELKOMSEL 150rb - 146.600",
                            "totalamount" => "146600.00",
                            "descriptions" => null,
                            "body" => array(
                                "DENOM" => 150000
                            )
                        ),
                        array(
                            "adminfee" => "0.0",
                            "billid" => "12",
                            "currency" => "360",
                            "title" => "TELKOMSEL 200rb - 194.900",
                            "totalamount" => "194900.00",
                            "descriptions" => null,
                            "body" => array(                                
                                "DENOM" => 200000
                            )
                        ),
                    ),
                    "billername" => "PULSA TSEL",
                    "inquiryid" => "27190993",
                    "paymenttype" => "CLOSE_PAYMENT",
                    "responsecode" => "0000",
                    "responsemsg" => "SUCCESS",
                    "subscriberid" => "081311529594",
                    "subscribername" => ""
                ),
                "trace" => array(
                    "session_id" => "81215AEFADFB710C1258F79ABA1AD710.node3",
                    "request_date_time" => "20190704185319",
                    "words" => "779b7f8280415b568cdfd0abcc20eb8c3e18b585",
                    "biller_id" => "9900002",
                    "account_number" => "081311529594",
                    "systrace" => 1564026434,
                    "inquiry_id" => "27190993"
                )
            )
        );

        $data_encoded = json_encode($data);

        //must result (example data)
        /*{
            "status": 1,
            "message": "Sukses",
            "data": {
            "system_message": "SUCCESS",
            "response": {
                "additionaldata": [],
                "billdetails": [
                {
                    "adminfee": "0.0",
                    "billid": "8",
                    "currency": "360",
                    "title": "TELKOMSEL 50rb - 50.149",
                    "totalamount": "50149.00",
                    "descriptions": null,
                    "body": [
                    "DENOM           : 50000"
                    ]
                },
                {
                    "adminfee": "0.0",
                    "billid": "9",
                    "currency": "360",
                    "title": "TELKOMSEL 75rb - 74.050",
                    "totalamount": "74050.00",
                    "descriptions": null,
                    "body": [
                    "DENOM           : 75000"
                    ]
                },
                {
                    "adminfee": "0.0",
                    "billid": "10",
                    "currency": "360",
                    "title": "TELKOMSEL 100rb - 98.264",
                    "totalamount": "98264.00",
                    "descriptions": null,
                    "body": [
                    "DENOM           : 100000"
                    ]
                },
                {
                    "adminfee": "0.0",
                    "billid": "11",
                    "currency": "360",
                    "title": "TELKOMSEL 150rb - 146.600",
                    "totalamount": "146600.00",
                    "descriptions": null,
                    "body": [
                    "DENOM           : 150000"
                    ]
                },
                {
                    "adminfee": "0.0",
                    "billid": "12",
                    "currency": "360",
                    "title": "TELKOMSEL 200rb - 194.900",
                    "totalamount": "194900.00",
                    "descriptions": null,
                    "body": [
                    "DENOM           : 200000"
                    ]
                }
                ],
                "billername": "PULSA TSEL",
                "inquiryid": "27190993",
                "paymenttype": "CLOSE_PAYMENT",
                "responsecode": "0000",
                "responsemsg": "SUCCESS",
                "subscriberid": "081311529594",
                "subscribername": ""
            },
            "trace": {
                "session_id": "81215AEFADFB710C1258F79ABA1AD710.node3",
                "request_date_time": "20190704185319",
                "words": "779b7f8280415b568cdfd0abcc20eb8c3e18b585",
                "biller_id": "9900002",
                "account_number": "081311529594",
                "systrace": 1564026434,
                "inquiry_id": "27190993"
            }
            }
        }*/
        // echo "<pre>"; print_r(json_encode($data, JSON_PRETTY_PRINT));
        //expected output
        /*Array
        (
            [0] => 100000
            [1] => 150000
            [2] => 200000
        )*/
        $result = null;
        foreach(json_decode($data_encoded)->data->response->billdetails as $row) {
            if($row->body->DENOM >= 100000) {
                $result[] = $row->body->DENOM;
            }
        }
        print_r('This expected output DENOM with criteria >= 100000 <br>');
        print_r('<pre>');
        print_r($result);
    }
}
?>