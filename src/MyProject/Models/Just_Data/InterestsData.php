<?php

namespace MyProject\Models\Just_Data;

use MyProject\Models\Interests\Interests;

class InterestsData
{

    public $interests = [];

    public function __construct()
    {
//       выключал
        $this->interests[] = new Interests('Ходить', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi atque 
        itaque ducimus animi iure quae dolorum impedit vitae alias! Dolorum amet ullam suscipit 
        modi voluptatem quia aliquid dolorem laudantium unde! Lorem ipsum dolor sit amet consectetur 
        adipisicing elit. Saepe dolorem provident, ipsa, earum soluta quis autem nobis fugit at animi, 
        sed vero magni. Est illum et delectus libero. Nemo, praesentium! Lorem ipsum dolor sit amet 
        consectetur adipisicing elit. Ullam non eaque accusantium tenetur. Nesciunt sequi necessitatibus 
        illum! Ad provident, repellat, ut soluta facere quod labore veniam nam molestiae doloremque accusantium. 
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit ad commodi, illo voluptatem eveniet qui, 
        ipsum animi a dolores autem earum molestias aspernatur nobis omnis reprehenderit tempora officiis quia! Obcaecati?');
        $this->interests[] = new Interests('Бегать', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi atque 
        itaque ducimus animi iure quae dolorum impedit vitae alias! Dolorum amet ullam suscipit 
        modi voluptatem quia aliquid dolorem laudantium unde! Lorem ipsum dolor sit amet consectetur 
        adipisicing elit. Saepe dolorem provident, ipsa, earum soluta quis autem nobis fugit at animi, 
        sed vero magni. Est illum et delectus libero. Nemo, praesentium! Lorem ipsum dolor sit amet 
        consectetur adipisicing elit. Ullam non eaque accusantium tenetur. Nesciunt sequi necessitatibus 
        illum! Ad provident, repellat, ut soluta facere quod labore veniam nam molestiae doloremque accusantium. 
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit ad commodi, illo voluptatem eveniet qui, 
        ipsum animi a dolores autem earum molestias aspernatur nobis omnis reprehenderit tempora officiis quia! Obcaecati?');
        $this->interests[] = new Interests('Анжумання', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi atque 
        itaque ducimus animi iure quae dolorum impedit vitae alias! Dolorum amet ullam suscipit 
        modi voluptatem quia aliquid dolorem laudantium unde! Lorem ipsum dolor sit amet consectetur 
        adipisicing elit. Saepe dolorem provident, ipsa, earum soluta quis autem nobis fugit at animi, 
        sed vero magni. Est illum et delectus libero. Nemo, praesentium! Lorem ipsum dolor sit amet 
        consectetur adipisicing elit. Ullam non eaque accusantium tenetur. Nesciunt sequi necessitatibus 
        illum! Ad provident, repellat, ut soluta facere quod labore veniam nam molestiae doloremque accusantium. 
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit ad commodi, illo voluptatem eveniet qui, 
        ipsum animi a dolores autem earum molestias aspernatur nobis omnis reprehenderit tempora officiis quia! Obcaecati?');
        $this->interests[] = new Interests('Спать', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi atque 
        itaque ducimus animi iure quae dolorum impedit vitae alias! Dolorum amet ullam suscipit 
        modi voluptatem quia aliquid dolorem laudantium unde! Lorem ipsum dolor sit amet consectetur 
        adipisicing elit. Saepe dolorem provident, ipsa, earum soluta quis autem nobis fugit at animi, 
        sed vero magni. Est illum et delectus libero. Nemo, praesentium! Lorem ipsum dolor sit amet 
        consectetur adipisicing elit. Ullam non eaque accusantium tenetur. Nesciunt sequi necessitatibus 
        illum! Ad provident, repellat, ut soluta facere quod labore veniam nam molestiae doloremque accusantium. 
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit ad commodi, illo voluptatem eveniet qui, 
        ipsum animi a dolores autem earum molestias aspernatur nobis omnis reprehenderit tempora officiis quia! Obcaecati?');
    }

    /**
     * @return array
     */
    public function getInterests(): array
    {
        return $this->interests;
    }


}