<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use DataTables;
use Illuminate\Http\Request;
use Validator;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $datas = Brand::get();
        if ($request->ajax()) {
            return Datatables::of($datas)
            ->addColumn('action', function (Brand $data) {
                $out = '<i class="btn btn-primary fa fa-pencil edit" data-header="'.$data->name.'" data-href="'.route('admin.brand.edit', $data->id).'"></i>
               <i class="btn btn-danger fa fa-trash delete" data-header="'.$data->name.'" data-href="'.route('admin.brand.destroy', $data->id).'"></i>';

                return $out;
            })
            ->rawColumns(['action'])
            ->toJson(); //--- Returning Json Data To Client Side
        }

        return view('admin.brand.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required|string|unique:categories',
            ],
            [
                'name.unique' => 'This brand has already been taken',
            ]
    );
        $brand = new Brand();
        $input = $request->all();
        $brand->fill($input);
        $brand->save();

        return redirect(route('admin.brand.index'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit')->with('item', $brand);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $rules = [
            'name' => 'required|string|unique:categories,name,'.$brand->id,
        ];
        $messages = [
            'name.unique' => 'This brand has already been taken',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }
        $input = $request->all();
        $brand->fill($input);
        $brand->update();
        $msg = 'Updated Successfully.';

        return response()->json($msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        $msg = 'Deleted Successfully.';

        return response()->json($msg);
    }
}
