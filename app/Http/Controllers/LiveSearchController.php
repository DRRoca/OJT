<?php

namespace App\Http\Controllers;

use App\Notebook;
use App\Note;
use Illuminate\Http\Request;
use DB;

class LiveSearchController extends Controller
{
    public function index()
    {
        return view('search.index');
    }

    public function show($id)
    {
        
        $notebook=Notebook::where('id',$id)->first();
        $notes=$notebook->notes;
        return view('notes.index',compact('notes','notebook'));
    }

    public function action(Request $request)
    {
        if ($request->ajax()) {
            $output_notebook = '';
            $output_note = '';
            $query = $request->get('query');
            if ($query != '') {
                $data = DB::table('notebooks')
                    ->where('name', 'like', '%'.$query.'%')
                    ->orWhere('created_at', 'like', '%'.$query.'%')
                    ->orWhere('updated_at', 'like', '%'.$query.'%')
                    ->get();
            } else {
                $data = DB::table('notebooks')
                    ->orderBy('id', 'desc')
                    ->get();
            }
            $total_row_notebook = $data->count();
            if ($total_row_notebook > 0) {
                foreach ($data as $row) {
                    $output_notebook .= '
                        <tr>
                        <td>'.$row->name.'</td>
                        <td>'.$row->created_at.'</td>
                        <td>'.$row->updated_at.'</td>
                        <td><a class="btn btn-sm btn-primary" href="./notebooks/'.$row->id.'">OPEN</a></td>
                        </tr>

                    ';
                }
            } else {
                $output_notebook = '
                    <tr>
                    <td align="center" colspan="3">No Data Found</td>
                    </tr>
                    ';
            }

            if ($query != '') {
                $data = DB::table('notes')
                    ->where('title', 'like', '%'.$query.'%')
                    ->orWhere('body', 'like', '%'.$query.'%')
                    ->orWhere('created_at', 'like', '%'.$query.'%')
                    ->orWhere('updated_at', 'like', '%'.$query.'%')
                    ->get();
            } else {
                $data = DB::table('notes')
                    ->orderBy('id', 'desc')
                    ->get();
            }
            $total_row_note = $data->count();
            if ($total_row_note > 0) {
                foreach ($data as $row) {
                    // Notebook::where('id',$id)->first();
                    $output_note .= '
                        <tr>
                        <td>'.$row->title.'</td>
                        <td>'.DB::table('notebooks')->where('id',$row->notebook_id)->first()->name.'</td>
                        <td>'.$row->created_at.'</td>
                        <td>'.$row->updated_at.'</td>
                        <td><a class="btn btn-sm btn-primary" href="./notebooks/'.$row->notebook_id.'">OPEN</a></td>
                        </tr>
                        ';
                }
            } else {
                $output_note = '
                    <tr>
                    <td align="center" colspan="4">No Data Found</td>
                    </tr>
                    ';
            }

            $data = array(
                'table_notebook_data'  => $output_notebook,
                'total_notebook_data'  => $total_row_notebook,
                'table_note_data'  => $output_note,
                'total_note_data'  => $total_row_note,
                );
            echo json_encode($data);
        }
    }
}
