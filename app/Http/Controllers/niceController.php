<?php
/**
 * Created by PhpStorm.
 * User: Amine
 * Date: 15/09/2016
 * Time: 11:19
 */

namespace App\Http\Controllers;


use App\NiceActionLog;
use Illuminate\Http\Request;
use App\NiceAction;
use DB;

class niceController extends Controller
{
    public function getHome(){
        //$actions = NiceAction::all();
        $actions = DB::table('nice_actions')->get();
        $actions_logged = NiceActionLog::all();
        $query = DB::table('nice_action_logs')
            ->join('nice_actions' , 'nice_action_logs.nice_action_id' , '=', 'nice_actions.id')
            ->get();
        return view('home', ['actions' => $actions , 'actions_logged' => $actions_logged, 'query' => $query]);
    }


    public function getNiceAction($action, $name=null){

        if($name === null){
            $name = 'you';
        }
        $nice_action = NiceAction::where('name', $action)->first();
        $nice_action_log = new NiceActionLog();
        $nice_action->logged_actions()->save($nice_action_log);
        return view('actions.nice', ['action' => $action, 'name' => $name]);
    }
    public function postNiceAction(Request $request){

        $this->validate($request, [
            'action' => 'required',
            'name' => 'required|alpha'
        ]);
        return view('actions.nice', ['action' => $request['action'], 'name' => $request['name']]);

    }

    public function postInsertNiceAction(Request $request){
        $this->validate($request, [

            'name' => 'required|alpha|unique:nice_actions',
            'niceness' => 'required|numeric'
        ]);

        $actions = new NiceAction();
        $actions->name = ucfirst(strtolower($request['name']));
        $actions->niceness = $request['niceness'];
        $actions->save();

        $actions = NiceAction::all();

        return redirect()->route('home', ['action' => $actions]);

    }
}