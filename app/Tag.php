<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // Nome da tabela
    protected $table = 'tags';

    // Primary Key da Tabela
    protected $primaryKey = 'id';

    // Item em um Array que são utilizados para preenchimento da informação
    protected $fillable = [
        'name'
    ];

    // Deseja trabalhar ou não com campos created_at e updated_at do tipo timestamp nessa tabela.
    public  $timestamps   = true;

    // Relacionamento
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'posts_tags', 'tag_id', 'post_id');
    }
}
