<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Validator;
use DataTables;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $datas = Category::where("pid"  , 0)->orWhere('pid' , null)->get();
        if($request->ajax()){
            return Datatables::of($datas)
            ->addColumn('action', function (Category $data) {
               $out = '<i class="btn btn-primary fa fa-pencil edit" data-header="'.$data->name.'" data-href="'.route('admin.category.edit' , $data->id).'"></i>
               <i class="btn btn-danger fa fa-trash delete" data-header="'.$data->name.'" data-href="'.route('admin.category.destroy' , $data->id).'"></i>';
               return $out;
            })
            ->rawColumns(['action'])
            ->toJson(); //--- Returning Json Data To Client Side
        }
        return view("admin.category.index");
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $validated = $request->validate(
            [
                'name' => 'required|string|unique:categories',
            ],
            [
                'name.unique' => "This category has already been taken",
            ]
    );
        $category = new Category();
        $input = $request->all();
        $category->fill($input);
        $category->save();
        return redirect(route('admin.category.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view("admin.category.edit")->with("item" , $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $rules = [
            'name' => 'required|string|unique:categories,name,'.$category->id,
        ];
        $messages = [
            'name.unique' => "This category has already been taken",
        ];

        $validator = Validator::make($request->all(), $rules , $messages);
 
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }
        $input = $request->all();
        $category->fill($input);
        $category->update();
        $msg = 'Updated Successfully.';
        return response()->json($msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        
        $msg = 'Deleted Successfully.';
        return response()->json($msg);
    }
}
