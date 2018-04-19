<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
            'name' => 'yoole',
            'email' => 'lethucntt1@gmail.com',
            'password' => bcrypt('12121996'),
            'phone' => '0978716945',
            'address' => 'thanh hoa',
            'birthday' => '1996-12-12',
            'gender' => 'male',
            'status' => 1,
        ]);

        DB::table('type_product')->insert([
            'name' =>'Quần',
            'description' => 'quần',
            'status' => 1,
        ]);

        DB::table('type_product')->insert([
            'name' =>'Áo',
            'description' => 'áo',
            'status' => 1,
        ]);

        DB::table('type_product')->insert([
            'name' =>'Giày',
            'description' => 'giày',
            'status' => 1,
        ]);

        DB::table('type_product')->insert([
            'name' =>'Mũ bảo hiểm',
            'description' => 'mũ',
            'status' => 1,
        ]);

        DB::table('type_product')->insert([
            'name' =>'Giáp',
            'description' => 'giáp',
            'status' => 1,
        ]);

        DB::table('size')->insert([
            'name' => 'free',
            'description' => 'khong co size',
        ]);

        DB::table('size')->insert([
            'name' => 'S',
            'description' => 'size bé nhất',
        ]);

        DB::table('size')->insert([
            'name' => 'M',
            'description' => 'size bé gần nhất',
        ]);


        DB::table('color')->insert([
            'name' => 'none',
            'description' => 'khong mau',
        ]);

        DB::table('color')->insert([
            'name' => 'đỏ',
            'description' => 'đỏ',
        ]);

        DB::table('color')->insert([
            'name' => 'xanh',
            'description' => 'xanh',
        ]);

        DB::table('color')->insert([
            'name' => 'vàng',
            'description' => 'vàng',
        ]);

        DB::table('comment')->insert([
            'user_id' => 1,
            'content' => 'sanphamtot',
            'status' => 1,
        ]);

        DB::table('company')->insert([
            'name' => 'Công ty TNHH Giày Thư Tâm',
            'email' => 'giaythutam@gmail.com',
            'phone' => '19005678',
            'address' => '104 Đào Tấn',
            'status' => 1,
        ]);

        DB::table('sale')->insert([
            'code' => 'ASKM5',
            'type' => 'khuyến mại nhân dịp 8-3',
            'status' => 1,
        ]);

        DB::table('product')->insert([
            'type_id' => 1,
            'company_id' => 1,
            'name' => 'Giày trouble maker',
            'title' => 'giày chuyên dụng đi phượt',
            'description' => ' chưa nghĩ ra => đang nghĩ => gì mà căng =',
            'image' => 'kang.jpg',
            'size_id' => '1',
            'color_id' => '1',
            'price' => 14000000,
            'sum' => 10,
        ]);

        DB::table('product')->insert([
            'type_id' => 1,
            'company_id' => 1,
            'name' => 'Áo khoác bomber',
            'title' => 'Áo khoác bomber',
            'description' => ' Áo khoác bomber',
            'image' => 'kang.jpg',
            'size_id' => '1',
            'color_id' => '1',
            'price' => 14000000,
            'sum' => 10,
        ]);

        DB::table('product')->insert([
            'type_id' => 1,
            'company_id' => 1,
            'name' => 'Quần TNF 2018',
            'title' => 'Quần TNF 2018',
            'description' => ' Quần TNF 2018',
            'image' => 'kang.jpg',
            'size_id' => '1',
            'color_id' => '1',
            'price' => 14000000,
            'sum' => 10,
        ]);

        DB::table('product')->insert([
            'type_id' => 1,
            'company_id' => 1,
            'name' => 'Khăn rằn Campuchia',
            'title' => 'Khăn rằn Campuchia',
            'description' => ' Khăn rằn Campuchia',
            'image' => 'kang.jpg',
            'size_id' => '1',
            'color_id' => '1',
            'price' => 14000000,
            'sum' => 10,
        ]);

        DB::table('product')->insert([
            'type_id' => 1,
            'company_id' => 1,
            'name' => 'Mũ bảo hiểm fullface royal trơn 2018',
            'title' => 'Mũ bảo hiểm fullface royal trơn 2018',
            'description' => ' Mũ bảo hiểm fullface royal trơn 2018',
            'image' => 'kang.jpg',
            'size_id' => '1',
            'color_id' => '1',
            'price' => 14000000,
            'sum' => 10,
        ]);

        DB::table('product')->insert([
            'type_id' => 2,
            'company_id' => 1,
            'name' => 'Giày trouble maker',
            'title' => 'giày chuyên dụng đi phượt',
            'description' => ' chưa nghĩ ra => đang nghĩ => gì mà căng =',
            'image' => '01-1492130666479.jpg',
            'size_id' => '1',
            'color_id' => '1',
            'price' => 14000000,
            'sum' => 10,
        ]);

        DB::table('product')->insert([
            'type_id' => 2,
            'company_id' => 1,
            'name' => 'Áo khoác bomber',
            'title' => 'Áo khoác bomber',
            'description' => ' Áo khoác bomber',
            'image' => '01-1492130666479.jpg',
            'size_id' => '1',
            'color_id' => '1',
            'price' => 14000000,
            'sum' => 10,
        ]);

        DB::table('product')->insert([
            'type_id' => 2,
            'company_id' => 1,
            'name' => 'Quần TNF 2018',
            'title' => 'Quần TNF 2018',
            'description' => ' Quần TNF 2018',
            'image' => '01-1492130666479.jpg',
            'size_id' => '1',
            'color_id' => '1',
            'price' => 14000000,
            'sum' => 10,
        ]);

        DB::table('product')->insert([
            'type_id' => 2,
            'company_id' => 1,
            'name' => 'Khăn rằn Campuchia',
            'title' => 'Khăn rằn Campuchia',
            'description' => ' Khăn rằn Campuchia',
            'image' => '01-1492130666479.jpg',
            'size_id' => '1',
            'color_id' => '1',
            'price' => 14000000,
            'sum' => 10,
        ]);

        DB::table('product')->insert([
            'type_id' => 2,
            'company_id' => 1,
            'name' => 'Mũ bảo hiểm fullface royal trơn 2018',
            'title' => 'Mũ bảo hiểm fullface royal trơn 2018',
            'description' => ' Mũ bảo hiểm fullface royal trơn 2018',
            'image' => '01-1492130666479.jpg',
            'size_id' => '1',
            'color_id' => '1',
            'price' => 14000000,
            'sum' => 10,
        ]);


        DB::table('product')->insert([
            'type_id' => 3,
            'company_id' => 1,
            'name' => 'Giày trouble maker',
            'title' => 'giày chuyên dụng đi phượt',
            'description' => ' chưa nghĩ ra => đang nghĩ => gì mà căng =',
            'image' => 'jk.png',
            'size_id' => '1',
            'color_id' => '1',
            'price' => 14000000,
            'sum' => 10,
        ]);

        DB::table('product')->insert([
            'type_id' => 3,
            'company_id' => 1,
            'name' => 'Áo khoác bomber',
            'title' => 'Áo khoác bomber',
            'description' => ' Áo khoác bomber',
            'image' => 'jk.png',
            'size_id' => '1',
            'color_id' => '1',
            'price' => 14000000,
            'sum' => 10,
        ]);

        DB::table('product')->insert([
            'type_id' => 3,
            'company_id' => 1,
            'name' => 'Quần TNF 2018',
            'title' => 'Quần TNF 2018',
            'description' => ' Quần TNF 2018',
            'image' => 'jk.png',
            'size_id' => '1',
            'color_id' => '1',
            'price' => 14000000,
            'sum' => 10,
        ]);

        DB::table('product')->insert([
            'type_id' => 3,
            'company_id' => 1,
            'name' => 'Khăn rằn Campuchia',
            'title' => 'Khăn rằn Campuchia',
            'description' => ' Khăn rằn Campuchia',
            'image' => 'jk.png',
            'size_id' => '1',
            'color_id' => '1',
            'price' => 14000000,
            'sum' => 10,
        ]);

        DB::table('product')->insert([
            'type_id' => 3,
            'company_id' => 1,
            'name' => 'Mũ bảo hiểm fullface royal trơn 2018',
            'title' => 'Mũ bảo hiểm fullface royal trơn 2018',
            'description' => ' Mũ bảo hiểm fullface royal trơn 2018',
            'image' => 'jk.png',
            'size_id' => '1',
            'color_id' => '1',
            'price' => 14000000,
            'sum' => 10,
        ]);
        DB::table('comment_product')->insert([
            'comment_id' => 1,
            'product_id' => 1,
            'status' => 1,
        ]);

        DB::table('bill')->insert([
            'user_id' => 1,
            'name_customer' => 'thu',
            'address_customer' => 'Thành Lộc -Hậu Lộc- Thanh Hóa',
            'phone_customer' => '0978716823',
            'amount' => '121212',
            'status' => 1,
            'sum' => 1,
            'type' =>'cod'
        ]);

        DB::table('shipper_oder')->insert([
            'user_id' => 1,
            'bill_id' => 1,
            'status' => 1,
        ]);

        DB::table('bill_detail')->insert([
            'bill_id' => 1,
            'product_id' => 1,
            'user_id' => 1,
            'status' => 1,
            'qty' => 1,
        ]);

        DB::table('payment_log')->insert([
            'user_id' => 1,
            'time_request' => '2018-03-08',
            'request' => '111111',
            'response' => '1111111',
        ]);

        DB::table('cart')->insert([
            'user_id' => 1,
            'product_id' => 1,
            'number' => 1,
            'status' => 1,
        ]);

    }
}
