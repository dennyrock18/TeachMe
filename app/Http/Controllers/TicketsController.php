<?php namespace TeachMe\Http\Controllers;

use TeachMe\Http\Requests;
use TeachMe\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TicketsController extends Controller {

	public function latest()
    {
        return view('tickests.list');
    }

    public function popular()
    {
        return view('tickests.list');
    }

    public function open()
    {
        return view('tickests.list');
    }

    public function closed()
    {
        return view('tickests.list');
    }

    public function details($id)
    {
        return view('tickests.details');
    }

}
