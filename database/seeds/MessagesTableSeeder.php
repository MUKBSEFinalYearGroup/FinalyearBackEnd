<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Message;
use App\ChatGroup;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $message_array = ["Mi sha😂😂😂tolinze aqiiiqahhh😂😂","Ate tufunyewo ebigwa bitalaze😄😄😄","Let's first make it halal💍🙏",
            "Oli wakavuuyo nkumanyi","@256703722071 budget ojilabye","Cong's  my Burikimu omu. Bwati","yes tell her teri kwekwasa.",
            "Thanks hun🙏🏼","Ali mukwebuzabuza","Congrats  Jazira","May God protect you","Kasita mi am around gwe bela eyooo😂😂😂😂",
            "Mi sha ondibuubi wabula nga sirabyeeko ntula...nina 5k zange wano...","Olinga admin ggwe kka shamim mubonna 600 abali wanno olabyeemu nze..",
            "😳😳😳 nyabo this is not a birthday party 🍆🥒🥝","Rolex festival 😂😂😂😂ur blocked linda nsabe obwa admin",
            "Nyabo this function is a must attend","Congs my jazira","Manager tropical bank tukulamusizza kko nnyabo ente jetukuwadde",
            "😄😄😄 leave my namesake alone","Gwe tukuwadde gwakwanirizza bagenyi nezza security bandizijeeko","Bba shamim twesonde e box yya mazzi",
            "Anti manager is part of us +256 773 509243: Am happy for you my love : Thanks my love : Thanks my Binti : My  😘 +256 776 661163: <Media omitted> : Good morning family"
        ];

        for($i=1; $i < count($message_array); $i++){ 
            Message::create([
                'message'        => $message_array[$i],
                'senders_id'     => $i,
                'recievers_id'   => $i+1,
                'group_id'       => 2,
                'status'         => 'not read',
                'category_id'    => 1,
            ]);
        }
    }
}
