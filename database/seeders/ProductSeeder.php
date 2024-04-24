<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            ['name'=>'Men’s Activewear Elastic Sports Tops Fitness Running Training T-Shirt Quick Dry','cost'=>18.99,'image'=>'https://i.ebayimg.com/images/g/krkAAOSw6DhbdnmH/s-l960.webp','amount'=>100,'Cate_id'=>1],
            ['name'=>'Mens Running T-Shirts Quick Dry T-Shirts Fitness Gym Running Shirts Activewear','cost'=>19.25,'image'=>'https://i.ebayimg.com/images/g/l-QAAOSwkVJkGm4f/s-l1600.webp','amount'=>100,'Cate_id'=>1],
            ['name'=>'Mens Gym Shirts Quick Dry Running Athletic T-Shirts Training Tops Activewear','cost'=>11.3,'image'=>'https://i.ebayimg.com/images/g/B8oAAOSwIUFi-8PJ/s-l1600.webp','amount'=>100,'Cate_id'=>1],
            ['name'=>'Men Quick Dry Short Sleeve T-shirt Polos Shirts Workout Golf Shirts Sports Tee','cost'=>15.5,'image'=>'https://i.ebayimg.com/thumbs/images/g/yucAAOSw671kw4gt/s-l500.jpg','amount'=>100,'Cate_id'=>1],
            ['name'=>'Mens Workout Athletic T-Shirt Quick Dry Muscle Fitness Shirts Breathable Tops','cost'=>13.5,'image'=>'https://i.ebayimg.com/images/g/VuwAAOSwnkNki9xu/s-l960.webp','amount'=>100,'Cate_id'=>1],
            ['name'=>'GALAXY 6 SHOES','cost'=>33,'image'=>'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/63c77c04dc6448548ccbae880189e107_9366/Galaxy_6_Shoes_Black_GW3848_01_standard.jpg','amount'=>100,'Cate_id'=>2],
            ['name'=>'RAPIDMOVE ADV TRAINER','cost'=>34,'image'=>'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/6aeed603d72245978ae40c0a89379d28_9366/Rapidmove_ADV_Trainer_White_HP3266_01_standard.jpg','amount'=>100,'Cate_id'=>2],
            ['name'=>'SAMBA OG SHOES','cost'=>12,'image'=>'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/3bbecbdf584e40398446a8bf0117cf62_9366/Samba_OG_Shoes_White_B75806_01_standard.jpg','amount'=>100,'Cate_id'=>2],
            ['name'=>'Nike Air Max DN','cost'=>32,'image'=>'https://i8.amplience.net/i/jpl/jd_DV3337-005_a?qlt=92&w=750&h=531&v=1&fmt=auto','amount'=>100,'Cate_id'=>2],
            ['name'=>'Nike Interact Run','cost'=>34,'image'=>'https://i8.amplience.net/i/jpl/jd_FD2291-401_a?qlt=92&w=750&h=531&v=1&fmt=auto','amount'=>100,'Cate_id'=>2],

            ['name'=>'Sunny Health & Fitness Rowing Machine Rower Ergometer with Durable Elastic Cord, Digital Monitor, Inclined Slide Rail and Foldable - SF-RW5606','cost'=>230,'image'=>'https://m.media-amazon.com/images/I/71SA8aUtTFL.__AC_SX300_SY300_QL70_ML2_.jpg','amount'=>100,'Cate_id'=>3],
            ['name'=>'Rainforest Basics Neoprene Coated Dumbbell Hand Weight Set','cost'=>23,'image'=>'https://m.media-amazon.com/images/I/51-7BK0hEXL._AC_SX522_.jpg','amount'=>100,'Cate_id'=>3],
            ['name'=>'Rowing Bench','cost'=>211,'image'=>'https://speediance.com.sg/cdn/shop/files/Untitleddesign_40.png?v=1713583307&width=600','amount'=>100,'Cate_id'=>3],
            ['name'=>'FLYBIRD Adjustable Bench,Utility Weight Bench for Full Body Workout- Multi-Purpose Foldable incline/decline Bench','cost'=>57,'image'=>'https://m.media-amazon.com/images/I/71Uyi3MI4dL.__AC_SX300_SY300_QL70_FMwebp_.jpg','amount'=>100,'Cate_id'=>3],
            ['name'=>'Amazon Basics Cast Iron Kettlebell','cost'=>145,'image'=>'https://m.media-amazon.com/images/I/81bRHNpK3fL._AC_SX569_.jpg','amount'=>100,'Cate_id'=>3],
        ];
        DB::table('products')->insert($data);
    }
}
