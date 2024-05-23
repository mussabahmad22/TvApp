<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Device;
use App\Models\User;
use App\Models\Bgimg;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Subscription;
use Stripe\Invoice;
use Illuminate\Support\Facades\DB;




class AdminController extends Controller
{


    public function list_devices()
    {
        $user = Auth::user();
        $devices = Device::where('user_id', $user->id)->get();
        return view('devices', compact('devices'));
    }

    public function add_device_page()
    {


        $user = Auth::user();

        $user_id = $user->id;

        $devices = Device::where('user_id', $user_id)->get();


        if ($devices->isNotEmpty()) {

            $latestDevice = Device::where('user_id', $user_id)->latest()->first();
            $count = $latestDevice->count + 1;
        } else {

            $count = 1;
        }


        $rand_num = rand(11111, 99999);

        $url = url('add_device');
        $title = 'ADD TV ' . $count . ' - ' . $rand_num;
        $tv_name = 'TV ' . $count;
        $text = 'SAVE';

        return view('add_device',  ['tv_name' => $tv_name, 'user_id' => $user_id, 'url' => $url, 'title' => $title, 'text' => $text, 'count' => $count, 'rand_num' => $rand_num]);
    }

    public function device_details($id)
    {

        $device = Device::find($id);
        return view('device_details', compact('device'));
    }

    // public function add_device(Request $request)
    // {
    //     // dd($request->device_vedio);

    //     $user = Auth::user();

    //     if ($request->device_vedio) {


    //         $filenames = "videos/" . $request->device_vedio;
    //     } else {

    //         $filenames = "";
    //     }


    //     if ($request->file('device_logo') == null) {
    //         $device_logo = "";
    //     } else {
    //         $path_title = $request->file('device_logo')->store('public/images');

    //         $device_logo = basename($path_title);
    //     }



    //     $request->validate([

    //         'lat' => 'required',
    //         'long' => 'required',
    //         'count' => 'required',
    //         'tv_name' => 'required',
    //         'guest_name' => 'required',
    //         'device_code' => 'required|unique:devices,device_code',
    //         'guest_message' => 'required',
    //         'temprature' => 'required',
    //         'device_vedio' => 'required',

    //     ]);

    //     $device = new Device();
    //     $device->device_vedio = $filenames;
    //     $device->device_logo = "images/" . $device_logo;
    //     $device->guest_name = $request->guest_name;
    //     $device->tv_name = $request->tv_name;
    //     $device->count = $request->count;
    //     $device->device_code = $request->device_code;
    //     $device->guest_message = $request->guest_message;
    //     $device->lat = $request->lat;
    //     $device->longitude = $request->long;
    //     $device->temprature = $request->temprature;
    //     $device->user_id = $request->user_id;
    //     $device->save();


    //     return redirect(route('list_devices'))->with('success', 'devices Added successfully');
    // }

    public function add_device(Request $request)
    {
        $user = Auth::user();

        $filenames = $request->device_vedio ? "videos/" . $request->device_vedio : "";

        $device_logo = "";
        if ($request->hasFile('device_logo')) {
            $path_title = $request->file('device_logo')->store('public/images');
            $device_logo = "images/" . basename($path_title);
        }

        $request->validate([
            'lat' => 'required',
            'long' => 'required',
            'count' => 'required',
            'tv_name' => 'required',
            'guest_name' => 'required',
            'device_code' => 'required|unique:devices,device_code',
            'guest_message' => 'required',
            'temprature' => 'required',
            'device_vedio' => 'required',
        ]);

        $device = new Device([
            'device_vedio' => $filenames,
            'device_logo' => $device_logo,
            'guest_name' => $request->guest_name,
            'tv_name' => $request->tv_name,
            'count' => $request->count,
            'device_code' => $request->device_code,
            'guest_message' => $request->guest_message,
            'lat' => $request->lat,
            'longitude' => $request->long,
            'temprature' => $request->temprature,
            'user_id' => $request->user_id,
        ]);
        $device->save();

        return redirect(route('list_devices'))->with('success', 'Device added successfully');
    }

