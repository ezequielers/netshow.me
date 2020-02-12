<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRoomRequest;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Contact;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendContactMail;

class ContactsController extends Controller
{
    public function index()
    {
        # Permissionamento de acesso 
        # abort_unless(\Gate::allows('contact_access'), 403);

        $contacts = Contacts::all();

        return view('admin.contacts.index', compact('contacts'));
    }

    public function create()
    {
        # Permissionamento de acesso 
        # abort_unless(\Gate::allows('contact_create'), 403);

        return view('admin.contacts.create');
    }

    public function store(StoreContactRequest $request)
    {
        # Permissionamento de acesso 
        # abort_unless(\Gate::allows('contact_create'), 403);

        $data = $request->all();

        # Move arquivo para storage local
        $path = $request->file('file')->store('files');

        # Armazena o caminho do arquivo para salvar no DB.
        $data['file'] = $path;
        
        $contact = Contact::create($data);

        # Envia e-mail com cópia dos dados de formulário
        Mail::to($request->email)->send(new SendContactMail($data));

        return redirect()->back()->with('success', trans('global.contact_save_success'))->with('info', 'Enviamos um e-mail com cópia dos dados.');
    }

    public function edit(Contacts $contact)
    {
        abort_unless(\Gate::allows('contact_edit'), 403);

        return view('admin.contacts.edit', compact('contact'));
    }

    public function update(UpdateContactsRequest $request, Contacts $contact)
    {
        abort_unless(\Gate::allows('contact_edit'), 403);

        $contact->update($request->all());

        return redirect()->route('admin.contacts.index')->with('success', trans('global.save_success'));
    }

    public function show(Contacts $contact)
    {
        abort_unless(\Gate::allows('contact_show'), 403);

        return view('admin.contacts.show', compact('contact'));
    }

    public function destroy(Contacts $contact)
    {
        abort_unless(\Gate::allows('contact_delete'), 403);

        $contact->delete();

        return back();
    }

    public function massDestroy(MassDestroyContactsRequest $request)
    {
        Contacts::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
