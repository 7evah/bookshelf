<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            $books = Book::all();
            return view('books.index', compact('books'));
        } elseif (Auth::user()->hasRole('user')) {
            return view('userdashboard');
        } else {
            return redirect('/');
        }
    }
}
