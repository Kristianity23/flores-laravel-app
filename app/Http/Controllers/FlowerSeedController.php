<?php

namespace App\Http\Controllers;

use App\Models\FlowerSeed;
use Illuminate\Http\Request;

class FlowerSeedController extends Controller
{
    public function index(Request $request){
        $search = $request->query('search');
        
        if ($search) {
            $flowers = FlowerSeed::where('seed_name', 'LIKE', "%{$search}%")
                                 ->orWhere('category', 'LIKE', "%{$search}%")
                                 ->paginate(5)
                                 ->appends($request->query());
        } else {
            $flowers = FlowerSeed::paginate(5);
        }
        
        return view('flowers.index', compact('flowers', 'search'));
    }

    public function create(){
        return view('flowers.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'seed_name' => 'required|string|max:100',
            'category' => 'required|string|max:50',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|numeric|min:0',
            'germination_time' => 'required|string|max:50',
            'bloom_time' => 'required|string|max:50',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'nullable|string|max:500',
            'color' => 'required|string|max:50',
            'height' => 'required|string|max:50',
            'status' => 'required|in:Available,Unavailable'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('flowers', 'public');
            $validated['image'] = $imagePath;
        }

        FlowerSeed::create($validated);

        return redirect('/flowers')->with('success', 'Flower seed added successfully');
    }

    public function show(FlowerSeed $flower){
        return view('flowers.show', compact('flower'));
    }

    public function edit(FlowerSeed $flower){
        return view('flowers.edit', compact('flower'));
    }

    public function update(Request $request, FlowerSeed $flower){
        $validated = $request->validate([
            'seed_name' => 'required|string|max:100',
            'category' => 'required|string|max:50',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|numeric|min:0',
            'germination_time' => 'required|string|max:50',
            'bloom_time' => 'required|string|max:50',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'nullable|string|max:500',
            'color' => 'required|string|max:50',
            'height' => 'required|string|max:50',
            'status' => 'required|in:Available,Unavailable'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('flowers', 'public');
            $validated['image'] = $imagePath;
        }

        $flower->update($validated);

        return redirect('/flowers')->with('success', 'Flower seed updated successfully');
    }

    public function delete(FlowerSeed $flower){
        return view('flowers.delete', compact('flower'));
    }

    public function destroy(FlowerSeed $flower){
        $flower->delete();
        return redirect('/flowers')->with('success', 'Flower seed deleted successfully');
    }
}
