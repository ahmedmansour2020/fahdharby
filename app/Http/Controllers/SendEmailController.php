<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\AttatchEmail;
use App\Models\Subscriper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    public function send(Request $request)
    {
        $emails = [];
        $type = request('type');
        if (request('emails')) {

            $emails_ids = request('emails');

            foreach ($emails_ids as $item) {
                if ($type == 'contact_users') {

                    $user = User::find($item);
                } else {
                    $user = Subscriper::find($item);
                }

                array_push($emails, $user->email);
            }
           
          
        }
        $att_emails = AttatchEmail::whereNull('type')->get();
        foreach ($att_emails as $item) {
            array_push($emails, $item->email);
        }
        AttatchEmail::where('id', '>', 0)->delete();

        foreach ($emails as $email) {
            $data = array(
                'message' => request('message'),
                'mail' => 'admin@ecommerce.com',
                'subject' => 'eCommerce',
            );
            
            Mail::to($email)->send(new SendMail($data));
        }

        return redirect()->route('admin')->with('success', __('items.success_email'));

    }
}
