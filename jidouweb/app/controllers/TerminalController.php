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
        'value',
        'ts')
      //->where('terminal_id', '=', $id)
      //->where('ts', '>', 'FROM_UNIXTIME('.$ts.')')->get();
      ->where('ts', '>', '\''. date('Y-m-d H:i:s', $ts) . '\'')->get();
    var_dump(date('Y-m-d H:i:s', $ts));
    $arrResult = array();
    $arrResult['now'] = time();
    $arrResult['param'] = $ts;
    $arrResult['messages'] = array();
    foreach($messages as $message) {
      $message->ts = strtotime($message->ts);
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
