<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class RequestApprovedNotifier extends Mailable
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
        return $this->view('placeRequestAccepted')->from('zomato.six.six.six@gmail.com')->with(['name' => $request->name, 'address' => $request->address, 'place_name' => $request->get('place_name'), 'place_address' => $request->get('place_address')]);
    }
}
