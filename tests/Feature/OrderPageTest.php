<?php

namespace Tests\Feature;

use Tests\TestCase;

class OrderPageTest extends TestCase
{
    public function test_order_page_selects_menu_from_query_and_renders_all_menu_options(): void
    {
        $response = $this->get('/pesan?menu=air-mineral');

        $response->assertOk();
        $response->assertSee('value="air-mineral" selected', false);
        $response->assertSee('name="menu[]"', false);
        $response->assertSee('name="jumlah[]"', false);
        $response->assertSee('id="add-menu"', false);
        $response->assertSee('data-remove-menu', false);

        foreach ([
            'nasi-goreng',
            'nasi-liwet',
            'ayam-geprek',
            'mie-ayam',
            'mie-goreng',
            'soto-mie',
            'sop-sayur',
            'sayur-pakcoy',
            'tahu-sumedang',
            'kentang-goreng',
            'pisang-goreng',
            'es-teh-manis',
            'es-teh-lemon',
            'es-teh-tawar',
            'es-jeruk',
            'air-mineral',
        ] as $menu) {
            $response->assertSee('value="'.$menu.'"', false);
        }
    }
}
