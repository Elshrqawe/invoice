<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;
use Illuminate\Support\Facades\Notification;
use App\sections;
use App\User;
use App\invoices_details;
use App\invoice_attachments;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Notifications\AddInvoice;
use App\Exports\InvoicesExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Events\MyEventClass;

class invoices extends Model
{
    //use HasTranslations;
    //public $translatable = ['name'];
    use SoftDeletes;
    protected $guarded = [];
    protected $dates = ['deleted_at'];


    public function sections()
    {
        return $this->belongsTo('\App\Models\sections', 'section_id','id');   //العلاقه مبين موديل -> sections
    }
}

