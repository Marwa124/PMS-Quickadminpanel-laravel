<?php

namespace Modules\ProjectManagement\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class TicketReplay extends Model
{
    use SoftDeletes, HasMediaTrait;
    protected $table = "ticket_replays";
    protected $fillable = ['ticket_id','ticket_replay_id','body','replier_id','attachment', 'created_at','updated_at','deleted_at'];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class,'ticket_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'replier_id');
    }

    public function replay()
    {
        return $this->belongsTo(TicketReplay::class,'ticket_replay_id');
    }
}
