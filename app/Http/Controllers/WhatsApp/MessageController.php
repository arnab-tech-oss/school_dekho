<?php

namespace App\Http\Controllers\WhatsApp;

use App\Core\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\WhatsappMessage;
use App\Service\WhatsAppService;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function dashboard()
    {
        $total_message_sent = WhatsappMessage::count();
        return view('whatsapp.dashboard', compact('total_message_sent'));
    }
    public function send()
    {
        return view('whatsapp.add.add');
    }
    public function send_message(Request $request)
    {
        $numbers = [];
        $numbers = explode(' ', $request->phone);
        $image = $request->logo_path;
        $upload = FileHelper::Upload($image, null, FileHelper::$whatsapp);
        $url = FileHelper::GetFileUrl($upload->upload_name, FileHelper::$whatsapp);
        foreach ($numbers as $number) {
            $entity = new WhatsappMessage();
            $entity->number = $number;
            $entity->path = $url;
            $entity->message = $request->about;
            $entity->status = WhatsAppService::SendWhatsappMediaMessage($number, $entity->message, $url);
            // return json_decode($entity->status);
            $entity->save();
        }
        return redirect()->back();
    }
    public function send_list()
    {
        $message_list = WhatsappMessage::all();
        return view('whatsapp.list.message_list', compact('message_list'));
    }
}
