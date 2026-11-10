<?php

namespace Tests\Feature;

use Tests\TestCase;

class OrderConfirmationPageTest extends TestCase
{
    public function test_home_link_on_order_confirmation_page_points_to_home_route(): void
    {
        $response = $this->get('/pesanan-terkirim');

        $response->assertOk();
        $response->assertSee('href="'.route('home').'"', false);
        $response->assertSee('Kembali ke Home');
    }
}
