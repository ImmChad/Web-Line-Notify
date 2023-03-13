<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\DoSomethingJob;
use App\Jobs\SendMail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use LINE\LINEBot;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use Session;
use stdClass;
use Twilio\Rest\Client;
use App\Mail\NotificationMail;
use App\Notifications\NotificationMessage;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\User\UserController;


// use Illuminate\Notifications\Notification;

class NotificationController extends Controller
{
    const NOTIFICATION_NEW_REGISTER = 1;
    const NOTIFICATION_FROM_ADMIN = 2;
    const NOTIFICATION_EMAIL_MAGAZINE = 3;
    function loginAdmin()
    {
        $data_admin = Session::get('data_admin');
        if($data_admin)
        {
            return NotificationController::NavigationView();
        }
        else
        {
            return view('Backend.login-admin');
        }
        
    }
    function handleSubmitLogin(Request $request)
    {

        if(true)
        {
            $password = $request->password;
            $username = $request->username;
            $dataAdmin = DB::table('admin')
            ->where(['password'=>$password,
                     'username'=>$username])
            ->get();
            if(count($dataAdmin)==1)
            {
                $request->session()->put('data_admin',$dataAdmin);
                return NotificationController::NavigationView();
            }
            else
            {
                return view('Backend.login-admin');
            }
        }
        else
        {
            return view('Backend.login-admin');
        }

        
    }
    function NavigationView() {
        $dataList = NotificationController::listConnectLine();
        dump($dataList);

        return Redirect::to('/admin/register-line-list');
    }

    function RegisterLineList() {
        $dataList = NotificationController::listConnectLine();
        // dump($dataList);
        return view('Backend.register-line-list')->with(["dataList" => $dataList]);;
    }

    function NotificationList() {
        $data_admin = Session::get('data_admin');
        if($data_admin)
        {
            $dataList = NotificationController::listAnnounce();
            dump($dataList);
            return view('Backend.notification-list')->with(['dataList' => $dataList]);
        }
        else
        {
            return Redirect::to('/admin');
        }
    }

    function SendNotificationView($notification_type) {
        if($notification_type == 2) {
            return view('Backend.send-notification-view-2');
        } else if($notification_type == 3) {
            return view('Backend.send-notification-view-3');
        } else {
            return Redirect::to('/admin/notification-list');
        }
    }





    function sendMessView() {
        return view('Backend.view-send-mess');
    }


    function index() {

        $dataList = NotificationController::listConnectLine();
        dump($dataList);

        return NotificationController::RegisterLineList()->with(["dataList" => $dataList]);
    }

    

    function sendMessForListUser(Request $request) {

        $userIds = NotificationController::listConnectAll();    
        // dd($request->message,$request->title,$request->delayTime);
        $param = $request->message;
        if(intval($request->type_notification )=== NotificationController::NOTIFICATION_EMAIL_MAGAZINE)
        {
            // dd($request->type_notification,$request->scheduled_at);
            SendMail::dispatch($request->message,$request->title)->delay(now()->addSeconds(intval($request->delayTime)));
        }
        else if (intval($request->type_notification )=== NotificationController::NOTIFICATION_FROM_ADMIN)
        {
            // dd($request->type_notification,$request->scheduled_at);
            // SendLine::dispatch($param)->delay(now()->addSeconds(intval($request->delayTime)));
            // SendMail::dispatch($request->message,$request->title)->delay(now()->addSeconds(intval($request->delayTime)));
            // SendSMS::dispatch($request->message,$request->title)->delay(now()->addSeconds(intval($request->delayTime))); 
        }
               
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        date_default_timezone_get();
        $is_scheduled = $request->delayTime>0;
        $is_sent = false;

        $data2 = DB::table('notification')->insertGetId([
            'type'=>$request->type_notification,
            'announce_title' => $request->title,
            'announce_content' => $request->message,
            'is_sent'=>true,
            'is_scheduled'=>$is_scheduled,
            'created_at' => date('Y/m/d H:i:s')
        ]);
        $userIds = $request->delayTime;
        return $userIds;
    }

    function getAnnounceContent(Request $request) {
        $data = DB::table('tb_announce')
        ->where(['id' => $request->id])
        ->get(
            array(
                'id',
                'announce_title',
                'announce_content',
                'created_at'
                )
        );


        return $data;
    }

    public static function listConnectLine() {
        $data = DB::table('notification_user_settings')
        ->where(['notification_channel_id' =>UserController::CHANNEL_LINE])
        ->get(
            array(
                'id',
                'user_id',
                'notification_channel_id',
                'created_at'
                )
        );

        $newListData = new stdClass();
        $List = [];
        foreach($data as $subData) {
            $displayName = DB::table('notification_user_info')->where(['user_id' =>  $subData->user_id])->get()[0]->displayName;
            $email = DB::table('notification_user_info')->where(['user_id' =>  $subData->user_id])->get()[0]->email;

            $subData->displayName = $displayName;
            $subData->email = $email;

            $List[count($List)] = $subData;
        }
        $newListData = $List;


        return $newListData;
    }

    public static function listConnectAll() {
        $data = DB::table('notification_user_settings')
        ->get(
            array(
                'id',
                'user_id',
                'notification_channel_id',
                'created_at'
                )
        );

        $newListData = new stdClass();
        $List = [];
        foreach($data as $subData) {
            $displayName = DB::table('notification_user_info')->where(['user_id' =>  $subData->user_id])->get()[0]->displayName;
            $email = DB::table('notification_user_info')->where(['user_id' =>  $subData->user_id])->get()[0]->email;

            $subData->displayName = $displayName;
            $subData->email = $email;

            $List[count($List)] = $subData;
        }
        $newListData = $List;


        return $newListData;
    }

    function listAnnounce() {
        $notifications = DB::table('notification')
        ->orderByDesc('id')
        ->get(
        );
        foreach($notifications as $key=>$notification)
        {
            $type_notification = DB::table('notification_type')
            ->where('id',$notification->type)->first();
            if($type_notification);
            $notifications[$key]->name_type = $type_notification->type;
        }

        return $notifications;
    }

    public static function listUser($status) {
        $data = DB::table('notification_user_settings')
        ->where(['notification_channel_id' => $status])
        ->get(
            array(
                'id',
                'user_id',
                'notification_channel_id',
                'created_at'
                )
        );

        $newListData = new stdClass();
        $List = [];
        foreach($data as $subData) {
            $displayName = DB::table('notification_user_info')->where(['user_id' =>  $subData->user_id])->get()[0]->displayName;
            $email = DB::table('notification_user_info')->where(['user_id' =>  $subData->user_id])->get()[0]->email;

            $subData->displayName = $displayName;
            $subData->email = $email;

            $List[count($List)] = $subData;
        }
        $newListData = $List;


        return $newListData;
    }
    function detailNotification(Request $request,$id)
    {
        $dataAdmin = Session::get('data_admin');
        if($dataAdmin){
            $notification = null;
                $notification = DB::table('notification')
                ->where(['id' => $id])
                ->first();
                $type_notification = DB::table('notification_type')
                ->where('id',$notification->type)->first();
                if($type_notification);
                $notification->name_type = $type_notification->type;
                // dump($notification);
                return view("Backend.view-announce-admin-detail")->with(['notification'=>$notification]);
        }
        else{
            return Redirect::to('/');
        }

    }
    public function reqLogout()
    {
        Session::forget('data_admin');
        return Redirect::to('/admin');
    }
}
