<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBooks = Book::count();
        $totalCategories = Category::count();
        $totalStock = Book::sum('stock');

        $latestBooks = Book::with('category')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalBooks',
            'totalCategories',
            'totalStock',
            'latestBooks'
        ));
    }
}