    public function edit_device($id)
    {
        $device = Device::find($id);
        $user = Auth::user();
        $user_id = $user->id;

        $count = "";

        $rand_num = "";

        $url = url('device_update');
        $title = 'EDIT TV';
        $tv_name = '';
        $text = 'UPDATE';
        return view('add_device',  ['tv_name' => $tv_name, 'user_id' => $user_id, 'device' => $device, 'url' => $url, 'title' => $title, 'text' => $text, 'count' => $count, 'rand_num' => $rand_num]);
    }

    // public function device_update(Request $request)
    // {


    //     $request->validate([

    //         'lat' => 'required',
    //         'long' => 'required',
    //         'guest_name' => 'required',
    //         'guest_message' => 'required',
    //         'temprature' => 'required',


    //     ]);

    //     $device_id = $request->query_id;

    //     $device =  Device::find($device_id);

    //     if ($request->device_vedio) {

    //         $filenames = "videos/" . $request->device_vedio;

    //     } else {

    //         $filenames = $device->device_vedio;
    //     }

    //     if ($request->file('device_logo') == null) {

    //         $device_logo =  $device->device_logo;
    //     } else {

    //         $path_title = $request->file('device_logo')->store('public/images');

    //         $device_logo = "images/" . basename($path_title);
    //     }

    //     $device->device_vedio = $filenames;
    //     $device->device_logo =  $device_logo;
    //     $device->tv_name = $request->tv_name;
    //     $device->guest_name = $request->guest_name;
    //     $device->guest_message = $request->guest_message;
    //     $device->lat = $request->lat;
    //     $device->longitude = $request->long;
    //     $device->temprature = $request->temprature;
    //     $device->user_id = $request->user_id;
    //     $device->save();

    //     $this->sendNotificationUpdated($device_id);


    //     return redirect(route('list_devices'))->with('success', 'successfully updated');
    // }

    public function device_update(Request $request)
    {
        $request->validate([
            'lat' => 'required',
            'long' => 'required',
            'guest_name' => 'required',
            'guest_message' => 'required',
            'temprature' => 'required',
        ]);

        $device = Device::findOrFail($request->query_id);

        $filenames = $request->device_vedio ? "videos/" . $request->device_vedio : $device->device_vedio;

        // $device_logo = $request->file('device_logo') ? "images/" . $request->file('device_logo')->store('public/images') : $device->device_logo;

        if ($request->file('device_logo') == null) {

            $device_logo =  $device->device_logo;
            
        } else {

            $path_title = $request->file('device_logo')->store('public/images');

            $device_logo = "images/" . basename($path_title);
        }

        $device->update([
            'device_vedio' => $filenames,
            'device_logo' => $device_logo,
            'tv_name' => $request->tv_name,
            'guest_name' => $request->guest_name,
            'guest_message' => $request->guest_message,
            'lat' => $request->lat,
            'longitude' => $request->long,
            'temprature' => $request->temprature,
            'user_id' => $request->user_id,
        ]);

        $this->sendNotificationUpdated($device->id);

        return redirect(route('list_devices'))->with('success', 'Successfully updated');
    }



    public function device_delete(Request $request)
    {


        $device_id = $request->delete_device_id;

        $product_id = Device::findOrFail($device_id);
        $product_id->delete();

        $this->sendNotification($device_id);


        return redirect(route('list_devices'))->with('error', 'devices Deleted successfully');
    }



    public function delete_img_logo($id)
    {

        $images_del = Device::find($id);
        $images_del->device_logo = NULL;
        $images_del->save();
        return redirect()->back()->with('error', 'devices Deleted successfully');
    }


    public function delete_vedio($id)
    {

        $vedio_del = Device::find($id);
        $vedio_del->device_vedio = NULL;
        $vedio_del->save();
        return redirect()->back()->with('error', 'devices Deleted successfully');
    }

