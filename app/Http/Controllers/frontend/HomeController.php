<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $categories;
    public function __construct()
    {
        $this->categories = \App\Models\Category::all();
    }

    public function meja1($no_meja)
    {
        $tables = \App\Models\Table::groupBy('no_meja')
            ->orderBy('id', 'DESC')
            ->where('no_meja', $no_meja)
            ->first();
        $detailTables = \App\Models\Table::orderBy('id', 'DESC')
            ->where('no_meja', $no_meja)
            ->get();
        $categories   = $this->categories;
        $foods        = \App\Models\Food::orderBy('id', 'DESC')
            ->paginate(10);
        return view('frontend.order.meja1', compact('foods', 'categories', 'tables', 'detailTables'));
    }

    public function meja2($no_meja)
    {
        $tables = \App\Models\Table::groupBy('no_meja')
            ->orderBy('id', 'DESC')
            ->where('no_meja', $no_meja)
            ->first();
        $detailTables = \App\Models\Table::orderBy('id', 'DESC')
            ->where('no_meja', $no_meja)
            ->get();
        $categories   = $this->categories;
        $foods        = \App\Models\Food::orderBy('id', 'DESC')
            ->paginate(10);
        return view('frontend.order.meja2', compact('foods', 'categories', 'tables', 'detailTables'));
    }

    public function foodsByCategory($slug)
    {
        $foodsByCategory    = \App\Models\Category::where('slug', $slug)
            ->first();
        $id                 = $foodsByCategory->id;
        $categories         = $this->categories;
        $name               = $foodsByCategory->name;

        $foods              = \App\Models\Food::orderBy('id', 'DESC')
            ->where('category_id', $id)
            ->paginate(10);
        return view('frontend.foodsByCategory', compact('foods', 'categories', 'name'));
    }

    public function orderan_member()
    {
        $orders = \App\Models\Order::orderBy('id', 'DESC')
            ->get();
        return view('frontend.orderan', compact('orders'));
    }
}
