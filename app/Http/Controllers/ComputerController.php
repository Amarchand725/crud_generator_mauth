<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;
use DB;
use Session;

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
                $query->where("name", "like", "%". $request["search"] ."%");$query->orWhere("description", "like", "%". $request["search"] ."%");
            }
            $models = $query->paginate(10);
            return (string) view('computers._search', compact('models'));
        }
        $page_title = 'All Computers';
        $models = Computer::orderby('id', 'desc')->where('status', 1)->paginate(10);
        return view('computers.index', compact('models', 'page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('computers.create');
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

        $model = Computer::findOrFail($id);

      	return view('computers.show', array('model' => $model));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $model = Computer::findOrFail($id);
        return view('computers.edit')->withModel($model);
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
	        $model->fill( $request->all() )->save();
            return redirect()->route('Computer.index')->with('message', 'Computer Added Successfully !');
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
