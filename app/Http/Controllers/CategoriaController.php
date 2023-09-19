<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CategoriaFormRequest;
use Illuminate\Support\Facades\DB; // Asegúrate de importar Illuminate\Support\Facades\DB;



class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        if ($request) {
            $query = trim($request->get('searchText'));
            $categorias = DB::table('categoria')
                ->where('categoria', 'LIKE', '%' . $query . '%')
                ->where('estatus', '=', '1')
                ->orderBy('id_categoria', 'desc')
                ->paginate(7);
            return view("almacen.categoria.index", ["categorias" => $categorias, "searchText" => $query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("almacen/categoria/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriaFormRequest $request)
    {
        //
        $categoria = new Categoria;
        $categoria->categoria = $request->get('categoria');
        $categoria->descripcion = $request->get('descripcion');
        $categoria->status = '1';
        $categoria->save();
        return redirect('almacen/categoria');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return view("almacen.categoria.show", ["categoria" => Categoria::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return  view("almacen.categoria.edit", ["categoria" => Categoria::findOrFail($id)]);
    }
}

/**
 * Update the specified resource in storage.
 */
function update(CategoriaFormRequest $request, $id)
{
    $categoria = Categoria::findOrFail($id);
    $categoria->categoria = $request->get('categoria');
    $categoria->descripcion = $request->get('descripcion');
    $categoria->save(); // Utiliza save() en lugar de update()
    return Redirect::to('almacen/categoria'); // Cambia Redirect::to() a redirect()
}

/**
 * Remove the specified resource from storage.
 */
function destroy(string $id)
{
    $categoria = Categoria::findOrFail($id);
    $categoria->status = '0';
    $categoria->save(); // Utiliza delete() para eliminar el registro
    return Redirect::to('almacen/categoria');
}
