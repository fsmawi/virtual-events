<?php
namespace App\Transformer;

use App\Event;
use League\Fractal\TransformerAbstract;


class EventBasicTransformer extends TransformerAbstract
{
	public function transform(Event $event)
	{

	    return [
	        'event_id'    => $event->id,
	        'name'        => $event->name,
	        'description' => $event->description,
	        'address'     => $event->address,
	        'date_begin'  => $event->date_begin->toDateString(),
	        'date_end'    => $event->date_end->toDateString(),
	        'lat'         => $event->lat,
	        'long'        => $event->long
	    ];
	}
}