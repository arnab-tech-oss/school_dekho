<?php
namespace App\Http\Controllers\SchoolAdmin;
use App\Models\Support;
use App\Core\FileHelper;
use App\Models\SchoolClaim;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class SupportController extends Controller
{
    public function ticket_generate(Request $request)
    {
        $entity = new Support();
        $entity->user_id = Auth::user()->id;
        $entity->issue = $request->issue;
        $entity->description = $request->description;
        $entity->image = FileHelper::Upload($request->image)->upload_name;
        $entity->status = 0;
        $entity->save();
        return redirect()->back()->with(['ticket_message' => 'We will get back you soon']);
    }
    public function ticket_history()
    {
        $user_id = Auth::user()->id;
        $tickets = Support::where('user_id', $user_id)->get();
        return view('school_admin_new.ticket_history', compact('tickets'));
    }
    public function ticket_details($id)
    {
        $ticket_details = Support::where('id', $id)->first();
        $ticket_path = FileHelper::GetFileUrl($ticket_details?->image);
        $total_schools = SchoolClaim::where('claim_id', Auth::user()->id)->count();
        return view('school_admin_new.ticketdetails', compact('ticket_details', 'total_schools', 'ticket_path'));
    }
}
