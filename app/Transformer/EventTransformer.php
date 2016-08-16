<?php
namespace App\Transformer;

use App\Event;
use League\Fractal\TransformerAbstract;

class EventTransformer extends TransformerAbstract
{
    /**
     * Transform the date.
     *
     * @param \App\Event $event
     *
     * @return array
     */
    public function transform(Event $event)
    {
        $trans = new StandTransformer();

        return [
            'event_id'    => $event->id,
            'name'        => $event->name,
            'description' => $event->description,
            'address'     => $event->address,
            'date_begin'  => $event->date_begin->toDateString(),
            'date_end'    => $event->date_end->toDateString(),
            'lat'         => $event->lat,
            'long'        => $event->long,
            'stands'      => $event->stands->transform(
                function ($i) use ($trans) {
                    return $trans->transform($i);
                }
            )
        ];
    }
}