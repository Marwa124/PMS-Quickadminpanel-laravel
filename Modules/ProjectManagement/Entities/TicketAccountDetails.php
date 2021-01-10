<?php

namespace Modules\ProjectManagement\Entities;

use Illuminate\Database\Eloquent\Model;

class TicketAccountDetails extends Model
{
    protected $table    = "ticket_account_details";
    protected $fillable = ['ticket_id','account_details_id'];

}
