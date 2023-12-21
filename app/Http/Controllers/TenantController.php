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
    public function index(Request $request)
    {
        // 入居者一覧取得
        $keyword = $request->input('keyword');
        if(!empty($keyword))
        {   //検索表示
            $tenants = Tenant::where('name', 'LIKE', "%{$keyword}%")->get();
        } else {
            //全件表示
            $tenants = Tenant::all();
        }

        $attentionVitals =
            Vital::where('kt', '>=', 37.5)
            ->orWhere('sbp', '>=', 135)
            ->orWhere('sbp', '<=', 90)
            ->orWhere('dbp', '<=', 60)
            ->orWhere('spo2', '<=', 89)
            ->get();


        return view('tenant.index', compact('tenants', 'attentionVitals'));
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
     * 入居者編集
     */

    public function edit(Request $request)
    {
        $tenants = Tenant::where('id', '=', $request->id)->first();
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
            ]);

            // 入居者編集
            $tenants->name = $request->name;
            $tenants->save();

            return redirect('/tenants');
        }
        
        return view('tenant.edit', compact('tenants'));
    }


    /**
     * 入居者削除
     */
    public function delete(Request $request)
    {
        $tenant = Tenant::find($request->id);
        $tenant->vitals()->delete();
        $tenant->delete();

        return redirect('/tenants');
    }


    /**
     * バイタル異常値の入居者一覧
     */
    public function show()
    {
        $tenants = Tenant::where('kt', '=>', 37.5)->get();
        dd($tenants);
    }
}
