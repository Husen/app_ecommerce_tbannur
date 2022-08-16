<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Email;

class EmailController extends Controller
{
    public function index()
    {
        Mail::to('saidinahusen10.hs@gmail.com')->send(new Email());        
        // return new Email;
        // return 'Berhasil mengirim email';
    }
}
