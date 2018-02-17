<?php


use Phinx\Seed\AbstractSeed;

class PostSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $faker = Faker\Factory::create('ja_JP');
        $data = [];

        ## 100件のダミーデータを作成
        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'title' => $faker->realText(30,5),
                'content' => $faker->realText(400,2),
                'url' => $faker->url(),
                'created' => date('Y-m-d H:i:s')
            ];
        }
        $posts = $this->table('posts');
        $posts->insert($data)
              ->save();

        // empty the table
        //$posts->truncate();
    }
}
