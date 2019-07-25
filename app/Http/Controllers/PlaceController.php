<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Place;
use App\User;
use App\Comment;
use App\Table;
use App\Menu;
use App\Dish;
use Session;
use App\Cart;

class PlaceController extends Controller
{
    public function index()
    {
        $places = Place::all();
        return $places;
    }
    public function store(Request $request)
    {
        $possible_user = User::find($request->get('user_id'));
        if ($possible_user != null)
        {
            $place = new Place([
                'user_id' => $request->get('user_id'),
                'city_id' => $request->get('city_id'),
                'name' => $request->get('name'),
                'address' => $request->get('address'),
                'opening_time' => $request->get('opening_time'),
                'closing_time' => $request->get('closing_time'),
                'average_value' => $request->get('average_value'),
                'avatar' => $request->get('avatar')
            ]);
            $place->save();
            return "Created successfully!";
        }
        else
        {
            return "Could not create new restaurant.";
        }
    }
    public function show($id)
    {
        $place = Place::find($id);
        $comments = Comment::where('place_id', $id)->get();
        $users = User::all();
        $tables = Table::where('place_id', $id)->get();
        $menus = Menu::where('place_id', $id)->get();
        $dishes = Dish::all();
        return view('place', compact('comments', 'place', 'users', 'tables', 'menus', 'dishes'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $place = Place::find($id);
        $place->update($data);
        return "Updated successfully!";
    }

    public function menuAddToCart(Request $request, $id){
        $menu = Menu::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($menu, $menu->id);

        $request->session()->put('cart', $cart);
        return back();
    }

    public function getCart() {
        if(!Session::has('cart')){
            return view('shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $products = $cart->items;
        $totalPrice = $cart->totalPrice;
        return view('shoppingCart', compact('products', 'totalPrice'));
    } 

}
