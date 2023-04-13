<?php

namespace App\Http\Controllers;

class MergeController extends Controller
{
    public function __invoke()
    {
        $first_json = '{"data": [{"name": "Война и мир","description": "роман-эпопея Льва Николаевича Толстого, описывающий русское общество в эпоху войн против Наполеона в 1805—1812 годах.","createdAt": "2022-06-30"},{"name": "Ревизор","description": "комедия в пяти действиях, написанная Н. В. Гоголем в 1835 г.","createdAt": "2022-05-11"},{"name": "Горе от ума","description": "комедия в стихах Александра Сергеевича Грибоедова. Она сочетает в себе элементы классицизма и новых для начала XIX века романтизма и реализма.","createdAt": "2022-07-18"}]}';
        $second_json = '[{"title": "Финансит","descr": "Это книга о человеке, который прежде всего является Финансистом- могучим тигром в мире беззащитных овец и хищных волков.","author": "Т. Драйзер"},{"title": "Таинственный остров","desc": "В ней повествуется о событиях, происходивших на вымышленном острове, куда забросило на воздушном шаре несколько человек, бежавших из Америки в результате Гражданской войны.","author": "Жюль Верн"},{"title": "Портрет Дориана Грея","desc": "Тонкий эстет и романтик становится безжалостным преступником. Попытка сохранить свою необычайную красоту и молодость оборачивается провалом. ","author": "Оскар Уайльд"}]';

        $first = json_decode($first_json, true);
        $second = json_decode($second_json, true);

        $result = [];

        foreach ($first['data'] as $book) {
            $result[] = [
                'title' => $book['name'],
                'description' => $book['description'],
                'createdAt' => $book['createdAt'],
            ];
        }

        foreach ($second as $book) {
            $result[] = [
                'title' => $book['title'],
                'description' => $book['descr'] ?? $book['desc'],
                'author' => $book['author'],
            ];
        }

        return response()->json($result);
    }
}
