<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Cases;

class CasesController extends Controller
{
    //新增data到資料表
    public function addCases(Request $req): JsonResponse
    {
        $name = $req->input('name');
        $need_exp = $req->input('need_exp');
        $point_reward = $req->input('point_reward');
        $experience_reward = $req->input('experience_reward');
        $fame_reward = $req->input('fame_reward');
        $point_penalty = $req->input('point_penalty');
        $partial_experience_reward = $req->input('partial_experience_reward');
        $fame_penalty = $req->input('fame_penalty');

        Cases::create([
            'name' => $name,
            'need_exp' => $need_exp,
            'point_reward' => $point_reward,
            'experience_reward' => $experience_reward,
            'fame_reward' => $fame_reward,
            'point_penalty' => $point_penalty,
            'partial_experience_reward' => $partial_experience_reward,
            'fame_penalty' => $fame_penalty,
        ]);
        return response()->json(['message' => 'Question added.']);
    }

    //取得特定/所有case
    public function getCases(Request $req): JsonResponse
    {
        //要搜尋的case的名字
        $name = $req->input('name'); // 若傳送陣列需用Json
        if ($name) {
            $result = Cases::where('name', $name)->get();
        } else {
            $result = Cases::all();
        }
        return response()->json($result);
    }

    public function deleteCases(Request $req): JsonResponse
    {
        //傳回要刪除的case的id(非空)
        $id = $req->input(('id'));
        Cases::where('id', $id)->delete();
        return response()->json(['message' => 'Question deleted.']);
    }

    public function getCasesData(Request $req): JsonResponse
    {
        $id = $req->input('id');
        $result = Cases::where('id', $id)->first();
        ;
        return response()->json($result);
    }

    public function casesModify(Request $req): JsonResponse
    {
        $id = $req->input('id');
        $name = $req->input('name');
        $need_exp = $req->input('need_exp');
        $point_reward = $req->input('point_reward');
        $experience_reward = $req->input('experience_reward');
        $fame_reward = $req->input('fame_reward');
        $point_penalty = $req->input('point_penalty');
        $partial_experience_reward = $req->input('partial_experience_reward');
        $fame_penalty = $req->input('fame_penalty');

        Cases::where('id', $id)->update([
            'name' => $name,
            'need_exp' => $need_exp,
            'point_reward' => $point_reward,
            'experience_reward' => $experience_reward,
            'fame_reward' => $fame_reward,
            'point_penalty' => $point_penalty,
            'partial_experience_reward' => $partial_experience_reward,
            'fame_penalty' => $fame_penalty,
        ]);
        return response()->json(['message' => 'Question  Modified.']);
    }
}
