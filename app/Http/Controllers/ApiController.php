<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller
{

    //=================================category Api =============================================
    public function device(Request $request)
    {

        $device = Device::where('devices.device_code', $request->code)->first();


        if ($device) {

            $res['status'] = true;
            $res['message'] = "Device List";
            $res['data'] = $device;
            return response()->json($res);

        } else {

            $res['status'] = false;
            $res['message'] = "Not Found Device Against Code";
            return response()->json($res, 200);
        }
    }


    public function sendNotification($id)
    {
        
        $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
        $serverKey = 'AAAAQBnEGdI:APA91bH4Coe5AfqY9BqIVfSgWbqdzsKMcMdRCIcciTcSwnnIhkP84jE-87NjdD2XMkzUT1ZsgbF8zRCD6HE8PN3ivZ3O_KH4Yd0EZVqP5OQNDSZcU3tcDhAFr8NZEM7N0FKG1lPP951n'; // Replace with your Firebase server key

        

        $topic = '/topics/' . $id; // Replace with your desired topic

        $message = [
            'data' => [

                'title' => 'Changed',
                'message' => 'This Device ' . $id . ' logged in by user!!',
            ],
            'to' => $topic,
            'priority' => 'high', // Set the priority to 'high'
        ];

        $fields = json_encode($message);

        // dd($fields);

        $headers = [
            'Authorization: key=' . $serverKey,
            'Content-Type: application/json',
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);

        $result = curl_exec($ch);
        curl_close($ch);

        // Handle the result if needed
        if ($result === false) {
            // There was an error
            $data1 = 'FCM request failed: ' . curl_error($ch);

        } else {
            // Notification sent successfully
            $data =  'Notification sent successfully!';
        }
    }
}
