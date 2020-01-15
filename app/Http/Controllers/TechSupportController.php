<?php

namespace App\Http\Controllers;

use Huddle\Zendesk\Services\ZendeskService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TechSupportController extends Controller
{
    public function __construct(ZendeskService $zendesk_service)
    {
        $this->zendesk_service = $zendesk_service;
    }

    public function submitTicket($country, Request $request)
    {
        $data = $request->all();
        // Log::info(print_r($data, true));
        $this->zendesk_service->tickets()->create([
            'subject' => 'Tech support request submitted from ricoma.com',
            'comment' => [
                'body' => 
                    "Subject: " . $data['subject'] . "\n" .
                    "Machine: " . $data['product_assistance_type'] . "\n" .
                    "Phone: " . $data['phone'] . "\n" . 
                    "Description: " . $data['vd_requests'] 
            ],
            'requester' => array(
                'name' => $data['firstname'] . " " . $data['lastname'],
                'email' => $data['email'],
            ),
            'group_id' => '360001868274',
            "custom_fields" => [
                [
                    'id' => '360024072053', // Machine Model
                    'value' => $data['product_assistance_type']
                ],
                [
                    'id' => '360023023034', // Customer Name
                    'value' => $data['firstname'] . " " . $data['lastname']
                ],
                [
                    'id' => '360023054833', // Customer Phone
                    'value' => $data['phone']
                ],
            ]
        ]);

        return response()->json([
            'status'=> 200, 
            'message' => 'success']);
        // return redirect(getRoute('thank-you-page'));
    }
}
