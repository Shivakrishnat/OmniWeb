<?php namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Log;
use App\Fileentry;
use Request;
use Flash;
use Session;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class OmniController extends Controller {


	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function campaigns()
	{
		//Not required any more 
		//$entries = Fileentry::all();

		return view('omniWeb.campaigns'); //, compact('entries'));
	}

	public function add() {

		//add the logic to check for duplicates & errors

		$file = Request::file('filefield');
		$filename=$file->getFilename();
		// Log info not required anymore
		//Log::info($filename);
		//Log::info('Read filename.');
		$extension = $file->getClientOriginalExtension();
		//Copy file to local with a new name. Change later to the format required by Vinay
		Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));

		//Store data in DB
		$entry = new Fileentry();
		$entry->mime = $file->getClientMimeType();
		$entry->original_filename = $file->getClientOriginalName();
		$entry->filename = $file->getFilename().'.'.$extension;
		$entry->campaignname = Request::input('campaignName');
		$entry->campaign_start = Request::input('startDate');
		$entry->campaign_end = Request::input('endDate');
		$entry->save();

		//Final Message to display on screen
		Session::flash('message', 'Campaign  has been created'); 
		//Session::flash('error', 'Error in your input');

		return redirect('campaigns'); //->with('message', 'Your campaign has been created');
		
	}

	
	public function get($filename){
		//Get data from DB and the local filename
		$entry = Fileentry::where('filename', '=', $filename)->firstOrFail();
		$file = Storage::disk('local')->get($entry->filename);
 
		return (new Response($file, 200))
              ->header('Content-Type', $entry->mime);
	}

	public function getAll(){
		$entries = Fileentry::all();

		return view('omniWeb.getCampaigns', compact('entries'));
	}

	public function delete(){
		//Delete all the data. To change later to truncate
	  Fileentry::where('id', '>', 0)->delete();
	  return 'Cleaned Campaign Table..!! Lets start fresh';
	}
	
}
