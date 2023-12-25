<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tenant;
use App\Models\Vital;

class VitalController extends Controller
{
     /**
     * バイタル一覧表示
     */
    public function index(Request $request)
    {
        // バイタル一覧取得
        $vitals = Vital::where('tenant_id', '=', $request->id)->get();
        $tenants = Tenant::where('id', '=', $request->id)->first();

        return view('vital.index', compact('vitals','tenants'));
    }

    /**
     * バイタル登録
     */
    public function add(Request $request, $id)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [

            ]);
            // バイタル登録
            Vital::create([
                'user_id' => Auth::user()->id,
                'tenant_id' => $request->id,
                'kt' => $request->kt,
                'sbp' => $request->sbp,
                'dbp' => $request->dbp,
                'p' => $request->p,
                'spo2' => $request->spo2,
                'date' => $request->date,
                'time' => $request->time,
            ]);


            return redirect('vitals/'.$request->id);
        }

        return view('vital.add', ['id'=>$id]);
    }

    /**
     * バイタル編集
     */

     public function edit(Request $request, $id)
     {
         $vitals = Vital::where('id', '=', $request->id)->first();
         // POSTリクエストのとき
         if ($request->isMethod('post')) {
             // バリデーション
             $this->validate($request, [

             ]);

             // バイタル編集
             $vitals->kt = $request->kt;
             $vitals->sbp = $request->sbp;
             $vitals->dbp = $request->dbp;
             $vitals->p = $request->p;
             $vitals->spo2= $request->spo2;
             $vitals->date= $request->date;
             $vitals->time= $request->time;
             $vitals->save();

             return redirect('vitals/'.$vitals->tenant_id);
         }

         return view('vital.edit', compact('vitals'), ['id'=>$id]);
     }

    /**
     * バイタル削除
     */
    public function delete(Request $request, $id){
        $vital =  Vital::find($id);
        $tenant_id = $vital->tenant->id;
        $vital->delete();
        return redirect('vitals/'.$tenant_id);
    }

}
