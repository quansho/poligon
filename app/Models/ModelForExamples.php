<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ModelForExamples extends Model
{

//    === Toches === //
    /**
     * All of the relationships to be touched.
     *
     * @var array
     */
    protected $touches = ['post'];

    /**
     * Get the post that the comment belongs to.
     */
    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    //    === End of Toches === //


    /**  *избежать ошибок в отношениях, используя withDefault()  */
    public function user()
    {
        return $this->belongsTo('App\User')->withDefault();
//        AND
//        return $this->belongsTo(User::class)
//            ->withDefault(['name' => 'Anonymous']);
    }

    //Используйте hasMany для saveMany && hasMany
    public function useHasManyForSaveMany()
    {
        $post = Post::find(1);
        $post->comments()->saveMany([
            new Comment(['message' => 'First comment']),
            new Comment(['message' => 'Second comment']),
        ]);


//        hasMany с особыми проверками
        // Author -> hasMany(Book::class)
        $authors = Author::has('books', '>', 5)->get();


//        Миграционные столбцы с часовыми поясами
//        Schema::create('employees', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('name');
//            $table->string('email');
//            $table->timestampsTz();
//        });


//        Вы можете склонировать модель, используя replicate().
//        $user = App\User::find(1);
//        $newUser = $user->replicate();
//        $newUser->save();


//         Проверьте модели на идентичность

//        $user = App\User::find(1);
//        $sameUser = App\User::find(1);
//        $diffUser = App\User::find(2);
//        $user->is($sameUser); // true
//        $user->is($diffUser); // false


//        Сохранение модели с отношениями
//        class User extends Model
//        {
//            public function phone()
//            {
//                return $this->hasOne('App\Phone');
//            }
//        }
//        $user = User::first();
//        $user->name = "Peter";
//        $user->phone->number = '1234567890';
//        $user->push(); // Это обновит и пользователя и телефон в базе данных


//        WhereX
//        Есть элегантный способ превратить это:
//        $users = User::whereApproved(1)->get();


//        А теперь, в нашем контроллере, мы займемся магией:
//        $users = Topic::with('latestPost')->get()->sortByDesc('latestPost.created_at');


//        AND OR
//        $q->where(function ($query) {
//            $query->where('gender', 'Male')
//                ->where('age', '>=', 18);
//        })->orWhere(function($query) {
//            $query->where('gender', 'Female')
//                ->where('age', '>=', 65);
//        })


//        OR Where multiple params
//        $q->where('a', 1);
//        $q->orWhere(['b' => 2, 'c' => 3]);

    }


//    Scopes
    public function scopePopular($query)
    {
        return $query->where('votes', '>', 100);
    }
//    $users = App\User::popular()->active()->orderBy('created_at')->get();

}
