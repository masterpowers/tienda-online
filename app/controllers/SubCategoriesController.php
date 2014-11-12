<?php

class SubCategoriesController extends \BaseController {

	/**
	 * Display a listing of subcategories
	 *
	 * @return Response
	 */
	public function index()
	{
		$subcategories = Subcategory::all();

		return View::make('subcategories.index', compact('subcategories'));
	}

	/**
	 * Show the form for creating a new subcategory
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('subcategories.create');
	}

	/**
	 * Store a newly created subcategory in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Subcategory::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Subcategory::create($data);

		return Redirect::route('subcategories.index');
	}

	/**
	 * Display the specified subcategory.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$subcategory = Subcategory::findOrFail($id);

		return View::make('subcategories.show', compact('subcategory'));
	}

	/**
	 * Show the form for editing the specified subcategory.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$subcategory = Subcategory::find($id);

		return View::make('subcategories.edit', compact('subcategory'));
	}

	/**
	 * Update the specified subcategory in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$subcategory = Subcategory::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Subcategory::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$subcategory->update($data);

		return Redirect::route('subcategories.index');
	}

	/**
	 * Remove the specified subcategory from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Subcategory::destroy($id);

		return Redirect::route('subcategories.index');
	}

}
