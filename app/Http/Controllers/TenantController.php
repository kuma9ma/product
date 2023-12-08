<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tenant;
use App\Models\Vital;
use Laravel\Ui\Presets\Vue;

class TenantController extends Controller
{
    /**
     * 入居者一覧
     */
    public function index()
    {
        // 入居者一覧取得
        $tenants = Tenant::all();

        return view('tenant.index', compact('tenants'));
    }

    /**
     * 入居者登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
            ]);

            // 入居者登録
            Tenant::create([
                'user_id' => Auth::user()->id,
                'tenant_id' => $request->tenant_id,
                'name' => $request->name,
            ]);

            return redirect('/tenants');
        }

        return view('tenant.add');
    }

    /**
     * 入居者削除
     */
    public function delete(Request $request){
        $tenant = Tenant::find($request->id);
        $tenant->delete();

        return redirect('/tenants');
    }

     /**
     * バイタル一覧表示
     */
    public function vital(Request $request)
    {
        // バイタル一覧取得
        $vitals = Vital::where('tenant_id', '=', $request->id)->get();
        $tenants = Tenant::where('id', '=', $request->id)->first();
        

        return view('tenant.vital', compact('vitals','tenants'));
    }

    /**
     * バイタル登録
     */
    public function vital_add(Request $request, $id)
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


            return redirect('tenants/vital/'.$request->id);
        }

        return view('tenant.vital_add', ['id'=>$id]);
    }

}
