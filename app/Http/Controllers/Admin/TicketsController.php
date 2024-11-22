<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TicketRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Operator;
class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Recupera i filtri dalla richiesta
        $categoryFilter = $request->input('category');
        $statusFilter = $request->input('status');

        // Costruisci la query
        $ticketsQuery = Ticket::orderBy('created_at', 'desc')->with('category');

        if ($categoryFilter) {
            $ticketsQuery->where('category_id', $categoryFilter);
        }

        if ($statusFilter) {
            $ticketsQuery->where('status', $statusFilter);
        }

        // Recupera i risultati della query
        $tickets = $ticketsQuery->get();

        // Recupera le categorie per il dropdown
        $categories = Category::all();

        return view('admin.tickets.index', compact('tickets', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        
        // Seleziona gli operatori che hanno almeno un ticket con stato 'closed'
        $operators = Operator::whereHas('tickets', function ($query) {
            $query->where('status', 'closed');
        })->get();

        return view('admin.tickets.create', compact('categories', 'operators'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TicketRequest $request)
    {
        $data = $request->all();

        $new_ticket = new Ticket();
        $new_ticket->title = $data['title'];
        $new_ticket->description = $data['description'];
        $new_ticket->operator_id = $data['operator'];
        $new_ticket->status = $data['status'];
        $new_ticket->category_id = $data['category'];
        $new_ticket->save();
        $new_ticket->load('category');

        return redirect()->route('admin.tickets.index', $new_ticket)->with('success', 'New ticket created succesfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        return view('admin.tickets.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        $data = $request->all();
        $ticket->update($data);

        return redirect()->route('admin.tickets.index')->with('success', 'Ticket status edited succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
