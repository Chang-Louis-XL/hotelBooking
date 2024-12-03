<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('rooms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|string|max:255',
            'price_with_breakfast' => 'required|integer',
            'price_without_breakfast' => 'required|integer',
            'original_price_with_breakfast' => 'required|integer',
            'original_price_without_breakfast' => 'required|integer',
        ]);

        Room::create([
            'name' => $request->name,
            'image' => $request->image,
            'price_with_breakfast' => $request->price_with_breakfast,
            'price_without_breakfast' => $request->price_without_breakfast,
            'original_price_with_breakfast' => $request->original_price_with_breakfast,
            'original_price_without_breakfast' => $request->original_price_without_breakfast,
        ]);

        return redirect('rooms.index')->with('success', '房間新增成功');
    }

    public function show($id)
    {
        $room = Room::findOrFail($id);
        return view('rooms.show', compact('room'));
    }

    public function edit($id)
    {
        $room = Room::findOrFail($id);
        return view('rooms.edit', compact('room'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|string|max:255',
            'price_with_breakfast' => 'required|integer',
            'price_without_breakfast' => 'required|integer',
            'original_price_with_breakfast' => 'required|integer',
            'original_price_without_breakfast' => 'required|integer',
        ]);

        $room = Room::findOrFail($id);
        $room->update([
            'name' => $request->name,
            'image' => $request->image,
            'price_with_breakfast' => $request->price_with_breakfast,
            'price_without_breakfast' => $request->price_without_breakfast,
            'original_price_with_breakfast' => $request->original_price_with_breakfast,
            'original_price_without_breakfast' => $request->original_price_without_breakfast,
        ]);

        return redirect('rooms.index')->with('success', '房間更新成功');
    }

    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();
        return redirect('rooms.index')->with('success', '房間刪除成功');
    }
}