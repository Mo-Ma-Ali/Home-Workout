<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WeightLossSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[['name'=>'SIDE HOP','description'=>'stand on the floor,put your hands in front of you and hop from side to side','date'=>30,'video'=>'https://youtu.be/nYmUEJIBj3c?si=xYEuqpD5_Ws8HVlx'],
            ['name'=>'TRUNK ROTATION','description'=>'stand with your feet shoulder width apart and your Kness slightly bent.Lift your arms in front of you with your elbows bent','date'=>30,'video'=>'https://youtu.be/BfACG9NsL0E?si=BY1lAvVyDmzUvBXP'],
            ['name'=>'BUTT KICKS','description'=>'stand up on the floor then run in place while kicking your heel up to touch your butt with each step','date'=>30,'video'=>'https://youtu.be/vXVPvY1UbJI?si=n_yuamniwIAs3gqx'],
            ['name'=>'JUMPING JACKS','description'=>'start with your feet together and your arms by your side then
jump up  with your feet apart and your hands overhead.
return to the start position then do the  next rep ','date'=>30,'video'=>'https://youtu.be/2W4ZNSwoW_4?si=iDbk_WKsvcBpJTyr'],
            ['name'=>'STANDING BICYCLE CRUNCHES','description'=>'stand with your feet shoulder width apart Bring your Knee to your apposite elbow','date'=>30,'video'=>'https://youtu.be/8lsAXzvVHrc?si=9kdAyTtbSURJCUDm'],
            ['name'=>'SUPERMAN','description'=>'Lie on your stomach with your arms extended straight overhead ,then raise both your arms and legs up off the floor','date'=>30,'video'=>'https://youtu.be/pGeaBXLwDtw?si=FMOeiR8p2RZUDiYZ'],
            ['name'=>'RUSSIAN TWIST','description'=>'
    sit on the floor with your knees bent,feet lifted a little bit and back tilted backwards.
    ','date'=>20,'video'=>'https://youtu.be/DJQGX2J4IVw?si=bC-MTP_tH4p-smOs'],
            ['name'=>'RUVERSE CRUNCHES','description'=>'lie on your back with your Knees up at a 90  degree angle and your hands behind your Head ','date'=>30,'video'=>'https://youtu.be/UwRfRN5fYRg?si=FU21sVZ9YxDESwOn'],
            ['name'=>'KIPPING WITHOUT ROPE','description'=>'place your arms sides and pretend to hold a skipping rope handle in each hand jump and alternatly land on the balls of your feet','date'=>30,'video'=>'https://youtu.be/CYGeazlNbU4?si=8uBP8zIwG7QUgfbr'],
            ['name'=>'SQUATS','description'=>'stand with your feet shoulder width apart and your arms stretched farward,then lower your body unti your thighs are parallel with the floor','date'=>12,'video'=>'https://youtu.be/42bFodPahBU?si=zxVCFhcJd2ClxDNy'],
            ['name'=>'KNEE PUSH-UPS','description'=>'start in the regular push-up position,then let your knees touch the floor and raise your feet up off the floor','date'=>14,'video'=>'https://youtu.be/jWxvty2KROs?si=BgvHLMIPFteFANC6'],
            ['name'=>'ALTERNATING HOOKS','description'=>'stand with your feet shoulder width apart and place your dominant foot slightly bend your knees clench your fists and bend your elbows at 90 degrees','date'=>30,'video'=>'https://youtu.be/wiyvVpEKOsc?si=fRBw6ZRI_367fsyu'],
            ['name'=>'COBRA STRETCH','description'=>'Lie down on your stomach and bend your elbows with your hands beneath your shoulder,','date'=>30,'video'=>'https://youtu.be/z21McHHOpAg?si=wO2q3qfaKf57laPf'],
            ['name'=>'LEFT QUAD STRETCH WITH WALL','description'=>'stand with your your right hand on the wall bend your left leg and grasp your ankle or toes to bring your left calf close to your left thigh','date'=>20,'video'=>'https://youtu.be/1qlN5EXFUNo?si=AXZYOCBMK-xTo_LU'],
            ['name'=>' RIGHT QUAD STRETCH WITH WALL','description'=>'stand with your left hand on the wall bend your right leg and grasp your ankle or toes to bring your right calf close to your right thigh','date'=>20,'video'=>'https://youtu.be/_gzG_0kwIWM?si=hLhKwoLt_i_oaoX5'],
            ['name'=>'TRICEPS STRETCH LEFT ','description'=>'put your left hand on your back use the right hand to grab your left elbow and gently pull it','date'=>20,'video'=>'https://youtu.be/L9IGOcrdcFk?si=ApDmkj0eSskEOm-1'],
            ['name'=>'TRICEPS STRETCH RIGHT','description'=>'Put your right hand on your back,use your left hand to grab your right elbow and gently pull it','date'=>20,'video'=>'https://youtu.be/L9IGOcrdcFk?si=YNyQvTS20-eikSpv'],
            ['name'=>'SQUAT REACH UPS','description'=>'stand with your feet a little wider than shoulder width apart elbows bent ,palms facing each other and fingers pointed toward the ceiling return to the start posistion and repeat with the other side','date'=>30,'video'=>'https://youtu.be/73Cb-y57UWg?si=u5wxtPBJNTLgW6VO'],
            ['name'=>'SKATER JUMP','description'=>'stand on the floor bend your legs slightly and lean your upper body forward then jump to the right as you jump bring your left foot behind you and your left arm in front of you','date'=>30,'video'=>'https://youtu.be/5gtLC5BgN7Q?si=t76td31jS96Qusfd'],
            ['name'=>'SIDE HOP','description'=>'stand on the floor put your hands in front of you and hop from side to side','date'=>30,'video'=>'https://youtu.be/nYmUEJIBj3c?si=2vjSPeUgZ9CgLNsp'],
        ];
        DB::table('losses')->insert($data);
    }
}
