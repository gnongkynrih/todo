<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class AllRoomImagesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'room_id' => $this->room_id,
            'image' =>  url(Storage::url('images/'  . $this->image)),
            'alt_text' => $this->alt_text,
            'title' => $this->title,
            'room' => $this->room->name,
            'show_in_bookroom' => $this->show_in_bookroom,
        ];
    }
}
