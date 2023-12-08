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
                'spo2' => $request->spo2,
            ]);


            return redirect('vitals/index'.$request->id);
        }

        return view('vital.add', ['id'=>$id]);
    }

}
