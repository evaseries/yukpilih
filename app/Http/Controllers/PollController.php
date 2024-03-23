<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Models\Vote;
use App\Models\Choice;
use App\Models\Division;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class PollController extends Controller
{
    public function __construct(){
        $this->middleware('role:admin', ['except' => ['list_poll', 'get_a_poll', 'vote']]);
    }

    public function list_poll(){
        $data = Poll::get();
        return response()->json($data);
    }
    public function get_a_poll($id){
        $poll = Poll::with(['choices'])->findOrFail($id);

        if (!$poll) {
            return response()->json(['message' => 'Poll not found'], 404);
        }

        $result = [];
        $total_vote = Vote::where('poll_id', $id)->count();
        $divisis = Division::get();


        if ($total_vote > 0) {
            $choices = Choice::where('poll_id', $id)->get();

            foreach($divisis as $divisi){
                $sementara=0;
                foreach ($choices as $c) {
                    $total_choidce_divisi = Vote::where('poll_id', $id)->where('choice_id', $c->id)->where('division_id', $divisi->id)->count();
                    if($total_choidce_divisi >= $sementara) {
                        $sementara = $total_choidce_divisi;
                        if($sementara > 0){
                            $result[$divisi->name]['win'][] = $c->choice;
                            // $result[$divisi->name][$c->choice.'_sementara'] = 1;
                        }
                    }else{
                        $sementara = 0;
                    }
                    $hitung_perchoice = Vote::where('choice_id', $c->id)->count();
                    $total = ($total_vote > 0) ? $hitung_perchoice / $total_vote * 100 : 0;
                    // $result[$divisi->name][$c->choice] = $total;
                    // $result[$divisi->name][$c->choice] = $total_choidce_divisi;
                    // $poin = count($result[$divisi->name]['win'] ?? []);
                }

            }
        }

        $hasil_perhitungan = [];
        $hasil_akhir = [];

        foreach($result as $key => $res){
            $total = 0;
            foreach($res['win'] as $win){
                $poin = count($res['win']);
                $hasil_perhitungan[$key][$win] = $poin > 0 ? 1 / $poin : 0;
                $total += $total; $poin > 0 ? 1 / $poin : 0;
                $hasil_akhir[$win][] = $poin > 0 ? 1 / $poin : 0;
            }
            $hasil_perhitungan[$key]['total'] = $total;
        }

        $hasil_akhir_pisan = [];

        foreach($hasil_akhir as $key => $ha){
            $hasil_akhir_pisan[$key] = array_sum($ha);
        }

        $hap = [];
        foreach($hasil_akhir_pisan as $key => $ha){
            $hap[$key] = round($ha / array_sum($hasil_akhir_pisan) * 100,2);
        }

        return response()->json([$poll, 'result' => $hap]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description'=> 'required',
            'deadline' => 'required',
            'choices' => 'required|array|min:2',
            'choices.*' => 'distinct'
        ]);


        $poll = new Poll;
        $poll->title = $request->input('title');
        $poll->description = $request->input('description');
        $poll->deadline = $request->input('deadline');
        $poll->save();

        foreach($request->choices as $item)
        {
            $choice = new Choice;
            $choice->choice = $item;
            $choice->poll_id = $poll->id;
            $choice->save();
        }



        return response()->json(['message' => 'success'],200);
    }
    public function update(Poll $poll, Request $request, $id){

        $request->validate([
            'title' => 'required|string',
            'description'=> 'required|string',
            'deadline' => 'required|date'
        ]);

        $poll = Poll::find($id);
        $poll->title = $request->input('title');
        $poll->description = $request->input('description');
        $poll->deadline = $request->input('deadline');
        $poll->save();
        return response()->json(['Message' => 'update success']);
    }
    public function delete($id)
    {
        $poll = Poll::findOrFail($id);
        if (! $poll) {
            return response()->json(['message' => 'user not found'],500);
        }

        $poll->delete();

        return response()->json(['message' => 'success'],200);
    }
    public function vote(Request $request, $poll_id, $choice_id)
    {
        $cek_vote = Vote::where('poll_id', $poll_id)->where('user_id', auth('api')->user()->id)->count();

        if ($cek_vote > 0) {
            return response()->json(['message' => 'You have already voted']);
        }

        $vote = new Vote;
        $vote->poll_id = $poll_id;
        $vote->choice_id = $choice_id;
        $vote->division_id = auth('api')->user()->division_id;
        $vote->user_id = auth('api')->user()->id;
        $vote->save();

        $choices = Choice::where('poll_id', $poll_id)->get();
        $points = [];
        $divisis = Division::get();

        foreach ($choices as $choice) {
            $choiceVoteCount = Vote::where('poll_id', $poll_id)->where('choice_id', $choice->id)->count();
            $points[$choice->choice]['total'] = $choiceVoteCount;

            foreach($divisis as $divisi){
                $points[$choice->choice]['divisi'][$divisi] = 0; // Vote::where('poll_id', $poll_id)->where('choice_id', $choice->id)->count();
            }
        }

        // $totalPoints = array_sum($points);
        // $percentages = [];

        // foreach ($points as $choice => $point) {
        //     $percentage = ($point / $totalPoints) * 100;
        //     $percentages[$choice] = round($percentage, 2);
        // }

        return response()->json(['message' => 'You voted', 'poll_results' => $points]);
    }

}

