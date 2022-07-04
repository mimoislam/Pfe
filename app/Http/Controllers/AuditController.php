<?php

namespace App\Http\Controllers;

use App\Enums\AuditStatus;
use App\Enums\ScanEngStatus;
use App\Enums\ServerStatus;
use App\Enums\ResultStatus;
use App\Enums\AuditServerStatus;
use App\Models\Audit;
use App\Models\AuditServer;
use App\Models\File;
use App\Models\PlayBook;
use App\Models\ScanEng;
use App\Models\Server;
use App\Models\Result;
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
                $serverObject->status=ServerStatus::WORKING;
                $serverObject->save();



                $auditServer=new AuditServer;

                $auditServer->ipAddress=$serverObject->ipAddress;
                $auditServer->audit_id=$audit->id;
                $auditServer->server_id=$serverObject->id;
                $auditServer->playbook_id=$playbook->id;
                $auditServer->save();


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
        $list_of_ids=array();

        foreach ($audit->auditServers as $key => $value) {
            if($request->playbook_id==$value->playbook_id){
                array_push($list_of_ids,
                ["id"=>$value->id,"ipAddress"=>$value->ipAddress]);
                $value->status=AuditServerStatus::FINISHED;
                $value->save();
            }
        }

        $regexs=Playbook::find($value->playbook_id)->regexs;
        $expretions=$regexs[0]->expretions;
        $sizeRegexExpretions=sizeof($expretions);

         foreach ($request->data as $key => $value) {
            $id_audit_server=$this->checkIfExist('213.12.199.1',$list_of_ids);
            if( $id_audit_server !=-1)
            {   
               $result= new Result;
               if( $value['changed']==TRUE)
               {       
                   if($key<$sizeRegexExpretions){
                    preg_match('/'.$expretions[$key]->expretion.'/m', $value['stdout'], $matches);
                    $size= sizeof($matches);
                    if($size!=0){
                        $result->status=ResultStatus::CONFORM_BY_SYSTEM;

                    }else  {
                        $result->status=ResultStatus::FAILED_BY_REGEX;

                    }

                   }else{
                    $result->status=ResultStatus::OUT_OF_REGEX;
                   }
               }        
               else
               if ($request->data[0]['failed']==TRUE) {
                return  ResultStatus::CONFORM_BY_SYSTEM;

                   $result->status=ResultStatus::FAILED_BY_SYSTEM;
               }
               $result->result= $value['stdout'];
               $result->error=!empty($$request->data[0]['stderr']) ? $value['stderr'] : "";
               $result->audit_server_id=$id_audit_server;

               $result->save();
           }        
         }


     
//        $this->validate($request, [
//            'file' => 'required',
//            'file.*' => 'mimes:json'
//        ]);
        // $imageName = time().'.'.$request->file->extension();

        // $request->file->move(public_path('file/'.$audit->id), $imageName);

        // $file= new File;
        // $file->path=$imageName;

        // $file->audit_id=$audit->id;
        // $file->save();

        return response()->json(['success' => 'success'], 200);

    }

    public function checkIfExist($host,$list){
        foreach ($list as $key => $value) {
            if($value['ipAddress']==$host)
            return $value['id'];
        }
        return -1;

    }
}
