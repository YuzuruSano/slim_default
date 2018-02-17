<?php


use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
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

        // 変数の初期化
        $res = null;
        $options = array();

        $password = $this->generatePassword();

        ## 100件のダミーデータを作成
        for ($i = 0; $i < 50; $i++) {
            $data[] = [
                'user_login' => $faker->userName(),
                'user_pass' => $password,
                'user_nicename' => $faker->kanaName(),
                'user_email' => $faker->email(),
                'user_url' => $faker->url(),
                'user_registered' => date('Y-m-d H:i:s')
            ];
        }
        $users = $this->table('users');
        $users->insert($data)
              ->save();

        // empty the table
        //$users->truncate();
    }

    protected function generatePassword($password_text = 'password'){
        $options = array(
            'salt' => 'passwordpasswordpasswordpasswordpasswordpassword',
            'cost' => 12
        );
        $hased_password = password_hash( $password_text, PASSWORD_DEFAULT, $options);

        return $hased_password;
    }
}
