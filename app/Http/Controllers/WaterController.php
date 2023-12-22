<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tenant;
use App\Models\Water;

class WaterController extends Controller
{
    /**
     * 水分一覧表示
     */
    public function index(Request $request)
    {
        // 水分一覧取得
        $waters = Water::where('tenant_id', '=', $request->id)->get();
        $tenants = Tenant::where('id', '=', $request->id)->first();


        return view('water.index', compact('waters', 'tenants'));
    }

    /**
     * 水分登録
     */
    public function add(Request $request, $id)
    {
        //入居者名
        $tenants = Tenant::where('id', '=', $request->id)->first();
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, []);
            // 水分登録
            Water::create([
                'user_id' => Auth::user()->id,
                'tenant_id' => $request->id,
                'name' => $request->name,
                'water' => $request->water,
                'date' => $request->date,
                'time' => $request->time,
            ]);


            return redirect('waters/' . $request->id);
        }

        return view('water.add', compact('tenants'), ['id' => $id]);
    }

    /**
     * 水分編集
     */

    public function edit(Request $request, $id)
    {
        //入居者名
        $waters = Water::where('id', '=', $request->id)->first();
        $tenants = Tenant::where('id', '=', $waters->tenant_id)->first();
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, []);

            // 水分編集
            $waters->kt = $request->name;
            $waters->sbp = $request->water;
            $waters->dbp = $request->date;
            $waters->p = $request->time;
            $waters->save();

            return redirect('waters/' . $waters->tenant_id);
        }

        return view('water.edit', compact('waters', 'tenants'), ['id' => $id]);
    }

    /**
     * 水分削除
     */
    public function delete(Request $request)
    {
        $water =  Water::find($request->id);
        $tenant_id = $water->tenant->id;
        $water->delete();
        return redirect('waters/' . $tenant_id);
    }
}
