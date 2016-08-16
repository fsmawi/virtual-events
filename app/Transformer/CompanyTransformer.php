<?php
namespace App\Transformer;

use App\Company;
use League\Fractal\TransformerAbstract;

class CompanyTransformer extends TransformerAbstract
{
    /**
     * Transform the data.
     *
     * @param \App\Company $company
     *
     * @return array
     */
    public function transform(Company $company)
    {
        return [
            'company_id'  => $company->id,
            'name'        => $company->name,
            'phone'       => $company->phone,
            'address'     => $company->address,
            'description' => $company->description,
            'logo'        => $company->logo_url,
            'document'    => $company->marketing_document
        ];
    }
}