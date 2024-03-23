<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;

class VoteController extends Controller
{

    public function index(Request $request)
    {

    }

    public function store(Request $request)
    {

    }
    public function update(Request $request, $id){


    }
    public function delete($id)
    {
        $vote = Vote::findOrFail($id);
    }
}

