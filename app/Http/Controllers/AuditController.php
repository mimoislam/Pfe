<?php

namespace App\Http\Controllers;

use App\Enums\AuditStatus;
use App\Enums\ScanEngStatus;
use App\Enums\ServerStatus;
use App\Models\Audit;
use App\Models\AuditServer;
use App\Models\File;
use App\Models\PlayBook;
use App\Models\ScanEng;
use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use View;
class AuditController extends Controller
{

    public function  index (){
        $audits = Audit::all();

        return  View::make('audit.index')
            ->with([
                'audits'=> $audits,
            ]);;
    }

    public function create(){


        $playbooks = playBook::all();
        $scanEngs = ScanEng::all();
        $servers = Server::all();
        return View::make('audit.create')
            ->with([
                'playbooks'=> $playbooks,
                'scanEngs'=> $scanEngs,
                'servers'=> $servers,
            ]);

    }



    public function store (Request $request){
        $request->validate([
            'description' => 'required',
            'servers' => 'required',
            'playbooks' => 'required',
            'scanEngs' => 'required',
        ]);

        $servers=$request->input('servers');




        // change status of  ScanEng
        $scanEng = ScanEng::find($request->input('scanEngs'));
        $scanEng->status=ScanEngStatus::WORKING;
        $scanEng->save();

        // save new audit
        $audit=new Audit;
        $audit->description=$request->input('description');
        $audit->scan_eng_id=$scanEng->id;
        $audit->user_id=Auth::user()->id;
        $audit->status=AuditStatus::WORKING;
        $audit->save();


        // get the playBook
        $playbook = playBook::find($request->input('playbooks'));


        foreach ($servers as $server)
        {
            $serverObject = Server::find($server);
//            if($serverObject->status==ServerStatus::WORKING){
//                // add the error message
//                return Redirect::to('admin/audit');
//            }else{





                $serverObject->status=ServerStatus::WORKING;
                $serverObject->save();



                $auditServer=new AuditServer;

                $auditServer->ipAddress=$serverObject->ipAddress;
                $auditServer->audit_id=$audit->id;
                $auditServer->server_id=$serverObject->id;
                $auditServer->playbook_id=$playbook->id;
                $auditServer->save();
                //// add http request
//            }

        }
        return Redirect::to('admin/audit');
    }
    public function show( $id)
    {
        // get the shark
        $audit= Audit::find($id);

        // show the view and pass the shark to it
        return View::make('audit.show')
            ->with('audit', $audit);
    }

    public function successAudit($id,Request $request){
        /// first how to read file and store it inside our database (finished)
        /// second how to read from json and put it inside then add new Result
        ///  third save  the result  part
        ///  lastly change the scan Eng and server  styatus and audit if he finished all the other auditServer  check by list ip address
        $audit= Audit::find($id);
//        $this->validate($request, [
//            'file' => 'required',
//            'file.*' => 'mimes:json'
//        ]);
        $imageName = time().'.'.$request->file->extension();

        $request->file->move(public_path('file/'.$audit->id), $imageName);

        $file= new File;
        $file->path=$imageName;

        $file->audit_id=$audit->id;
        $file->save();
        $students = json_decode(file_get_contents(public_path('file/'.$audit->id.'/'. $imageName) ), true);
        return  $students;

        return $audit;
    }


}