    public function change_status_disconnect(Request $request)
    {

        $device = Device::find($request->change_device_status);
        $device->device_status = 'disconnected';
        $device->save();

        $this->sendNotificationdisconnect($device->id);


        return redirect()->back();
    }

    public function change_status_connect(Request $request)
    {

        $device = Device::find($request->change_device_status);
        $device->device_status = 'connected';
        $device->save();

        return redirect()->back();
    }



    public function sendNotification($id)
    {

        $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
        $serverKey = 'AAAAQBnEGdI:APA91bH4Coe5AfqY9BqIVfSgWbqdzsKMcMdRCIcciTcSwnnIhkP84jE-87NjdD2XMkzUT1ZsgbF8zRCD6HE8PN3ivZ3O_KH4Yd0EZVqP5OQNDSZcU3tcDhAFr8NZEM7N0FKG1lPP951n'; // Replace with your Firebase server key

        // $serverKey = 'AAAA63Z5CXw:APA91bHRwnOCsxCUvLca4DlnlD17Yv_tKXnLB1V0UAW3IOmqm8ose8XQKm0u3ZOAGeCxORGXt7awsw34qGGPgI4OvBafxc_YMn2uOitfCaI40XzqtTMxvyO74OMaj1QcfIT76pT5lbTG';
        $topic = '/topics/' . $id; // Replace with your desired topic

        $message = [
            'data' => [

                'title' => 'Deleted',
                'message' => 'This Device ' . $id . ' deleted by user!!',
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

            // dd($data1);
        } else {
            // Notification sent successfully
            $data =  'Notification sent successfully!';

            // dd($data);
        }
    }



    public function sendNotificationUpdated($id)
    {

        $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
        $serverKey = 'AAAAQBnEGdI:APA91bH4Coe5AfqY9BqIVfSgWbqdzsKMcMdRCIcciTcSwnnIhkP84jE-87NjdD2XMkzUT1ZsgbF8zRCD6HE8PN3ivZ3O_KH4Yd0EZVqP5OQNDSZcU3tcDhAFr8NZEM7N0FKG1lPP951n'; // Replace with your Firebase server key

        // $serverKey = 'AAAA63Z5CXw:APA91bHRwnOCsxCUvLca4DlnlD17Yv_tKXnLB1V0UAW3IOmqm8ose8XQKm0u3ZOAGeCxORGXt7awsw34qGGPgI4OvBafxc_YMn2uOitfCaI40XzqtTMxvyO74OMaj1QcfIT76pT5lbTG';
        $topic = '/topics/' . $id; // Replace with your desired topic

        $message = [
            'data' => [

                'title' => 'Updated',
                'message' => 'This Device ' . $id . ' deleted by user!!',
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

            // dd($data1);
        } else {
            // Notification sent successfully
            $data =  'Notification sent successfully!';

            // dd($data);
        }
    }

    public function sendNotificationdisconnect($id)
    {

        $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
        $serverKey = 'AAAAQBnEGdI:APA91bH4Coe5AfqY9BqIVfSgWbqdzsKMcMdRCIcciTcSwnnIhkP84jE-87NjdD2XMkzUT1ZsgbF8zRCD6HE8PN3ivZ3O_KH4Yd0EZVqP5OQNDSZcU3tcDhAFr8NZEM7N0FKG1lPP951n'; // Replace with your Firebase server key

        // $serverKey = 'AAAA63Z5CXw:APA91bHRwnOCsxCUvLca4DlnlD17Yv_tKXnLB1V0UAW3IOmqm8ose8XQKm0u3ZOAGeCxORGXt7awsw34qGGPgI4OvBafxc_YMn2uOitfCaI40XzqtTMxvyO74OMaj1QcfIT76pT5lbTG';
        $topic = '/topics/' . $id; // Replace with your desired topic

        $message = [
            'data' => [

                'title' => 'Discon',
                'message' => 'This Device ' . $id . ' disconnected by user!!',
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

            // dd($data1);
        } else {
            // Notification sent successfully
            $data =  'Notification sent successfully!';

            // dd($data);
        }
    }
}
