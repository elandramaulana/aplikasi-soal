<?php

namespace App\Http\Controllers;

use App\Models\Cpmk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AddSoalController extends Controller
{
    public function index($id)
    {
        $soalObjective = DB::table('cpmk')
            ->join('objective', 'cpmk.id', '=', 'objective.cpmk_id')
            ->select(
                'cpmk.id as cpmk_id',
                'objective.id as objective_id',
                'objective.question as objective_question',
                'objective.question_photo as objective_question_photo',
                'objective.answer_a as objective_answer_a',
                'objective.answer_b as objective_answer_b',
                'objective.answer_c as objective_answer_c',
                'objective.answer_d as objective_answer_d'
            )
            ->where('cpmk.id', $id)
            ->get();

        $soalEssay = DB::table('cpmk')
            ->join('essay', 'cpmk.id', '=', 'essay.cpmk_id')
            ->select(
                'cpmk.id as cpmk_id',
                'essay.id as essay_id',
                'essay.question as essay_question',
                'essay.question_photo as essay_question_photo'
            )
            ->where('cpmk.id', $id)
            ->get();

        return view('addsoal.index', compact('soalObjective', 'soalEssay'));
    }


    public function store($id) {
        $cpmk = DB::table('cpmk')->where('id',$id)->get();
        return view('addsoal.store',compact('cpmk'));
    }
    public function store_essay(Request $request)
    {
        $cpmk_id = $request->cpmk_id;

        if ($request->hasFile('question_photo')) {
            $validator = Validator::make($request->all(), [
                'question_photo' => 'image|max:1024',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            $extension = $request->file('question_photo')->getClientOriginalExtension();
            $fileName = 'Soal Essay_' . uniqid() . '.' . $extension;
            $request->file('question_photo')->storeAs('public/essay/' . $cpmk_id, $fileName);
        } else {
            $fileName = null; // Handle the case when no file is uploaded
        }

        $test = DB::table('essay')->insert([
            'cpmk_id' => $cpmk_id,
            'question' => $request->question,
            'point' => $request->point,
            'question_photo' => $fileName
        ]);

        return back();
    }

    public function store_objective(Request $request)
    {
        $cpmk_id = $request->cpmk_id;

        if ($request->hasFile('question_photo')) {
            $validator = Validator::make($request->all(), [
                'question_photo' => 'image|max:1024',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            $extension = $request->file('question_photo')->getClientOriginalExtension();
            $fileName = 'Soal Objective_' . uniqid() . '.' . $extension;
            $request->file('question_photo')->storeAs('public/objective/' . $cpmk_id, $fileName);
        } else {
            $fileName = null; // Handle the case when no file is uploaded
        }
        $test = DB::table('objective')->insert([
            'cpmk_id' => $cpmk_id,
            'question' => $request->question,
            'question_photo' => $fileName,
            'answer_a' => $request->answer_a,
            'answer_b' => $request->answer_b,
            'answer_c' => $request->answer_c,
            'answer_d' => $request->answer_d,
            'correct_answer' => $request->correct_answer,
            'point' => $request->point,
        ]);

        return back();
    }
}
