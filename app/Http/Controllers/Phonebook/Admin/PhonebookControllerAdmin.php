<?php

namespace App\Http\Controllers\Phonebook\Admin;

use App\Http\Requests\PhonebookUpdate;
use App\Http\Requests\PhonebookCreate;
use App\Models\Phonebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhonebookControllerAdmin extends BaseController
{

    public function __construct(){
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd(1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhonebookCreate $request)
    {
        $data = $request->input();
        $result = new Phonebook($data);
        $result->save();

        if ($result) return redirect()->route('phonebook.create')->with(['success' => 'Сохранено']);
        else return back()->withErrors(['msg' => 'Ошибка сохранения']);
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
        $clientInfo = DB::table('phonebooks')->where('id','=',$id)->first();
        if (!empty($clientInfo)) return view('admins.edit', compact('clientInfo'));
        else return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PhonebookUpdate $request, $id)
    {
        $clientInfo = Phonebook::query()->find($id);
        $data = $request->all();

        $result = $clientInfo->fill($data)->save();

        if ($result) return redirect()->route('phonebook.edit', $clientInfo->id)->with(['success' => 'Сохранено']);
        else return back()->withErrors(['msg' => 'Ошибка сохранения']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Phonebook::query()->findOrFail($id);

        if ($result){
            $result->delete($result->id);
            return redirect()->route('home')->with(['success' => 'Deleted']);
        }
        else return back()->withErrors(['msg' => 'Error delete']);
    }
}
