<?php
 
namespace App\Mail;
 
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
 
class ReservationNotifier extends Mailable
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
        return $this->view('reservationMade')->from('zomato.six.six.six@gmail.com')->with(['name' => $request->name, 'address' => $request->address, 'place_name' => $request->get('place_name'), 'table_code' => $request->get('table_code'), 'date' => $request->get('date'), 'time' => $request->get('time')]);
        //here is your blade view name
    }
}