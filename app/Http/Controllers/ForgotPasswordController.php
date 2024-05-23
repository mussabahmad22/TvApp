<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Mail\forgetPassword;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PHPMailer\PHPMailer\PHPMailer;

class ForgotPasswordController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function showForgetPasswordForm()
    {
        return view('auth.forgot-password');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user->is_admin != 1) {

            // try{
            $token = Str::random(64);

            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);

            // Mail::send('email.forgetPassword', ['token' => $token], function ($message) use ($request) {
            //     $message->to($request->email);
            //     $message->subject('Reset Password');

            // });

            // try{

            //     Mail::to($request->email)->send(new forgetPassword($token));

            //     // Mail::to($email['multiple_emails'])->send(new RatingsEmail($ratings, $name,  $class_name));


            // } catch (Exception $e){

            //     return $e. "Please Check you email";
            // }


            // return redirect(route('dashboard'))->with('message', 'We have e-mailed your password reset link!');


            // } catch(Exception $e ){
            //     return $e.'ok';

            // }

            require base_path("vendor/autoload.php");
            $mail = new PHPMailer(true);   

            try {   
                
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Host = 'codecoyapps.com ';         
                $mail->SMTPAuth = true;
                $mail->Username = 'no-reply@codecoyapps.com';  
                $mail->Password = 'GreetScreen@1234';    
                $mail->SMTPSecure = 'tls';              
                $mail->Port = 587;                    

                $mail->setFrom('no-reply@codecoyapps.com', 'Greet Screen');
                $mail->addAddress($request->email);
              

                $mail->isHTML(true);               


                $mail->Body    = view('email.forgetPassword', compact('token'))->render();


                if (!$mail->send()) {
                    return false;
                    
                } else {

                    return redirect(route('dashboard'))->with('message', 'We have e-mailed your password reset link!');
                }
            } catch (Exception $e) {
                return false;
            }
        } else {

            return redirect(route('dashboard'))->with('error', 'you are admin');
        }
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function showResetPasswordForm($token)
    {
        return view('auth.forgetPasswordLink', ['token' => $token]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();

        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();

        return redirect('/dashboard')->with('message', 'Your password has been changed!');
    }
}
