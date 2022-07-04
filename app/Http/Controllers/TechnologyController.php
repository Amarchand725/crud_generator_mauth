<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Technology;
use DB;
use Session;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = Technology::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where("name", "like", "%". $request["search"] ."%");$query->orWhere("description", "like", "%". $request["search"] ."%");$query->orWhere("price", "like", "%". $request["search"] ."%");
            }
            $models = $query->paginate(10);
            return (string) view('technologies._search', compact('models'));
        }

        $page_title = Menu::where('menu', 'technology')->first()->label;
        $models = Technology::orderby('id', 'desc')->paginate(10);
        return view('technologies.index', compact('models', 'page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $view_all_title = Menu::where('menu', 'technology')->first()->label;
        return view('technologies.create', compact('view_all_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Technology::getValidationRules());

        $input = $request->all();

        DB::beginTransaction();

        try{
	        Technology::create($input);

            DB::commit();
            return redirect()->route('technology.index')->with('message', 'Technology Added Successfully !');
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
        $view_all_title = Menu::where('menu', 'technology')->first()->label;
        $model = Technology::findOrFail($id);
      	return view('technologies.show', compact('view_all_title', 'model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $view_all_title = Menu::where('menu', 'technology')->first()->label;
        $model = Technology::findOrFail($id);
        return view('technologies.edit', compact('view_all_title', 'model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $model = Technology::findOrFail($id);

	    $this->validate($request, Technology::getValidationRules());

        try{
	        $model->fill( $request->all() )->save();
            return redirect()->route('technology.index')->with('message', 'Technology update Successfully !');
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
        $model = Technology::findOrFail($id);
	    $model->delete();

        if($model){
            return 1;
        }else{
            return 0;
        }
    }
}
