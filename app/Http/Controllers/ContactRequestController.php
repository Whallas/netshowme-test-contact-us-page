<?php

namespace App\Http\Controllers;

use App\Actions\CreateContactRequestAction;
use App\DataTransferObjects\ContactRequestData;
use App\Http\Requests\ContactRequestFormRequest;

class ContactRequestController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.contact_us');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ContactRequestFormRequest  $request
     * @param  CreateContactRequestAction  $action
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequestFormRequest $request, CreateContactRequestAction $action)
    {
        $action->execute(
            new ContactRequestData(
                ...$request->validated(),
                ...['sender_ip' => $request->ip()],
            )
        );

        return redirect()->route('contact_us.index')
            ->with([
                'success' => __('app.actions.create_contact_request.success'),
            ]);
    }
}
