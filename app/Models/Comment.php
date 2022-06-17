<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
	use HasFactory, HasUuid;

	protected $attributes = [
		'created_by_id' => null,
		'updated_by_id' => null,
		'deleted_by_id' => null,
		'created_at' => null,
		'updated_at' => null,
		'deleted_at' => null,
		'meme_id' => null,
		'comment_id' => null,
		'content' => null,
	];

	protected $casts = [
		'created_at' => 'datetime',
		'updated_at' => 'datetime',
		'deleted_at' => 'datetime',
	];

	//relations
	public function createdBy(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
		return $this->belongsTo(User::class, 'created_by_id');
	}

	public function updatedBy(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
		return $this->belongsTo(User::class, 'updated_by_id');
	}

	public function deletedBy(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
		return $this->belongsTo(User::class, 'deleted_by_id');
	}

	public function meme(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
		return $this->belongsTo(Meme::class, 'meme_id');
	}

	public function comment(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
		return $this->belongsTo(Comment::class, 'comment_id');
	}

	//overrides
	public function toArray(): array {
		$array = parent::toArray();
		$array['created_by'] = $this->createdBy->toArray();
		$array['updated_by'] = $this->updatedBy->toArray();
		$array['deleted_by'] = $this->deletedBy->toArray();
		$array['meme'] = $this->meme->toArray();
		$array['comment'] = $this->comment->toArray();
		return $array;
	}
}
