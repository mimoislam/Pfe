<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AuditServer;
use App\Enums\ResultStatus;
use App\Enums\AuditServerStatus;
use Illuminate\Support\Facades\Redirect;

use View;

class AuditServerController extends Controller
{


    public function show( $id)
    {
        // get the shark
        $audit_server= AuditServer::find($id);

        // show the view and pass the shark to it
        return View::make('audit_server.show')
            ->with('auditServer', $audit_server);
    }
    public function manual($id,){

        $audit_server= AuditServer::find($id);

        return View::make('audit_server.manual')
        ->with('auditServer', $audit_server);
    }     
    public function manualstore($id,Request $request){
        $audit_server= AuditServer::find($id);
        $size=sizeof($audit_server->results);
        $conformt_results=$request->input('checkbox');
        if($size==(sizeof($conformt_results))){
            foreach ($audit_server->results as $key => $result) {
                if(in_array($result->id,$conformt_results)){
                    $result->status=ResultStatus::CONFORM;
                    $result->save();
                }
                     
            }
        }else{
            foreach ($audit_server->results as $key => $result) {
                if(in_array($result->id,$conformt_results)){
                    $result->status=ResultStatus::CONFORM;
                    $result->save();
                }
                     
            }
            $audit_server->status=AuditServerStatus::FINISHED;
            $audit_server->save();
        }
        return Redirect::to('admin/auditserver/'.$id.'/manual');

    }      
    
}
