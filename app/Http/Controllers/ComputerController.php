<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Computer;
use DB;
use Str;

class ComputerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = Computer::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where("image", "like", "%". $request["search"] ."%");$query->orWhere("name", "like", "%". $request["search"] ."%");$query->orWhere("description", "like", "%". $request["search"] ."%");
            }
            $models = $query->paginate(10);
            return (string) view('computers._search', compact('models'));
        }

        $page_title = Menu::where('menu', 'computer')->first()->label;
        $models = Computer::orderby('id', 'desc')->paginate(10);
        return view('computers.index', compact('models', 'page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $view_all_title = Menu::where('menu', 'computer')->first()->label;
        return view('computers.create', compact('view_all_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Computer::getValidationRules());
        $input = $request->all();
        DB::beginTransaction();

        try{
            if (isset($request->image)) {$image = date("d-m-Y-His").".".$request->file("image")->getClientOriginalExtension();$request->image->move(public_path("/admin/images/computers"), $image);$input["image"] = $image;}
	        Computer::create($input);

            DB::commit();
            return redirect()->route('computer.index')->with('message', 'Computer Added Successfully !');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error. '.$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $view_all_title = Menu::where('menu', 'computer')->first()->label;
        $model = Computer::findOrFail($id);
      	return view('computers.show', compact('view_all_title', 'model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $view_all_title = Menu::where('menu', 'computer')->first()->label;
        $model = Computer::findOrFail($id);
        return view('computers.edit', compact('view_all_title', 'model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $model = Computer::findOrFail($id);

	    $this->validate($request, Computer::getValidationRules());

        try{
            $input = [];
            foreach($request->toArray() as $key=>$req){
                if(gettype($req)=='object'){
                    if (isset($key)) {
                        $folder_name = Str::plural(str_replace(' ', '_', strtolower(Computer)));
                        $image = date('d-m-Y-His').'.'.$request->file($key)->getClientOriginalExtension();
                        $request->$key->move(public_path('/admin/assets/'.$folder_name), $image);
                        $input[$key] = $image;
                    }
                }else{
                    $input[$key] = $req;
                }
            }
	        $model->fill($input)->save();
            return redirect()->route('computer.index')->with('message', 'Computer update Successfully !');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error. '.$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $model = Computer::findOrFail($id);
	    $model->delete();

        if($model){
            return 1;
        }else{
            return 0;
        }
    }
}
