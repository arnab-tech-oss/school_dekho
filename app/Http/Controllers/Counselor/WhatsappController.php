<?php

namespace App\Http\Controllers\Counselor;

use App\Core\Helper;
use App\Http\Controllers\Controller;
use App\Models\AllLead;
use App\Models\SchoolLead;
use App\Service\WhatsAppService;
use Illuminate\Http\Request;

class WhatsappController extends Controller
{
    public function SendWhatsAppMessage(Request $request)
    {
        $lead_id = $request->lead_id;
        $whatsapp_number = $request->whatsappnumber;
        $lead_details = AllLead::where('id', $lead_id)->first();
        $school_lead_transfer = SchoolLead::with('school.school_address')->with('school.school_claim_counselor')->where('all_lead_id', $lead_id)->get();
        // return $school_lead_transfer;
        $parent_name = $lead_details->parent_name;
        $message = "Dear $parent_name,\nWe are delighted to inform you that we have transferred your query to the following schools:\n\n";
        $i = 0;
        foreach ($school_lead_transfer as $data) {
            if ($data->school?->is_mou == 1) {
                $i++;
                $name = $data->school?->name;
                $contact = $data->school?->school_claim_counselor[0]->phone;
                $message .= "$i. Name: $name\nContact: $contact\n";
            }
        }
        $message .= "\nThanks,\nLead Management Team,\nSchool Dekho - Dekho fir chuno!\nContact:18002588074\nWeb:schooldekho.org \nt";
        $status = WhatsAppService::SendWhatsappMessage($whatsapp_number, $message);
        return response()->json(['is_success' => $status, 'message' => $status ? "Message sent successfully" : 'Something went wrong']);
    }
}
