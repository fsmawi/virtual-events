<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests;
use App\Http\Requests\CompanyFormRequest;
use App\Repositories\Stands\Contract;
use Carbon\Carbon;
use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class CompanyController extends ApiGuardController
{
    public function store(Contract $standRepository, CompanyFormRequest $request, $stand_id)
    {

    	try {

            $stand = $standRepository->getById($stand_id);

            if($stand->event->date_begin < Carbon::now()) {
	        	return ['status' => 'KO', 'message' => 'stand can\'t be booked'];	
            }

            if(!$stand->isFree()) {
	        	return ['status' => 'KO', 'message' => 'stand already booked'];	
            }

            //create new company
	    	$company = new Company;

	        $company->name = $request->input('name');
	        $company->phone = $request->input('phone');
	        $company->address = $request->input('address');
	        $company->description = $request->input('description');
	        $company->admin_full_name = $request->input('admin_full_name');
	        $company->admin_email = $request->input('admin_email');
	        $company->save();
	        
	        if(is_null($request->file('logo_url')))
	        {
	        	return ['status' => 'KO', 'message' => 'Logo is required'];	
            }
	        
	        //handle logo upload
	        $logo_extension = $request->file('logo_url')->getClientOriginalExtension();
	        if(!in_array($logo_extension, ['jpg', 'png', 'gif']))
	        {
	        	return ['status' => 'KO', 'message' => 'Format du Logo is not supported'];	
            }
			$logoName = 'logo_'.$company->id . '.' . $logo_extension;

		    $request->file('logo_url')->move(
		        base_path() . '/public/files/imgs/', $logoName
		    );
	        $company->logo_url = URL::to('/').'/files/imgs/'.$logoName;

	        if(is_null($request->file('marketing_document')))
	        {
	        	return ['status' => 'KO', 'message' => 'Document Marketing is required'];	
            }
	        
	        //handle document_marketing upload
	        $document_extension = $request->file('marketing_document')->getClientOriginalExtension();
	        if(!in_array($document_extension, ['doc', 'docx', 'pdf', 'txt']))
	        {
	        	return ['status' => 'KO', 'message' => 'Format du Document is not supported'];	
            }
	        $docName = 'company_'.$company->id . '.' . $document_extension;

		    $request->file('marketing_document')->move(
		        base_path() . '/public/files/documents/', $docName
		    );
	        $company->marketing_document = URL::to('/').'/files/documents/'.$docName;

	        $company->save();

	        // $stand->company_id = $company->id;
	        $stand->company()->associate($company);
	        $stand->save();

	        return ['status' => 'OK', 'message' => 'stand booked successfully from company : '.$company->id];


        } catch (ModelNotFoundException $e) {

            return $this->response->errorNotFound();

        }

	    	
    }
}
