<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolBoard;
use App\Models\SchoolMedium;
use App\Models\SchoolCategory;
use Illuminate\Http\Request;

class SchoolSettingController extends Controller
{
    public function boards()
    {
        return view('admin.settings.board.add');
    }

    public function addboards(Request $request)
    {
      $school_boards=new SchoolBoard();
      $school_boards->board_name=$request->board;
      $school_boards->save();

      return redirect()->back()->with('message','Board Added Successfully');
    }
    
    public function boardlist()
    {
        $board_list=SchoolBoard::all();
        return view('admin.settings.board.boardlist',compact('board_list'));
    }
    public function editboard($id)
    {
        $board_details=SchoolBoard::where('id',$id)->first();
        return view('admin.settings.board.edit',compact('board_details'));
    }
    public function updateboard(Request $request)
    {
        $school_board=new SchoolBoard();
        $school_board->board_name=$request->board;
        $update=SchoolBoard::where('id',$request->id)->update($school_board->toArray());

        $board_list=SchoolBoard::all();
        return view('admin.settings.board.boardlist', compact('board_list'));
    }


    public function mediums()
    {
        return view('admin.settings.medium.add');
    }

    public function addmediums(Request $request)
    {
        $school_medium=new SchoolMedium();
        $school_medium->medium=$request->medium;
        $school_medium->save();
        return redirect()->back()->with('message','Meduim Added Successfully');
    }

    public function mediumlist()
    {
       $medium_list=SchoolMedium::all();
       return view('admin.settings.medium.mediumlist',compact('medium_list')); 
    }
    public function editmedium($id)
    {
        $medium_details=SchoolMedium::where('id',$id)->first();
        return view('admin.settings.medium.edit',compact('medium_details'));
    }
    public function updatemedium(Request $request)
    {
        $school_medium=new SchoolMedium();
        $school_medium->medium=$request->medium;
        $update=SchoolMedium::where('id',$request->id)->update($school_medium->toArray());
        
        $medium_list=SchoolMedium::all();
        return view('admin.settings.medium.mediumlist',compact('medium_list')); 
    }

    public function categorylist()
    {
        $category_list=SchoolCategory::all();
        return view('admin.settings.category.list',compact('category_list'));
    }
}
