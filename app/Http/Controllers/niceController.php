<?php
/**
 * Created by PhpStorm.
 * User: Amine
 * Date: 15/09/2016
 * Time: 11:19
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class niceController extends Controller
{
    public function getNiceAction($action, $name=null){
        return view('actions.' .$action, ['name' => $name]);
    }
    public function postNiceAction(Request $request){
        if(isset($request['action']) && $request['name']){
            if(strlen($request['name'])>0){
                return view('actions.nice', ['action' => $request['action'], 'name' => $request['name']]);
            }
            return redirect()->back();
        }
        return redirect()->back();
    }
}