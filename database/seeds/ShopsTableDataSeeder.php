<?php

use Illuminate\Database\Seeder;

class ShopsTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('shops')->delete();
        $json = file_get_contents(__DIR__.'/code_challenge.json');
        $data = json_decode($json);
        $array = (array) $data;
        foreach ($array as $obj) {
            DB::table('shops')->insert(array(
                'sale_id' => $obj->sale_id,
                'customer_name' => $obj->customer_name,
                'customer_mail' => $obj->customer_mail,
                'product_id' => $obj->product_id,
                'product_name' => $obj->product_name,
                'product_price' => $obj->product_price,
                'sale_date' => $obj->sale_date,
                'version' => $obj->version
            ));
        }
    }
}
