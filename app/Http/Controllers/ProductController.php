<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductController extends Controller
{
    //


    function addProduct(Request $req)
    {

        $product = new Producto;
        $product->name = $req->input('name');
        $product->description = $req->input('description');
        $product->price = number_format($req->input('price'), 2);
        $product->priceShip = number_format($req->input('priceShip'), 2);
        $product->file_path = $req->file('file')->store('products');
        $product->id_productor = $req->input('id_productor');
        $product->save();

        return $product;
    }

    function list()
    {
        return Producto::all();
    }

    function listJustProductor($id)
    {
        $result = Producto::where('id_productor', $id)->get();

        return $result;
    }

    function delete($id)
    {
        $result = Producto::where('id', $id)->delete();
        if ($result) {
            return ["result" => "Producto eliminado"];
        } else {
            return ["result" => "eliminacion fallida"];
        }
    }

    function getProduct($id)
    {
        return Producto::find($id);
    }

    function upDateProducto($id, Request $req)
    {

        $product = Producto::find($id);

        if (!is_null($req->input('name')) and !($req->input('name') == "undefined")) {
            $product->name = $req->input('name');
        }
        if (!is_null($req->input('description')) and !($req->input('description') == "undefined")) {
            $product->description = $req->input('description');
        }
        if (!is_null($req->input('price')) and !($req->input('price') == "undefined")) {
            $product->price = number_format($req->input('price'), 2);
        }
        if (!is_null($req->input('priceShip')) and !($req->input('priceShip') == "undefined")) {
            $product->priceShip = number_format($req->input('priceShip'), 2);
        }
        if ($req->file('file') and !($req->input('file') == "undefined")) {
            $product->file_path = $req->file('file')->store('products');
        }
        $product->save();
        return $product;
    }


    function search($key){
        return Producto::where('name','Like',"%$key%")->get();
    }

}
