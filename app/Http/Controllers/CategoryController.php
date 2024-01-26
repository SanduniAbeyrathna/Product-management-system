<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Category::select('*'))
            ->addColumn('action', 'employee-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('pages.category.index');
    }

    // public function data()
    // {
    //     $kategori = Category::orderBy('id', 'desc')->get();

    //     return datatables()
    //         ->of($kategori)
    //         ->addIndexColumn()
    //         ->addColumn('aksi', function ($kategori) {
    //             return '
    //             <div class="btn-group">
    //                 <button onclick="editForm(`'. route('category.update', $kategori->id) .'`)" class="btn btn-xs btn-primary btn-flat"><i class="fa fa-pencil"></i></button>
    //                 <button onclick="deleteData(`'. route('category.destroy', $kategori->id) .'`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
    //             </div>
    //             ';
    //         })
    //         ->rawColumns(['aksi'])
    //         ->make(true);
    //     }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $employeeId = $request->id;

        $employee   =   Category::updateOrCreate(
                    [
                     'id' => $employeeId
                    ],
                    [
                    'name' => $request->name,
                    ]);

        return Response()->json($employee);
    }


    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
        // $kategori = Category::find($id);

        // return response()->json($kategori);
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $employee = Category::where($where)->first();

        return Response()->json($employee);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $employee = Category::findOrFail($id);

    $employee->update([
        'name' => $request->name,
    ]);

    return Response()->json($employee);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $employee = Category::where('id',$request->id)->delete();

        return Response()->json($employee);
    }
}
