<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use App\Models\Ticket;
use Illuminate\Support\Facades\DB;
use App\TicketStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            $tickets = Ticket::with('user')->paginate(10);
        } else {
            $tickets = Ticket::with('user')->where('user_id', Auth::id())->paginate(10);
        }
        return view('tickets.index', ['tickets' => $tickets]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $request['user_type'] = $user->hasRole('admin') ? 'admin' : ($user->hasRole('business') ? 'business' : 'user');
        $request['user_id'] = Auth::id();
        
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:500',
            'delivery_method' => 'required',
            'user_id' => 'required',
            'user_type' => 'required',
        ]);

        Ticket::create($validatedData);
        session()->flash('success', "Created Successfully");
        return redirect()->route('tickets.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        return view('tickets.show', ['ticket' => $ticket]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        $employees = Employees::select(DB::raw("CONCAT(first_name, ' ', last_name) AS full_name"))->pluck('full_name');
        $status = array_column(TicketStatus::cases(), 'value');
        return view('tickets.edit', compact('employees', 'status', 'ticket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        $data = $request->validate(
            [
                'price' => 'numeric',
                'employee' => 'required',
                'status' => 'required'
            ]
        );
        $ticket->update($data);
        session()->flash('success', "Updated Successfully");
        return redirect()->route('tickets.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        session()->flash('success', 'Deleted Successfully');
        return redirect()->route('tickets.index');
    }
    public function pay($id)
    {
        $ticket = Ticket::find($id);
        return view('payment', compact('ticket'));
    }
    public function payprocess($id)
    {
        $ticket = Ticket::findOrFail($id);
        $this->destroy($ticket);
        session()->flash('success', 'Payed Successfully');
        return redirect()->route('tickets.index');
    }
}
