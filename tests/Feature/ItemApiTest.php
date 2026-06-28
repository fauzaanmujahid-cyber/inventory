<?php

namespace Tests\Feature;

use Tests\TestCase;

class ItemApiTest extends TestCase
{
    public function test_items_endpoint_requires_authentication()
    {
        $response = $this->getJson('/api/v1/items');

        $response->assertStatus(401);
    }

    public function test_items_show_requires_authentication()
    {
        $response = $this->getJson('/api/v1/items/1');

        $response->assertStatus(401);
    }

    public function test_create_item_requires_authentication()
    {
        $response = $this->postJson('/api/v1/items', []);

        $response->assertStatus(401);
    }

    public function test_unauthorized_access()
    {
        $response = $this->deleteJson('/api/v1/items/1');

        $response->assertStatus(401);
    }
}