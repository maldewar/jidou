<?php

class StocksController extends BaseController {

	/**
	 * Stock Repository
	 *
	 * @var Stock
	 */
	protected $stock;

	public function __construct(Stock $stock)
	{
		$this->stock = $stock;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$stocks = $this->stock->all();

		return View::make('stocks.index', compact('stocks'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('stocks.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Stock::$rules);

		if ($validation->passes())
		{
			$this->stock->create($input);

			return Redirect::route('stocks.index');
		}

		return Redirect::route('stocks.create')
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
		$stock = $this->stock->findOrFail($id);

		return View::make('stocks.show', compact('stock'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$stock = $this->stock->find($id);

		if (is_null($stock))
		{
			return Redirect::route('stocks.index');
		}

		return View::make('stocks.edit', compact('stock'));
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
		$validation = Validator::make($input, Stock::$rules);

		if ($validation->passes())
		{
			$stock = $this->stock->find($id);
			$stock->update($input);

			return Redirect::route('stocks.show', $id);
		}

		return Redirect::route('stocks.edit', $id)
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
		$this->stock->find($id)->delete();

		return Redirect::route('stocks.index');
	}

}
