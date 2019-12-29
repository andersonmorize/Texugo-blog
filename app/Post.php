<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model
{
    use HasSlug;

    //Nome da tabela
    protected $table = 'posts';

    //Primary Key da Tabela
    protected $primaryKey = 'id';

    // Item em um Array que são utilizados para preenchimento da informação
    protected $fillable = [
        'id', 'title', 'slug', 'body'
    ];

    // Deseja trabalhar ou não com campos created_at e updated_at do tipo timestamp nessa tabela.
    public  $timestamps = true;

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    // Relacionamentos
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'posts_tags', 'post_id', 'tag_id');
    }

    public function photos()
    {
        return $this->hasMany(PostPhoto::class);
    }

}
