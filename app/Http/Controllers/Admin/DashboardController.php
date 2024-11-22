<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Category;
use App\Models\Operator;

class DashboardController extends Controller
{
    public function index(){
        $allTicketsCount = Ticket::count();
        $assignedTickets = Ticket::where('status', 'assigned')->count();
        $inProgressTickets = Ticket::where('status', 'in progress')->count();
        $closedTickets = Ticket::where('status', 'closed')->count();

        $categories = Category::with('tickets')->get();

        $operators = Operator::with('tickets')->get();

        // Prepara un array per i conteggi
        $operatorTicketCounts = [];

        foreach ($operators as $operator) {
            $operatorTicketCounts[$operator->id] = [
                'assigned' => Ticket::where('operator_id', $operator->id)->where('status', 'assigned')->count(),
                'inProgress' => Ticket::where('operator_id', $operator->id)->where('status', 'in progress')->count(),
                'closed' => Ticket::where('operator_id', $operator->id)->where('status', 'closed')->count(),
            ];
        }

        return view('admin.index', compact('allTicketsCount', 'assignedTickets', 'inProgressTickets', 'closedTickets', 'categories', 'operators', 'operatorTicketCounts'));
    }
}
