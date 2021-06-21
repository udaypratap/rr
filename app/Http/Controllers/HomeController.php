<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Mail\XkcdMail;
use Mail;
use Auth;

class HomeController extends Controller
{
    private $num = 0;
    private $latestnum = 0;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    private function latestXKCDnumver(){
        $raw = json_decode(file_get_contents('http://xkcd.com/info.0.json'), true); 
        $this->latestnum = $raw['num'];
    }

    /**
     * [readingRights used to send the mail to loggedin user]
     * @param  Request $request [request params]
     * @return [type]           [view the page]
     */
    public function readingRights(Request $request){
        $this->latestXKCDnumver();
        $this->num = rand(1, $this->latestnum);
        $rawdata = json_decode(file_get_contents('http://xkcd.com/'.$this->num.'/info.0.json'), true); 
        $imgurl = $rawdata['img'];
        $contents = file_get_contents($imgurl);
        $name = $this->num . '-' . substr($imgurl, strrpos($imgurl, '/') + 1);
        Storage::disk('public')->put($name, $contents, 'public');
        $storageurl = url(Storage::disk('public')->url($name));
        $storagepath = Storage::disk('public')->path($name);

        $maildata = [];
        $maildata['subject'] = $rawdata['safe_title'];
        $maildata['message'] = $rawdata['transcript'] . "\n" . $rawdata['alt'];
        $maildata['imageurl'] = $storageurl;
        $maildata['storagepath'] = $storagepath;

        Mail::to(Auth::user()->email)->send(new XkcdMail($maildata));

        return redirect()->route('home')->with('status', 'Mail Send.');
    }
}
