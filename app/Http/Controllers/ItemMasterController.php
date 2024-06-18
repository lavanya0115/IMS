<?php

namespace App\Http\Controllers;

use App\Models\ItemMaster;
use Illuminate\Http\Request;

class ItemMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = ItemMaster::all();
        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        $item = ItemMaster::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);

        if ($item) {
            session()->flash('success', 'Item Created Successfully');
            return redirect()->route('items.index')
                ->with('success', 'Item created successfully.');
        } else {
            session()->flash('error', 'Cannot Create The Item');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ItemMaster $item)
    {
        return view('items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ItemMaster $item)
    {
        return view('items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ItemMaster $item)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        $item->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);
        $is_updated = $item->wasChanged('name', 'description', 'price', 'quantity');
        if ($is_updated) {
            return redirect()->route('items.index')
                ->with('success', 'Item updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ItemMaster $item)
    {
        if (!empty($item->id)) {
            $is_deleted = $item->delete();
            if ($is_deleted) {
                return redirect()->route('items.index')
                    ->with('success', 'Item deleted successfully.');
            }
        }
    }
}
