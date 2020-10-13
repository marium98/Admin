<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Option;
use DB;


class ExtraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $questions = Question::with(['questionOptions'])->get();
        $options = Option::all();
        return view('show',compact('questions', 'options'));
     
        //return view('show', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $question = Question::find($id);
        $options = Option::where('question_id' , $id)->get();
        return view('edit', compact('question', 'options'));
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

        $option_array = $request->options;
        foreach($option_array as $key =>$value)
        {
           DB::table('options')->where('id', $key)->update(['option_text' => $value]);
        } 
        $questions = Question::find($id);
        
        $questions->update($request->all());

        
        //print_r($request->option_text);exit; thora complex masla hy ye soch raha hun 
       /*   yaa ik soochy app bhe mei bhe sooch rhy hn :D ek tw ye way hy
       en sab kay samny ek button laga dy update ka har field ka jb update pay click hoga wo option update ho jayayga
       tu wo individual option k lye hoga na han ruko demo dikhata like thos hn but yeh shyd krna nhi hy
       sir was saying about rawquery k wo lga k hardcode krdo ok dekhta
       
       */
       
       
       
       
       
       
       
       
       /*  $options = $request->option_text;
       foreach($options as $value)
        {
            $option = Option::where('question_id', $id)->first();
            $option->update('option_text', $value);
        }  */
        //solution dekhna paryga mein tw json say he karta
        //wahan pay option or uski id lay kay jao jahan edit wali fields
        // $options = DB::table('options')
        // ->where('question_id' , $id)
        // ->update(
        //    $request->only([ 'option_text' ]));
//dd($request->all());
       return redirect('show')->with('status','Question has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}