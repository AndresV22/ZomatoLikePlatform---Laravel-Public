<?php
 
namespace App\Mail;
 
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
 
class OrderNotifier extends Mailable
{
    use Queueable, SerializesModels;
 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
 
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        return $this->view('orderMade')->from('zomato.six.six.six@gmail.com')->with(['name' => $request->name, 'address' => $request->address, 'place_name' => $request->place_name, 'amount' => $request->amount, 'date' => $request->date, 'detail' => $request->detail]);
        //here is your blade view name
    }
}