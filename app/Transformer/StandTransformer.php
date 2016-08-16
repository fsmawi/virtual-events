<?php
namespace App\Transformer;

use App\Stand;
use League\Fractal\TransformerAbstract;

class StandTransformer extends TransformerAbstract
{
    /**
     * Transform the data.
     *
     * @param \App\Stand $stand
     *
     * @return array
     */
    public function transform(Stand $stand)
    {
        $trans = new CompanyTransformer();

        return [
            'stand_id' => $stand->id,
            'event_id' => $stand->event_id,
            'price'    => (Double) $stand->price,
            'image'    => $stand->image_url,
            'free'     => $stand->isFree(),
            'company'  => $stand->company ? $trans->transform($stand->company) : null
        ];
    }
}