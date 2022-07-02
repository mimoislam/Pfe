<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AuditServer;
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

}
