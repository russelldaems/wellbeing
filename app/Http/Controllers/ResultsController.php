<?php

namespace App\Http\Controllers;

use App\Notifications\SendResultsPdfNotification;
use App\Result;
use Illuminate\Support\Facades\File;
use PDF;

class ResultsController extends Controller
{
    public function show($result_id)
    {
        $result = Result::whereHas('user', function ($query) {
                $query->whereId(auth()->id());
            })->findOrFail($result_id);
        
        return view('client.results', compact('result'));
    }
}
