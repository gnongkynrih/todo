<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if($this->profile)
            $url = 'https://booking.yalanahotel.com/public/storage/images/' . $this->profile;
        else

        return [
            'id' => $this->id,
            'profile' => $url,
            'name' => $this->name,
            'rating' => $this->rating,
            'review' => $this->review,
        ];
    }
}
