<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (!isset($request->category)) {
            if (session()->has('selected_category') && session('selected_category') != 0) {
                $products = Product::where('category_id', session('selected_category'))->get();
            } else {
                session(['selected_category' => 0]);
                $products = Product::get();
            }
        } else {
            if (isset($request->category) && $request->category == 0 || !isset($request->category)) {
                session(['selected_category' => 0]);
                $products = Product::get();
            } else {
                session(['selected_category' => $request->category]);
                $products = Product::where('category_id', $request->category)->get();
            }
        }



       $categories = Category::get();
       $selected_category = session('selected_category');
       return view('product.index' ,[
        'products'=> $products,
        'categories' => $categories,
        'selected_category' => $selected_category
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('product.create', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request = $request->all();

        try {
            $product = Product::create($request);
        } catch (\Throwable $th) {
            return redirect()->route('produtos.index')->with('error', 'N??o foi poss??vel cadastrar o produto, verifique se j?? n??o existe um produto com os dados informados');
        }

         return redirect()->route('produtos.index')->with('success', 'Produto Cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::get();
        return view('product.edit', [
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
       try {
        $product->update($request->all());
       } catch (\Throwable $th) {
        return redirect()->route('produtos.index')->with('danger', 'N??o foi poss??vel atualizar o produto, verifique se j?? n??o existe um produto com os dados informados');
       }
        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $product = Product::destroy($id);
        } catch (\Throwable $th) {
            return redirect()->route('produtos.index')->with('error', 'N??o foi poss??vel deletar o produto, verifique se o mesmo n??o est?? sendo utilizado');
        }
        return redirect()->route('produtos.index')->with('success', 'Produto deletado com sucesso');
    }
}
