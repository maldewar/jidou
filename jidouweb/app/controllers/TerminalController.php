<?php

class TerminalController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
  {
    $terminal = Terminal::find($id);
    $terminal_config = array();
    $terminal_config['urls'] = array();
    $terminal_config['urls']['dispense'] = Config::get('jidou.hw_dispense_url');
    $terminal['config'] = $terminal_config;
    $terminal['stock'] = Stock::getStock($id);
    $terminal['timestamp'] = time();
    $max = DB::table('terminal_events')
                     ->select(DB::raw('max(id) as max'))
                     ->where('terminal_id', '=', $id)
                     ->get();
    $max = intval($max[0]->max);
    $terminal['max'] = $max;
    if (isset($_GET['_callback'])) {
      return Response::json($terminal)->setCallback($_GET['_callback']);
    } else {
      return Response::json($terminal);
    }
  }

  public function messages($id, $ts)
  {
    $messages = DB::table('terminal_events')
      ->select('terminal_id',
        'event',
        'value')
      ->where('terminal_id', '=', $id)
      ->where('id', '>', $ts)->get();
    $arrResult = array();
    $arrResult['now'] = time();
    $max = DB::table('terminal_events')
                     ->select(DB::raw('max(id) as max'))
                     ->where('terminal_id', '=', $id)
                     ->get();
    $max = intval($max[0]->max);
    $arrResult['param'] = $ts;
    $arrResult['messages'] = array();
    $arrResult['max'] = $max;
    foreach($messages as $message) {
      $arrResult['messages'][] = $message;
    }

    if (isset($_GET['_callback'])) {
      return Response::json($arrResult)->setCallback($_GET['_callback']);
    } else {
      return Response::json($arrResult);
    }
  }


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
