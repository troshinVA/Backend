<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert(
            [
                ['title' => 'XXXII Международная научно-практическая конференция «Advances in Science and Technology»',
                'description' => 'Приглашаем к участию в 32-ой международной мультидисциплинарной научно-практической
                конференции «Advances in science and technology», которая состоится 30 октября 2020 года в г. Москва.
                Организаторы: ООО “Актуальность.РФ”, Пензенский государственный университет, Московский государственный
                университет. Материалы принимаются до 30 октября включительно.'],
                ['title' => 'IX Международная научно-практическая конференция «Глобальная экономика в XXI веке: роль биотехнологий и цифровых технологий»',
                'description' => 'Дата проведения 15-16 ноября 2020 года.
                Материалы принимаются до 16 ноября 2020 года включительно.
                По итогам конференции будет опубликован сборник статей с последующей загрузкой в РИНЦ.
                Сборник рецензируется, статьи проверяются на плагиат.'],
                ['title' => 'II Международная научно-практическая конференция по цифровой экономике (ISCDE 2020)',
                'description' => 'Приглашаем Вас к участию во II Международной научно-практической конференции по цифровой экономике
                (ISCDE 2020) http://iscde2020.com/ru/, которая состоится в городе Екатеринбург на базе Института цифровой экономики.
                Материалы по результатам конференции будут опубликованы издательством Atlantis Press в серии книг Advances in Economics,
                Business and Management Research ISSN: 2352-5428 и проиндексированы в наукометрической базе данных Web of Science (»Сеть науки»)']

            ]
        );
    }
}