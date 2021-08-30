<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use DataTables;
use Illuminate\Http\Request;
use Validator;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $datas = Product::get();
        if ($request->ajax()) {
            return Datatables::of($datas)
            ->addColumn('action', function (Product $data) {
                $out = '<i class="btn btn-primary fa fa-pencil edit" data-header="'.$data->name.'" data-href="'.route('admin.product.edit', $data->id).'"></i>
               <i class="btn btn-danger fa fa-trash delete" data-header="'.$data->name.'" data-href="'.route('admin.product.destroy', $data->id).'"></i>';

                return $out;
            })
            ->rawColumns(['action'])
            ->toJson(); //--- Returning Json Data To Client Side
        }

        return view('admin.product.index');
    }

    public function getChild($id)
    {
        $datas = Category::where('pid', $id)->get();

        return $datas;
    }

    public function create()
    {
        $categories = Category::where('pid', 0)->orWhere('pid', null)->get();

        return view('admin.product.create')->with('categories', $categories);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required|string|unique:categories',
            ],
            [
                'name.unique' => 'This product has already been taken',
            ]
    );
        $product = new Product();
        $input = $request->all();
        $product->fill($input);
        $product->save();

        return redirect(route('admin.product.index'));
    }

    public function show(Product $product)
    {
    }

    public function edit(Product $product)
    {
        return view('admin.product.edit')->with('item', $product);
    }

    public function update(Request $request, Product $product)
    {
        $rules = [
            'name' => 'required|string|unique:categories,name,'.$product->id,
        ];
        $messages = [
            'name.unique' => 'This product has already been taken',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }
        $input = $request->all();
        $product->fill($input);
        $product->update();
        $msg = 'Updated Successfully.';

        return response()->json($msg);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        $msg = 'Deleted Successfully.';

        return response()->json($msg);
    }
}
