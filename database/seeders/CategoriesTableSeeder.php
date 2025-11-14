<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Segurança',
                'description' => 'Vagas para seguranças, vigilantes e porteiros',
                'is_active' => true
            ],
            [
                'name' => 'Cozinheiro',
                'description' => 'Vagas para cozinheiros, auxiliares de cozinha e chefs',
                'is_active' => true
            ],
            [
                'name' => 'Serviços Gerais',
                'description' => 'Serviços diversos como limpeza, organização e apoio geral',
                'is_active' => true
            ],
            [
                'name' => 'Pizzaiolo',
                'description' => 'Profissionais especializados em preparo de pizzas',
                'is_active' => true
            ],
            [
                'name' => 'Atendente',
                'description' => 'Vagas para atendimento ao público, balconistas e recepcionistas',
                'is_active' => true
            ],
            [
                'name' => 'Pedreiro',
                'description' => 'Profissionais de construção civil, assentamento e acabamento',
                'is_active' => true
            ],
            [
                'name' => 'Servente de Pedreiro',
                'description' => 'Auxiliares de obras e construção civil',
                'is_active' => true
            ],
            [
                'name' => 'Panfletagem',
                'description' => 'Distribuição de panfletos e material promocional',
                'is_active' => true
            ],
            [
                'name' => 'Garçom',
                'description' => 'Atendimento em bares, restaurantes e eventos',
                'is_active' => true
            ],
            [
                'name' => 'Entregador',
                'description' => 'Entregas de alimentos, documentos e encomendas',
                'is_active' => true
            ],
            [
                'name' => 'Bartender',
                'description' => 'Profissionais de bebidas e coquetéis',
                'is_active' => true
            ],
            [
                'name' => 'Motorista',
                'description' => 'Motoristas particulares, aplicativo e entregas',
                'is_active' => true
            ],
            [
                'name' => 'Promotor de Vendas',
                'description' => 'Divulgação e demonstração de produtos',
                'is_active' => true
            ],
            [
                'name' => 'Cuidador',
                'description' => 'Cuidados com idosos, crianças e pessoas com necessidades especiais',
                'is_active' => true
            ],
            [
                'name' => 'Doméstica',
                'description' => 'Serviços domésticos, limpeza e organização residencial',
                'is_active' => true
            ],
            [
                'name' => 'Manicure',
                'description' => 'Cuidados com as unhas e embelezamento',
                'is_active' => true
            ],
            [
                'name' => 'Cabelereiro',
                'description' => 'Cortes, tratamentos e cuidados com os cabelos',
                'is_active' => true
            ],
            [
                'name' => 'Eletricista',
                'description' => 'Instalações e reparos elétricos',
                'is_active' => true
            ],
            [
                'name' => 'Encanador',
                'description' => 'Instalações e reparos hidráulicos',
                'is_active' => true
            ],
            [
                'name' => 'Montador de Móveis',
                'description' => 'Montagem e instalação de móveis e equipamentos',
                'is_active' => true
            ],
            [
                'name' => 'Auxiliar de Logística',
                'description' => 'Apoio em armazéns, estoque e distribuição',
                'is_active' => true
            ],
            [
                'name' => 'Recepcionista',
                'description' => 'Atendimento telefônico e recepção de visitantes',
                'is_active' => true
            ],
            [
                'name' => 'Operador de Caixa',
                'description' => 'Atendimento no caixa e operações comerciais',
                'is_active' => true
            ],
            [
                'name' => 'Auxiliar de Produção',
                'description' => 'Apoio em linhas de produção e fabricação',
                'is_active' => true
            ],
            [
                'name' => 'Outros',
                'description' => 'Outras categorias de serviços e freelas',
                'is_active' => true
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}