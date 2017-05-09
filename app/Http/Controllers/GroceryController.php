<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grocery;

class GroceryController extends Controller
{
    public function showGroceries() {
        $groceries = Grocery::orderBy('needed_at', 'desc')->get();

        foreach ($groceries as $key => $grocery) {
            $groceries[$key]->items = json_decode($grocery->items);
        }
        return view('admin.groceries.showGroceries', compact('groceries'));
    }

    public function newGrocery() {
        return view('admin.groceries.addGrocery');
    }

    public function addGrocery(Request $request) {
        $grocery = new Grocery();

        // $items = array_filter($request->items);
        $itemsWithQuantity = [];

        $items = $request->items;
        $quantity = $request->quantity;

        for ($i=0; $i < count($items); $i++) { 
            $itemsWithQuantity[] = ["item" => $items[$i], "quantity" => $quantity[$i]];
        }

        // var_dump($itemsWithQuantity);

        $grocery->name = $request->name;
        $grocery->items = json_encode($itemsWithQuantity);
        $grocery->needed_at = $request->needed_at;
        if ($grocery->save()) {
            return redirect('/admin/boodschappen')->with('message', ['success', 'Boodschappenlijst succesvol aangemaakt.']);
        }
        return redirect('/admin/boodschappen')->with('message', ['error', 'Er liep iets fout bij het aanmaken van de boodschappenlijst.']);
    }

    public function toggleGrocery(Grocery $grocery) {
        $grocery->done = !$grocery->done;
        if ($grocery->save()) {
            return back()->with('message', ['success', 'Boodschappenlijst succesvol aangepast.']);
        }
        return back()->with('message', ['error', 'Er liep iets fout bij het aanpassen van de boodschappenlijst.']);
    }

    public function deleteGrocery(Grocery $grocery) {
        if ($grocery->delete()) {
            return back()->with('message', ['success', 'Boodschappenlijst succesvol verwijderd.']);
        }
        return back()->with('message', ['error', 'Er liep iets fout bij het verwijderen van de boodschappenlijst.']);
    }

    public function editGrocery(Grocery $grocery) {
        $grocery->items = json_decode($grocery->items);
        return view('admin.groceries.editGrocery', compact('grocery'));
    }

    public function updateGrocery(Grocery $grocery, Request $request) {

        $items = $request->items;
        $quantity = $request->quantity;

        for ($i=0; $i < count($items); $i++) { 
            $itemsWithQuantity[] = ["item" => $items[$i], "quantity" => $quantity[$i]];
        }

        $grocery->name = $request->name;
        $grocery->needed_at = $request->needed_at;
        $grocery->items = json_encode($itemsWithQuantity);

        if ($grocery->save()) {
            return redirect('/admin/boodschappen')->with('message', ['success', 'Boodschappenlijst succesvol aangepast.']);
        }
        return redirect('/admin/boodschappen')->with('message', ['error', 'Er liep iets fout bij het aanpassen van de boodschappenlijst.']);
    }
}