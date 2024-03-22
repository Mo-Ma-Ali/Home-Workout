<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
$data=[['Level_id'=>1,'category_id'=>2,'name'=>'JUMPING JACKS','description'=>'start with your feet together and your arms by your side then
jump up  with your feet apart and your hands overhead.
return to the start position then do the  next rep ','date'=>30,'video'=>'https://youtu.be/2W4ZNSwoW_4?si=iDbk_WKsvcBpJTyr'],

    ['Level_id'=>1,'category_id'=>2,'name'=>'INCLINE PUSH-UPS','description'=>'
    start in the regular push-up position but with your hands elevated on a chair or bench.
    then push your body up downs using your arm strength','date'=>6,'video'=>'https://youtu.be/3WUUeM07i_Q?si=LDT0wBakq-T3YIBc'],

    ['Level_id'=>1,'category_id'=>2,'name'=>'PUSH-UPS','description'=>'
    lay prone on the ground with arms supporting your body.
    keep your body straight while raising and lowering your body with your arms.
    ','date'=>4,'video'=>'https://youtu.be/R08gYyypGto?si=He0zFsixww1PSKXp'],

    ['Level_id'=>1,'category_id'=>2,'name'=>'WIDE ARM PUSH-UPS','description'=>'start in the regular push-up position but with your hands spread wider than your shoulders.then push your body up and down','date'=>4,'video'=>'https://youtu.be/pQUsUHvyoI0?si=02Oorb2oLp9Ed-k4'],
    ['Level_id'=>1,'category_id'=>2,'name'=>'TRICEPS DIPS','description'=>'
    for the start position, sit on the chair. then move your hip off the chair with your hands holding the edge
    of the chair
    ','date'=>6,'video'=>'https://youtu.be/JhX1nBnirNw?si=0j4zb1Dx_QmeXwRT'],

    ['Level_id'=>1,'category_id'=>2,'name'=>'JUMPING JACKS','description'=>'start with your feet together and your arms by your side then
jump up  with your feet apart and your hands overhead.
return to the start position then do the  next rep ','date'=>30,'video'=>'https://youtu.be/2W4ZNSwoW_4?si=iDbk_WKsvcBpJTyr'],
//
    ['Level_id'=>1,'category_id'=>1,'name'=>'ABDOMINAL CRUUNCHES','description'=>' lie on your back with your knees bent and your arms stretched forward.
    then lift your upper body off the floor. hold for a few seconds and slowly return
    ','date'=>16,'video'=>'https://youtu.be/RUNrHkbP4Pc?si=CrtkD4FY5ss-P6VN'],

    ['Level_id'=>1,'category_id'=>1,'name'=>'RUSSIAN TWIST','description'=>'
    sit on the floor with your knees bent,feet lifted a little bit and back tilted backwards.
    ','date'=>20,'video'=>'https://youtu.be/DJQGX2J4IVw?si=bC-MTP_tH4p-smOs'],
    ['Level_id'=>1,'category_id'=>1,'name'=>'MOUNTAIN CLIMBER','description'=>'
    start in the push-up position.Bend your right Knee towards your chest and keep your left leg straight, then
    quickly switch form one leg to the other
    ','date'=>16,'video'=>'https://youtu.be/YZstn7BkgvU?si=ylLsFg-X42DmBKid'],
    ['Level_id'=>1,'category_id'=>1,'name'=>'PLANK','description'=>'lie on the floor toes and forearms on the ground keep your body straight and hold this position as long as you can','date'=>20,'video'=>'https://youtu.be/Fcbw82ykBvY?si=mrPrHAzRSY5Bgfjx'],
    ['Level_id'=>1,'category_id'=>1,'name'=>'COBRA STRETCH','description'=>'Lie down on your stomach and bend your elbows with your hands beneath your shoulder,','date'=>30,'video'=>'https://youtu.be/z21McHHOpAg?si=wO2q3qfaKf57laPf'],

    ['Level_id'=>1,'category_id'=>3,'name'=>'HEEL TOUCH','description'=>'
    lie on the ground with your  legs bent and your arms by your sides
    ','date'=>20,'video'=>'https://youtu.be/9bR-elyolBQ?si=D0Hgx3zrkogSeIs_'],

    ['Level_id'=>1,'category_id'=>3,'name'=>'ARM RAISES','description'=>'stand on the floor with your arms extended straight forward at shoulder
    height
    ','date'=>30,'video'=>'https://youtu.be/Bqvmyni_sKQ?si=NobQnoKtNTu5zRQV'],
    ['Level_id'=>1,'category_id'=>3,'name'=>'SIDE ARM RAISE','description'=>'stand with your feet shoulder width
    apart. raise your arms to the sides at shoulder height then put them down.
    ','date'=>30,'video'=>'https://youtu.be/YslHgg2E-Ro?si=MvSf0ctp0DraXIHd'],
    ['Level_id'=>1,'category_id'=>3,'name'=>'TRICEPS DIPS','description'=>'for the start position sit on the chair then
    move your hip off the chair with your hands holding the edge of the chair
    ','date'=>10,'video'=>'https://youtu.be/JhX1nBnirNw?si=B7-pdlOEiGGhwleA'],
    ['Level_id'=>1,'category_id'=>3,'name'=>'ARM CIRCLES CLOCKWISE','description'=>'stand on the floor your arms
    extended straight out to the sides at shoulder height.Move your arms clockwise in circles fast
    ','date'=>30,'video'=>'https://youtu.be/Lha66p0ZXUc?si=rqTOiO6nws3rPOUu'],
    ['Level_id'=>1,'category_id'=>3,'name'=>'DIAMOND PUSH-UPS','description'=>'start in the push-up
    position.make a diamond shape with your forefingers and thumbs together under your chest
    ','date'=>6,'video'=>'https://youtu.be/UCmqw3kKZ38?si=Hg1GZ1XDiIOI5U_F'],

    ['Level_id'=>1,'category_id'=>4,'name'=>'SIDE HOP','description'=>'stand on the floor put your hands in front of you and hop from side to side','date'=>30,'video'=>'https://youtu.be/nYmUEJIBj3c?si=Lb6tEQHB0OQweIRH'],
    ['Level_id'=>1,'category_id'=>4,'name'=>'SQUATS','description'=>'stand with your feet shoulder width apart and your arms stretched farward,then lower your body unti your thighs are parallel with the floor','date'=>12,'video'=>'https://youtu.be/42bFodPahBU?si=zxVCFhcJd2ClxDNy'],
    ['Level_id'=>1,'category_id'=>4,'name'=>'SIDE-LYING LEG LIFT LIFT','description'=>'lie down on your side with your head rested on your right arm Lift your upper leg up and return to the start position','date'=>12,'video'=>'https://youtu.be/VlwBJE1WtOQ?si=w-EKI-rg4ygIqdJp'],

    ['Level_id'=>1,'category_id'=>4,'name'=>'BACKWARD LUNGE','description'=>'stand with your feet shoulder width apart and your hands on your hips.
    step a big step backward with your right leg and lower your body unti your left thight is parallel to the floor
    ','date'=>14,'video'=>'https://youtu.be/_LGpDtENZ5U?si=U4H8n8HbZxNSUGvI'],
    ['Level_id'=>1,'category_id'=>4,'name'=>'DONKEY KICKS LEFT','description'=>'start on all fours with your knees under your butt and your hands under your shoulders.
    then lift your left leg and squeeze your butt as much as you can.
    ','date'=>16,'video'=>'https://youtu.be/4ranVQDqlaU?si=Qru5lUHiRO9qfqxB'],

    ['Level_id'=>1,'category_id'=>5,'name'=>'JUMPING JACKS','description'=>'start with your feet together and your arms by your side then
jump up  with your feet apart and your hands overhead.
return to the start position then do the  next rep ','date'=>30,'video'=>'https://youtu.be/2W4ZNSwoW_4?si=iDbk_WKsvcBpJTyr'],
    ['Level_id'=>1,'category_id'=>5,'name'=>'ARM RAISES','description'=>'stand on the floor with your arms extended straight firward at shoulder height','date'=>16,'video'=>'https://youtu.be/Bqvmyni_sKQ?si=1XilydQ52yEuGSJv'],
    ['Level_id'=>1,'category_id'=>5,'name'=>'RHOMBOID PULLS','description'=>'stand with your feet shoulder width apart Raise your arms parallel to the ground and bend your elbows','date'=>14,'video'=>'https://youtu.be/DEyDbzSudEU?si=xPjbGmaGGxG_d0Fn'],
    ['Level_id'=>1,'category_id'=>5,'name'=>'SIDE ARM RAISE','description'=>'stand with your feet shoulder width apart Raise your arms to the sides at shoulder height, then put them down','date'=>16,'video'=>'https://youtu.be/YslHgg2E-Ro?si=sQxjIXmCsaW0V2YF'],
    ['Level_id'=>1,'category_id'=>5,'name'=>'KNEE PUSH-UPS','description'=>'start in the regular push-up position,then let your knees touch the floor and raise your feet up off the floor','date'=>14,'video'=>'https://youtu.be/jWxvty2KROs?si=BgvHLMIPFteFANC6'],


    ['Level_id'=>2,'category_id'=>1,'name'=>'JUMPING JACKS','description'=>'start with your feet together and your arms by your side then
jump up  with your feet apart and your hands overhead.
return to the start position then do the  next rep ','date'=>30,'video'=>'https://youtu.be/2W4ZNSwoW_4?si=iDbk_WKsvcBpJTyr'],
    ['Level_id'=>2,'category_id'=>1,'name'=>'HEEL TOUCH','description'=>'Lie on the ground with your Legs bent and your arms by your sides. Slightly lift your upper body off the floor and make your hands alternately reach your heels','date'=>3,'video'=>'https://youtu.be/9bR-elyolBQ?si=cJU8oQEVilfyM3kH'],
    ['Level_id'=>2,'category_id'=>1,'name'=>'CROSSOVER CRUNCH','description'=>'Lie on your back with your Knees bent and your your hands behind your ears. Raise and twist your torso elbow moves to meet your left Knee.','date'=>20,'video'=>'https://youtu.be/q2_KHKE5CDE?si=Y8xGSHsvJA4YaBCg'],
    ['Level_id'=>2,'category_id'=>1,'name'=>'MOUNTAIN CLIMBER','description'=>' Each side *10. start in the push-up position.bend your right knee toward your chest and keep your left leg straight,then quickly switch from one leg to the other','date'=>20,'video'=>'https://youtu.be/wQq3ybaLZeA?si=DPLAdr1NgpCyhmfv'],
    ['Level_id'=>2,'category_id'=>1,'name'=>'SIDE BRIDGES LEFT','description'=>'lie on your
    right side. put your right elbow directly under your shoulders and put your left hand on your waist.place your left leg on your right leg','date'=>12,'video'=>'https://youtu.be/7ytbYd4CK3o?si=OajiOFNAJ14FlakL'],

    ['Level_id'=>2,'category_id'=>2,'name'=>'JUMPING JACKS','description'=>'start with your feet together and your arms by your side then
jump up  with your feet apart and your hands overhead.
return to the start position then do the  next rep ','date'=>30,'video'=>'https://youtu.be/2W4ZNSwoW_4?si=iDbk_WKsvcBpJTyr'],
    ['Level_id'=>2,'category_id'=>2,'name'=>'KNEE PUSH-UPS','description'=>'start in the regular push-up position,then let your knees touch the floor and raise your feet up off the floor','date'=>12,'video'=>'https://youtu.be/jWxvty2KROs?si=BgvHLMIPFteFANC6'],

    ['Level_id'=>2,'category_id'=>2,'name'=>'PUSH-UPS','description'=>'
    lay prone on the ground with arms supporting your body.
    keep your body straight while raising and lowering your body with your arms.
    ','date'=>12,'video'=>'https://youtu.be/R08gYyypGto?si=He0zFsixww1PSKXp'],

    ['Level_id'=>2,'category_id'=>2,'name'=>'WIDE ARM PUSH-UPS','description'=>'start in the regular push-up position but with your hands spread wider than your shoulders.then push your body up and down','date'=>16,'video'=>'https://youtu.be/pQUsUHvyoI0?si=LrkSGMZhe5_cPY1R'],
    ['Level_id'=>2,'category_id'=>2,'name'=>'HINDU PUSH-UPS','description'=>'start with your hands and feet touching the floor body bent and butt up in an upside down V shape . Then bend your elbows to bring your body towards the floor','date'=>10,'video'=>'https://youtu.be/HE0ijmUc6Og?si=j54AENPcYJjxFew2'],

    ['Level_id'=>2,'category_id'=>3,'name'=>'PUSH-UP&ROTATION','description'=>'start in the push-up position.then go down for a push-up and as you come up,rotate your upper body and extend your right arm upwards','date'=>12,'video'=>'https://youtu.be/Plv5CIclPtQ?si=syoqq-IqzUGEZROt'],
    ['Level_id'=>2,'category_id'=>3,'name'=>'ARM CIRCLES COUNTERCLOCKWISE','description'=>'stand on the floor with your arms extended straight out to the sides at shoulder height.Move your arms counterclockwise in circles fast.','date'=>30,'video'=>'https://youtu.be/Lha66p0ZXUc?si=Ty3ruf0JWUd5zWGi'],
    ['Level_id'=>2,'category_id'=>3,'name'=>'FLOOR TRICEP DIPS','description'=>'sit on the floor with your Knees bent and feet flat on the floor.put your hands beneath your shoulders with your fingers position toward your hips.Lift your hips off the floor.then bend and extend your elbows to lower and lift your hips','date'=>14,'video'=>'https://youtu.be/geNkbcZ6qDo?si=X0s_66w2-uLUtsJK'],
    ['Level_id'=>2,'category_id'=>3,'name'=>'MILITARY PUSH UPS','description'=>'start in a push-up position with your hands dirctly under your shoulders and feet no more than 12 inches apart. Bend your elbows and lower your body until your upper arms are parallel to the floor','date'=>12,'video'=>'https://youtu.be/H8LoGZ-ZN48?si=vn4bFRkY_VZRQfOj'],
    ['Level_id'=>2,'category_id'=>3,'name'=>'ALTERNATING HOOKS','description'=>'stand with your feet shoulder-width apart and place your dominant foot slightly forward. slightly bend your Knees clench your fists and bend your elbows at 90 degrees','date'=>30,'video'=>'https://youtu.be/wiyvVpEKOsc?si=PhMdpyUBnOA2RS_4'],

    ['Level_id'=>2,'category_id'=>4,'name'=>'JUMPING JACKS','description'=>'start with your feet together and your arms by your side then
jump up  with your feet apart and your hands overhead.
return to the start position then do the  next rep ','date'=>30,'video'=>'https://youtu.be/2W4ZNSwoW_4?si=iDbk_WKsvcBpJTyr'],
    ['Level_id'=>2,'category_id'=>4,'name'=>'SQUATS','description'=>'stand with your feet shoulder width apart and your arms stretched farward,then lower your body until your thighs are parallel with the floor','date'=>12,'video'=>'https://youtu.be/42bFodPahBU?si=zxVCFhcJd2ClxDNy'],
    ['Level_id'=>2,'category_id'=>4,'name'=>'LUNGES','description'=>'stand with your feet shoulder width apart and your hands on your hips. Take a step forward with your right leg and lower your body until your right thigh is parallel with the floor','date'=>14,'video'=>'https://youtu.be/1J8mVmtyYpk?si=KAakQOmKK1gNZo4o'],
    ['Level_id'=>2,'category_id'=>4,'name'=>'SUMO SQUAT','description'=>'stand with your feet 6-12 inches apart stretch your arms in front of you .Lower your body until your thighs are parallel to the floor ','date'=>12,'video'=>'https://youtu.be/Z2F0bArQH5s?si=JZr_a1eaD8Sd1LUk'],
    ['Level_id'=>2,'category_id'=>4,'name'=>'WALL SIT','description'=>'start with your back against the wall,then slide down until your Knees are at a 90 degree angle Keep your back against the wall with your hands and arms away from your legs Hold the position','date'=>30,'video'=>'https://youtu.be/Yp3ZwACK9v4?si=k_YkGfxQTRqU_drW'],

    ['Level_id'=>2,'category_id'=>5,'name'=>'JUMPING JACKS','description'=>'start with your feet together and your arms by your side then
jump up  with your feet apart and your hands overhead.
return to the start position then do the  next rep ','date'=>30,'video'=>'https://youtu.be/2W4ZNSwoW_4?si=iDbk_WKsvcBpJTyr'],

    ['Level_id'=>2,'category_id'=>5,'name'=>'INCLINE PUSH-UPS','description'=>'
    start in the regular push-up position but with your hands elevated on a chair or bench.
    then push your body up downs using your arm strength','date'=>14,'video'=>'https://youtu.be/3WUUeM07i_Q?si=LDT0wBakq-T3YIBc'],
    ['Level_id'=>2,'category_id'=>5,'name'=>'CAT COW POSE','description'=>'start on all fours with your Knees under your butt and your hands directly under your shoulders.Then take a breath and make your belly fall down ,shoulders roll back and head come up towards the ceiling','date'=>30,'video'=>'https://youtu.be/w_UKcI1Ftn8?si=-aO2eJGs27scifmt'],
    ['Level_id'=>2,'category_id'=>5,'name'=>'HIP HINGE','description'=>'stand upright with your feet shoulder-width apart.sit your hips back and bend your upper body while keeping your upper body straight,then slowly go back to the start position and repeat the exercise','date'=>10,'video'=>'https://youtu.be/VyFDPMOy-eA?si=eGEEaMwMS-v2nMqp'],
    ['Level_id'=>2,'category_id'=>5,'name'=>'FLOOR TRICEP DIPS','description'=>' sit on the floor with your Knees bent and feet flat on the floor.put your hands beneath your shoulders with your fingers pointing toward your hips','date'=>14,'video'=>'https://youtu.be/geNkbcZ6qDo?si=Y9EFJ9SASd2K5QY_'],


    ['Level_id'=>3,'category_id'=>1,'name'=>'JUMPING JACKS','description'=>'start with your feet together and your arms by your side then
jump up  with your feet apart and your hands overhead.
return to the start position then do the  next rep ','date'=>30,'video'=>'https://youtu.be/2W4ZNSwoW_4?si=iDbk_WKsvcBpJTyr'],
    ['Level_id'=>3,'category_id'=>1,'name'=>'SIT-UPS','description'=>'lie on your back with your hands behind your ears. Then left your upper body off the floor and slowly up to the sitting position,Dont tug your neck when you get up','date'=>20,'video'=>'https://youtu.be/swOyWKk7Oko?si=RE8mKT8ajLnJx9-k'],
    ['Level_id'=>3,'category_id'=>1,'name'=>'V-UP','description'=>'Lie on your back with your arms and legs extended and your legs squeezed together. Raise your upper body and legs,use your arms to touch your toes','date'=>18,'video'=>'https://youtu.be/5kvKmRGADlQ?si=lkwG23TQ3I6pAKBb'],
    ['Level_id'=>3,'category_id'=>1,'name'=>'PUSH-UP&ROTATION','description'=>'start in the push-up position.then go down for a push-up and as you come up,rotate your upper body and extend your right arm upwards','date'=>24,'video'=>'https://youtu.be/Plv5CIclPtQ?si=syoqq-IqzUGEZROt'],
    ['Level_id'=>3,'category_id'=>1,'name'=>'BUTT BRIDGE','description'=>'lie on your back with Knees bent and feet flat on the floor,Put your arms flat at your sides','date'=>30,'video'=>'https://youtu.be/9qo48CYN06w?si=dxdMPtqYkLq8oJfG'],


    ['Level_id'=>3,'category_id'=>2,'name'=>'JUMPING JACKS','description'=>'start with your feet together and your arms by your side then
jump up  with your feet apart and your hands overhead.
return to the start position then do the  next rep ','date'=>30,'video'=>'https://youtu.be/2W4ZNSwoW_4?si=iDbk_WKsvcBpJTyr'],
    ['Level_id'=>3,'category_id'=>2,'name'=>'ARM CIRCLES','description'=>'stand on the floor with your arms extended straight out to the sides at shoulder height.','date'=>20,'video'=>'https://youtu.be/Lha66p0ZXUc?si=bH-DKpZrDy2cBFr1'],
    ['Level_id'=>3,'category_id'=>2,'name'=>'BURPEES','description'=>'stand with your feet shoulder width apart then put your hands on the ground and kick your feet backward.Do a quick push-up and then jump up','date'=>10,'video'=>'https://youtu.be/818SkLAPyKY?si=6DW7PTt9VNu_Drpu'],
    ['Level_id'=>3,'category_id'=>2,'name'=>'BOX PUSH-UPS','description'=>'start on all fours with your \knees under your butt and your hands directly under your shoulders','date'=>12,'video'=>'https://youtu.be/dcJVA2sBPqw?si=IQfu1_66LwJO21XI'],
    ['Level_id'=>3,'category_id'=>2,'name'=>'BURPEES','description'=>'stand with your feet shoulder width apart, then put your hands on the ground and kick your feet backward','date'=>10,'video'=>'https://youtu.be/818SkLAPyKY?si=k9KsifNVEzjJzaBc'],

    ['Level_id'=>3,'category_id'=>3,'name'=>'BURPEES','description'=>'stand with your feet shoulder width apart, then put your hands on the ground and kick your feet backward','date'=>16,'video'=>'https://youtu.be/818SkLAPyKY?si=k9KsifNVEzjJzaBc'],
    ['Level_id'=>3,'category_id'=>3,'name'=>'PUSH-UP&ROTATION','description'=>'start in the push-up position.then go down for a push-up and as you come up,rotate your upper body and extend your right arm upwards','date'=>12,'video'=>'https://youtu.be/Plv5CIclPtQ?si=syoqq-IqzUGEZROt'],
    ['Level_id'=>3,'category_id'=>3,'name'=>'CHEST PRESS PULSE','description'=>'Hold your forearms together at shoulder height and bend your elbows with your hands together to make an L shape','date'=>18,'video'=>'https://youtu.be/Fz4oo1vFo9M?si=MGe6BGTM5tvqd_L2'],
    ['Level_id'=>3,'category_id'=>3,'name'=>'MILITARY PUSH UPS','description'=>'start in a push-up position with your hands directly under your shoulders and feet no more than 12 inches apart','date'=>12,'video'=>'https://youtu.be/H8LoGZ-ZN48?si=CbNtIRdePb7eG6TN'],
    ['Level_id'=>3,'category_id'=>3,'name'=>'SHOULDER GATORS','description'=>'stand upright with your hands beside your ears and elbows facing each side Rotate your elbows until both of them are facing the front','date'=>16,'video'=>'https://youtu.be/JWp8_LGkTR8?si=eZIEaNs9mTc-3VPB'],

    ['Level_id'=>3,'category_id'=>4,'name'=>'BURPEES','description'=>'stand with your feet shoulder width apart ,then put your hands on the ground and Kick your feet backward. Do a quick push-up and then jump up','date'=>10,'video'=>'https://youtu.be/818SkLAPyKY?si=SXcKMUS-PlmxOdUS'],
    ['Level_id'=>3,'category_id'=>4,'name'=>'SQUATS','description'=>'stand with your feet shoulder width apart and your arms stretched farward,then lower your body unti your thighs are parallel with the floor','date'=>14,'video'=>'https://youtu.be/42bFodPahBU?si=zxVCFhcJd2ClxDNy'],
    ['Level_id'=>3,'category_id'=>4,'name'=>'JUMPING SQUATS','description'=>'start in the squat position,then jump up using your abdominal muscles for strength,This exercises works your abdomen','date'=>14,'video'=>'https://youtu.be/txLE-jOCEsc?si=roId_kXNDK7_UTGJ'],
    ['Level_id'=>3,'category_id'=>4,'name'=>'CURTSY LUNGES','description'=>'stand straight up.Then step back with your left leg to the right and bend your Knees at the same time.Go back to the start position and switch to the other side','date'=>14,'video'=>'https://youtu.be/-rTyKlHjYT8?si=Z2ZH8u1n2UFw3Tt4'],
    ['Level_id'=>3,'category_id'=>4,'name'=>'WALL SIT','description'=>'start with your back against the wall,then slide down until your Knees are at a 90 degree angle .Keep your back against the wall with your hands and arms away from your legs Hold the position','date'=>40,'video'=>'https://youtu.be/Yp3ZwACK9v4?si=yn9w4ITDxVgWMK7Q'],

    ['Level_id'=>3,'category_id'=>5,'name'=>'JUMPING JACKS','description'=>'start with your feet together and your arms by your side then
jump up  with your feet apart and your hands overhead.
return to the start position then do the  next rep ','date'=>30,'video'=>'https://youtu.be/2W4ZNSwoW_4?si=iDbk_WKsvcBpJTyr'],
    ['Level_id'=>3,'category_id'=>5,'name'=>'HYPEREXTENSION','description'=>'Lie down on your stomach with your toes touching the floor,and your chin on your hand.Raise your chest up as high possible off the floor,Hold this position for a few seconds and then go back to the start position','date'=>14,'video'=>'https://youtu.be/W9y8xq4Ya_E?si=Qhsmr1VTI2D5NbLP'],
    ['Level_id'=>3,'category_id'=>5,'name'=>'PIKE PUSH UPS ','description'=>'start with your hands and feet on the floor. put your hands shoulder width apart.Bend your body,and lift your hips up in an upside down V shipe,Bend your elbows,and bring your Head close to the floor,push your body back and repeat the exercises','date'=>14,'video'=>'https://youtu.be/Q2koXI9jphI?si=_BoGUMk8r8uOlqem'],
    ['Level_id'=>3,'category_id'=>5,'name'=>'INCHWORMS','description'=>'start with your feet shoulder width apart.Bend your body and walk your hands in front of you as far as you can then walk your hands back,Reperat the exerices','date'=>16,'video'=>'https://youtu.be/ZY2ji_Ho0dA?si=akbBhtgaSt7qUsAL'],
    ['Level_id'=>3,'category_id'=>5,'name'=>'REVERSE PUSH-UPS','description'=>'start in the regular push-up position.Lower your body down,then bend your Knees and move your hips backward with your arms straight','date'=>12,'video'=>'https://youtu.be/XRpbVcpx-Yc?si=-w3NZ_UQ85a4jK-s'],
];
DB::table('exercises')->insert($data);
    }
}
