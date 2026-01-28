<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'isbn' => $this->isbn,
            'title' => $this->title,
            'description' => $this->description,
            'language' => $this->language,
            'pages' => $this->pages,

            'publisher' => $this->publisher
                ? new PublisherResource($this->publisher)
                : null,

            'authors' => AuthorResource::collection($this->authors),
            'categories' => CategoryResource::collection($this->categories),

            // IMPORTANT: copies & reviews are allowed ONLY here
            'copies' => BookCopyResource::collection($this->copies),
            'reviews' => ReviewResource::collection($this->reviews),
        ];
    }
}
