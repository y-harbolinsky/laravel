<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Test2Controller extends Controller
{

	public function index(){
		echo 'index';
	}
	public function create(){
		echo 'create';
	}
	public function store(Request $request){
		echo 'store';
	}
	public function show($id){
		$users = [
			0 => [
				'name' => 'UserName 1',
				'lastName' => 'LastUserName 1',
				'location' => 'UserLocation 1',
			],
			1 => [
				'name' => 'UserName 2',
				'lastName' => 'LastUserName 2',
				'location' => 'UserLocation 2',
			],
			2 => [
				'name' => 'UserName 3',
				'lastName' => 'LastUserName 3',
				'location' => 'UserLocation 3',
			],
		];

		return view('test', compact('users'));
	}
	public function edit($id){
		echo 'edit';
	}
	public function update(Request $request, $id){
		echo 'update';
	}
	public function destroy($id){
		echo 'destroy';
	}

}
