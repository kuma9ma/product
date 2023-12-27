<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tenant;
use App\Models\Meal;


class MealController extends Controller
{
    public function index(Request $request)
    {
        // 食事摂取量一覧取得
        $meals = Meal::where('tenant_id', '=', $request->id)->get();
        $tenants = Tenant::where('id', '=', $request->id)->first();

        return view('meal.index', compact('meals', 'tenants'));
    }

    public function add(Request $request, $id)
    {
        //入居者名
        $tenants = Tenant::where('id', '=', $request->id)->first();
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, []);

            // 食事摂取量登録
            Meal::create([
                'user_id' => Auth::user()->id,
                'tenant_id' => $request->id,
                'morning_main' => $request->morning_main,
                'morning_side' => $request->morning_side,
                'lunch_main' => $request->lunch_main,
                'lunch_side' => $request->lunch_side,
                'dinner_main' => $request->dinner_main,
                'dinner_side' => $request->dinner_side,
                'date' => $request->date,
            ]);

            return redirect('meals/' . $request->id);
        }

        return view('meal.add', compact('tenants'), ['id' => $id]);
    }

    /**
     * 食事摂取量編集
     */

    public function edit(Request $request, $id)
    {
        $meals = Meal::where('id', '=', $request->id)->first();
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, []);

            // 編集
            $meals->morning_main = $request->morning_main;
            $meals->morning_side = $request->morning_side;
            $meals->lunch_main = $request->lunch_main;
            $meals->lunch_side = $request->lunch_side;
            $meals->dinner_main = $request->dinner_main;
            $meals->dinner_side = $request->dinner_side;
            $meals->date = $request->date;
            $meals->save();

            return redirect('meals/' . $meals->tenant_id);
        }

        return view('meal.edit', compact('meals'), ['id' => $id]);
    }

    /**
     * 食事摂取量削除
     */
    public function delete(Request $request)
    {
        $meal =  Meal::find($request->id);
        $tenant_id = $meal->tenant->id;
        $meal->delete();
        return redirect('meals/' . $tenant_id);
    }
}
