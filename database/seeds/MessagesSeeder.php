<?php

use Illuminate\Database\Seeder;
use App\Models\Message;

class MessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->delete();
        Message::create([
            'message' => 'Привет. Как дела?',
            'user_id' => '1',
            'friend_id' => '2'
        ]);
        Message::create([
            'message' => 'Норм. Поехали в центр',
            'user_id' => '2',
            'friend_id' => '1'
        ]);
        Message::create([
            'message' => 'Привет. Как дела?',
            'user_id' => '1',
            'friend_id' => '3'
        ]);
        Message::create([
            'message' => 'Завтра едем?',
            'user_id' => '3',
            'friend_id' => '1'
        ]);
        Message::create([
            'message' => 'Привет. Как дела?',
            'user_id' => '2',
            'friend_id' => '4'
        ]);
        Message::create([
            'message' => 'Привет',
            'user_id' => '3',
            'friend_id' => '4'
        ]);
        Message::create([
            'message' => 'эгегей',
            'user_id' => '4',
            'friend_id' => '3'
        ]);
        Message::create([
            'message' => 'Купи хлеба домой',
            'user_id' => '3',
            'friend_id' => '4'
        ]);
        Message::create([
            'message' => 'Привет. Как дела?',
            'user_id' => '4',
            'friend_id' => '8'
        ]);
        Message::create([
            'message' => 'и тебе не хворать',
            'user_id' => '8',
            'friend_id' => '4'
        ]);
        Message::create([
            'message' => 'Привет. Как дела?',
            'user_id' => '4',
            'friend_id' => '10'
        ]);
        Message::create([
            'message' => 'бедааа, скучно',
            'user_id' => '10',
            'friend_id' => '4'
        ]);
        Message::create([
            'message' => 'Скоро зайду - будет весело',
            'user_id' => '4',
            'friend_id' => '10'
        ]);
        Message::create([
            'message' => 'Привет. Как дела?',
            'user_id' => '5',
            'friend_id' => '9'
        ]);
        Message::create([
            'message' => 'Привет. Как дела?',
            'user_id' => '5',
            'friend_id' => '6'
        ]);
        Message::create([
            'message' => 'оригинальное начало беседы',
            'user_id' => '6',
            'friend_id' => '5'
        ]);
        Message::create([
            'message' => 'ну а что мне ещё спрашивать то?',
            'user_id' => '5',
            'friend_id' => '6'
        ]);
        Message::create([
            'message' => 'Привет. Как дела?',
            'user_id' => '6',
            'friend_id' => '8'
        ]);
        Message::create([
            'message' => 'кууу',
            'user_id' => '8',
            'friend_id' => '6'
        ]);
        Message::create([
            'message' => 'Привет. Как дела?',
            'user_id' => '6',
            'friend_id' => '10'
        ]);
        Message::create([
            'message' => 'Я не дома. позже созвонимся',
            'user_id' => '10',
            'friend_id' => '6'
        ]);
        Message::create([
            'message' => 'Привет. Как дела?',
            'user_id' => '7',
            'friend_id' => '1'
        ]);
        Message::create([
            'message' => 'как кирпичом по голове :/',
            'user_id' => '1',
            'friend_id' => '7'
        ]);
        Message::create([
            'message' => 'Что случилось?',
            'user_id' => '7',
            'friend_id' => '1'
        ]);
        Message::create([
            'message' => 'Привет. Как дела?',
            'user_id' => '8',
            'friend_id' => '2'
        ]);
        Message::create([
            'message' => 'у меня наушники сломались',
            'user_id' => '2',
            'friend_id' => '8'
        ]);
        Message::create([
            'message' => 'так неси, отремонтирую',
            'user_id' => '8',
            'friend_id' => '2'
        ]);
        Message::create([
            'message' => 'Привет. Как дела?',
            'user_id' => '9',
            'friend_id' => '2'
        ]);
        Message::create([
            'message' => 'отлично',
            'user_id' => '2',
            'friend_id' => '9'
        ]);
        Message::create([
            'message' => 'Привет. Как дела?',
            'user_id' => '10',
            'friend_id' => '5'
        ]);
    }
}
