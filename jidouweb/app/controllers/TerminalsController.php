<?php

class TerminalsController extends BaseController {

	/**
	 * Terminal Repository
	 *
	 * @var Terminal
	 */
	protected $terminal;

	public function __construct(Terminal $terminal)
	{
		$this->terminal = $terminal;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$terminals = $this->terminal->all();

		return View::make('terminals.index', compact('terminals'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('terminals.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Terminal::$rules);

		if ($validation->passes())
		{
			$this->terminal->create($input);

			return Redirect::route('terminals.index');
		}

		return Redirect::route('terminals.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$terminal = $this->terminal->findOrFail($id);

		return View::make('terminals.show', compact('terminal'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$terminal = $this->terminal->find($id);

		if (is_null($terminal))
		{
			return Redirect::route('terminals.index');
		}

		return View::make('terminals.edit', compact('terminal'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Terminal::$rules);

		if ($validation->passes())
		{
			$terminal = $this->terminal->find($id);
			$terminal->update($input);

			return Redirect::route('terminals.show', $id);
		}

		return Redirect::route('terminals.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->terminal->find($id)->delete();

		return Redirect::route('terminals.index');
	}

}
