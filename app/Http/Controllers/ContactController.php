<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;
use Symfony\Component\Console\Output\ConsoleOutput;
use Illuminate\Support\Facades\Log;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Auth::user()->is_admin == 1){
            $contacts = Contact::latest()->paginate(5);
        }else{
            $contacts = DB::select('select * from contacts where email = ?', [ Auth::user()->email ]);
        }



        return view('contact.index' , compact("contacts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function form(Request $request){

     $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'company' => ['required',  'string', 'max:255'],
        'detail' => ['required',  'string', 'max:255'],

    ]);

   $Contact = Contact::create([
        'name' => $request->name,
        'email' => $request->email,
        'company' => $request->company,
        'status' => "notview",
        'detail' => $request->detail,
    ]);



    $sToken = $_ENV['sToken'];

    $sMessage = "\n"  . 'Form Laravel' .
    "\n"  . 'Name : ' . $request->name  .
    "\n"  . 'Email : ' . $request->email  .
    "\n"  . 'Company : ' .  $request->company  .
    "\n"  . 'Detail : ' . $request->detail  .
    "\n";

    $chOne = curl_init();
    curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
    curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt( $chOne, CURLOPT_POST, 1);
    curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage);
    $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
    curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
    curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec( $chOne );

    //Result error
    if(curl_error($chOne))
    {
        echo 'error:' . curl_error($chOne);
    }
    else {
        $result_ = json_decode($result, true);
        echo "status : ".$result_['status']; echo "message : ". $result_['message'];
    }
    curl_close( $chOne );




    return redirect(RouteServiceProvider::WELCOME);
    }


    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact )
    {


        if($contact->status == 'notview'){
            DB::update('update contacts set  status = ? where id = ?', ["View" , $contact->id]);
        }

        return view('contact.show',compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('contact.edit',compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'detail' => 'required',
        ]);

        $contact->update($request->all());

        return redirect()->route('contact.index')
                        ->with('success','contact updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contact.index')
                        ->with('success','Product deleted successfully');
    }
}
