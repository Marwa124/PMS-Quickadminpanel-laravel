<?php

namespace Modules\ProjectManagement\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use \DateTimeInterface;

class TaskUploadedFile extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    protected $appends = [
        'files',
    ];

    public $table = 'task_uploaded_files';

    const IS_IMAGE_RADIO = [
        '1' => 'Image',
        '0' => 'File',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'uploaded_path',
        'file_name',
        'is_image',
        'image_width',
        'image_height',
        'task_attachment_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getFilesAttribute()
    {
        return $this->getMedia('files')->last();
    }

    public function task_attachment()
    {
        return $this->belongsTo(TaskAttachment::class, 'task_attachment_id');
    }
}
